<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryFormRequest;
use App\Http\Requests\Category\UpdateCategoryFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    use  UploadImageTrait;

    public function index()
    {
        try {
            $categories = Category::all();
            return view('admin.categories.index', compact('categories'));
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
            return view('admin.categories.create');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }



    public function store(StoreCategoryFormRequest $request)
    {
        try {
            $request_data = [
                'title' => $request->title,
                'status' => $request->status,
            ];
            if (isset($request->image)) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/images/categories/';
                $request_data['image'] = $this->saveFile($orginal_image, $upload_location);
            }
            DB::transaction(function () use ($request_data) {
                Category::create($request_data);
            });
            return redirect()->route('super_admin.categories-index')->with('success', 'The category added successfully');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function edit($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {

                return view('admin.categories.edit', compact('category'));
            }
            return redirect()->route('super_admin.categories-index')->with('danger', 'category not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }




    public function update(UpdateCategoryFormRequest $request, $id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $request_update = [
                    'title' => $request->title,
                    'status' => $request->status,
                ];
                if (isset($request->image)) {
                    $file_name = $this->saveFile($request->image, 'storage/images/categories/');
                    $request_update['image'] = $file_name;
                } else {
                    $request_update['image'] = $category->image;
                }
                DB::transaction(function () use ($request_update, $category) {
                    $category->update($request_update);
                });
                return redirect()->route('super_admin.categories-index')->with('success', 'The category updated successfully');
            }
            return redirect()->route('super_admin.categories-index')->with('danger', 'category not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function softDelete($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                DB::transaction(function () use ($category) {
                    $category->delete();
                });
                return redirect()->route('super_admin.categories-index')->with('success', 'The category deleted successfully');
            }
            return redirect()->route('super_admin.categories-index')->with('danger', 'category not found ');
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
            $categories = Category::onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.categories.trashed', compact('categories'));
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }


    public function softDeleteRestore($id)
    {
        try {
            $category = Category::onlyTrashed()->find($id);
            if ($category) {
                DB::transaction(function () use ($category) {
                    $category->restore();
                });

                return redirect()->route('super_admin.categories-index')->with('success', 'The category restored successfully');
            }
            return redirect()->route('super_admin.categories-index')->with('danger', 'category not found ');
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
            $category = Category::find($id);
            if ($category) {
                if ($category->status == 'Active') {
                    $category->status = 2;  // 2 => Inactive
                } elseif ($category->status == 'Inactive') {
                    $category->status = 1;  // 1 => Active

                }
                $category->save();
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
