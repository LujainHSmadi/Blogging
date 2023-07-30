<?php

namespace App\Http\Controllers\BackEnd\Admin;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use Illuminate\Database\QueryException;

class UserController extends Controller
{

    public function index()
    {

        try {
            $users = User::all();
            return view('admin.users.index', compact('users'));
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
            return view('admin.users.create');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }



    public function store(StoreUserFormRequest $request)
    {
        try {
            $request_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ];
            DB::transaction(function () use ($request_data) {
                User::create($request_data);
            });
            return redirect()->route('super_admin.users-index')->with('success', 'The user added successfully');
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
            $user = User::find($id);
            if ($user) {
                return view('admin.users.edit', compact('user'));
            }
            return redirect()->route('super_admin.users-index')->with('danger', 'user not found ');
        } catch (QueryException $exception) {
            // Database connection exception occurred
            // You can log the error or return a custom error response

            // For example, log the error
            Log::error('Database Connection Exception: ' . $exception->getMessage());

            // Or return a custom error response
            return view('errors.database', [], 500);
        }
    }




    public function update(UpdateUserFormRequest $request, $id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $request_update = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                ];
                DB::transaction(function () use ($request_update, $user) {
                    $user->update($request_update);
                });
                return redirect()->route('super_admin.users-index')->with('success', 'The user updated successfully');
            }
            return redirect()->route('super_admin.users-index')->with('danger', 'user not found ');
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
            $user = User::find($id);
            if ($user) {
                DB::transaction(function () use ($user) {
                    $user->delete();
                });
                return redirect()->route('super_admin.users-index')->with('success', 'The user deleted successfully');
            }
            return redirect()->route('super_admin.users-index')->with('danger', 'user not found ');
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
            $users = User::onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.users.trashed', compact('users'));
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
            $user = User::onlyTrashed()->find($id);
            if ($user) {
                DB::transaction(function () use ($user) {
                    $user->restore();
                });

                return redirect()->route('super_admin.users-index')->with('success', 'The user restored successfully');
            }
            return redirect()->route('super_admin.users-index')->with('danger', 'user not found ');
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
