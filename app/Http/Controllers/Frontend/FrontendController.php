<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class FrontendController extends Controller
{
    // ================================================================
    // ======================== welcome Function ========================
    // ================================================================
    public function welcome()
    {
        try {
            $blogs = Blog::where('status', 1)->get();

            return view('front_end.welcome', compact( 'blogs'));
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
    // ======================== blogsList Function ========================
    // ================================================================

    public function blogsList($id)
    {
        try {

            $category = Category::find($id);

            if ($category) {
                $blogs = Blog::where('category_id', $id)->paginate(5);
                return view('front_end.blogsList', compact('blogs', 'category'));
            }
            return redirect()->route('welcome')->with('danger', 'Category not found ');
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
    // ======================== singleBlog Function ========================
    // ================================================================

    public function singleBlog($id)
    {
        try {

            $blog = Blog::find($id);
            if ($blog) {
                return view('front_end.singleBlog', compact('blog'));
            }
            return redirect()->route('welcome')->with('danger', 'Blog not found ');
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
