<?php

namespace App\Http\Controllers\BackEnd\Admin;

use Throwable;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{

    public function showLoginForm(){
        return view('admin.login_form');
    }
    public function login(Request $request){
        try{
            $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('super_admin.dashboard'));
        }
        // if unsuccessful
        $errors = [
            'username' => 'username or password is incorrect',
        ];
        return redirect()->route('super_admin.login');
    }
    catch (QueryException $exception) {
        // Database connection exception occurred
        // You can log the error or return a custom error response

        // For example, log the error
        Log::error('Database Connection Exception: ' . $exception->getMessage());

        // Or return a custom error response
        return view('errors.database', [], 500);
    }



    }

    public function dashboard(){
        try{
        $users = User::get();
        $blogs = Blog::get();
        $categories = Category::get();

        return view('admin.index',compact('users','blogs','categories'));
         } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }



        public function logout(Request $request)
    {
       try{ Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('super_admin.login');

}catch (QueryException $exception) {
    // Database connection exception occurred
    // You can log the error or return a custom error response

    // For example, log the error
    Log::error('Database Connection Exception: ' . $exception->getMessage());

    // Or return a custom error response
    return view('errors.database', [], 500);
}


}
}
