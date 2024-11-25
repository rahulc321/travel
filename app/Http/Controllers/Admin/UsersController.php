<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            # validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'roles' => 'array', # validate roles if provided
            ]);

            # create a new user with the request data
            $user = User::create($request->only(['name', 'email','phone','password']));

            # sync the user's roles, if any
            if ($request->filled('roles')) {
                $user->roles()->sync($request->input('roles'));
            }

            # set a success message in the session
            session()->flash('success', 'User has been successfully added!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            # handle validation errors and flash them to the session
            session()->flash('error', implode(' ', $e->validator->errors()->all()));
            return redirect()->back()->withInput(); # redirect back with old input
        } catch (\Exception $e) {
            # log the exception and flash a generic error message
            //dd($e->getMessage());
            \Log::error('Error adding user: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput(); # redirect back with old input
        }

        # redirect to the users index page
        return redirect()->route('admin.users.index');
    }


    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update($id, Request $request)
    {
        try {
            # Validate the incoming request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                 
            ]);

            # Find the user by ID
            $user = User::findOrFail($id);

            # Update the user's information
            $user->update($request->except('roles'));

            # Sync the user's roles
            $user->roles()->sync($request->input('roles', []));

            # Set a success message in the session
            session()->flash('success', 'You have successfully updated the user!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            # Flash validation errors to the session
            session()->flash('error', implode(' ', $e->validator->errors()->all()));
        } catch (\Exception $e) {
            # Handle any other exceptions
            session()->flash('error', 'Something went wrong. Please try again.');
        }

        # Redirect to the users index page
        return redirect()->route('admin.users.index');
    }


    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        session()->flash('warning', 'You have successfully deleted!');
        return back();

    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
