<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\Http\Requests\Blog\StoreBlogFormRequest;
use App\Http\Requests\Blog\UpdateBlogFormRequest;
use App\Traits\UploadImageTrait;

class BlogController extends Controller
{
    use UploadImageTrait;


    public function index()
    {
        try {
            $blogs = Blog::all();
            return view('admin.blogs.index', compact('blogs'));
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }



    public function create()
    {
        try {
            $categories = Category::where('status', '1')->get();
            return view('admin.blogs.create', compact('categories'));
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }



    public function store(StoreBlogFormRequest $request)
    {
        try {
            $request_data = [
                'title' => $request->title,
                'user_id' => auth()->user()->id,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'status' => $request->status,

            ];
            if (isset($request->image)) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/images/categories/';
                $request_data['image'] = $this->saveFile($orginal_image, $upload_location);
            }
            DB::transaction(function () use ($request_data) {
                Blog::create($request_data);
            });
            return redirect()->route('super_admin.blogs-index')->with('success', 'The blog added successfully');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }

    public function show($id)
    {
        try {
            $blog = Blog::find($id);
            return view('admin.blogs.show', compact('blog'));
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function edit(Request $request, $id)
    {
        try {
            $blog = Blog::find($id);
            $categories = Category::where('status', '1')->get();

            if ($blog) {
                return view('admin.blogs.edit', compact('blog', 'categories'));
            }
            return redirect()->route('super_admin.blogs-index')->with('danger', 'blog not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }




    public function update(UpdateBlogFormRequest $request, $id)
    {
        try {
            $blog = Blog::find($id);
            if ($blog) {
                $request_update = [
                    'title' => $request->title,
                    'user_id' => auth()->user()->id,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'status' => $request->status,
                ];


                 if (isset($request->image)) {
                    $file_name = $this->saveFile($request->image, 'storage/images/categories/');
                    $request_update['image'] = $file_name;
                } else {
                    $request_update['image'] = $blog->image;
                }



                DB::transaction(function () use ($request_update, $blog) {
                    $blog->update($request_update);
                });
                return redirect()->route('super_admin.blogs-index')->with('success', 'The blog updated successfully');
            }
            return redirect()->route('super_admin.blogs-index')->with('danger', 'blog not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function softDelete($id, Request $request)
    {
        try {
            $blog = Blog::find($id);
            if ($blog) {
                DB::transaction(function () use ($blog) {
                    $blog->delete();
                });
                return redirect()->route('super_admin.blogs-index')->with('success', 'The blog deleted successfully');
            }
            return redirect()->route('super_admin.blogs-index')->with('danger', 'blog not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function showSoftDelete()
    {
        try {
            $blogs = Blog::onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.blogs.trashed', compact('blogs'));
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function softDeleteRestore($id, Request $request)
    {
        try {
            $blog = Blog::onlyTrashed()->find($id);
            if ($blog) {
                DB::transaction(function () use ($blog) {
                    $blog->restore();
                });

                return redirect()->route('super_admin.blogs-index')->with('success', 'The blog restored successfully');
            }
            return redirect()->route('super_admin.blogs-index')->with('danger', 'blog not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }

    // ================================================================
    // ================== Active/Inactive Single ======================
    // ================================================================
    public function activeInactiveSingle($id)
    {
        try {
            $blog = Blog::find($id);
            if ($blog) {

                if ($blog->status == 'Active') {
                    $blog->status = 2;  // 2 => Inactive
                } elseif ($blog->status == 'Inactive') {
                    $blog->status = 1;  // 1 => Active

                }
                $blog->save();
                return redirect()->back()->with('success', 'The process has successfully');
            } else {
                return redirect()->back()->with('danger', 'This record is not in the records');
            }
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }
}
