<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles_array = Role::pluck('role_name', 'id')->all();
        return view('admin.users.create', compact('roles_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        if (trim($request->password) == '') {
            $user_data = $request->except('password');
        } else {

            $user_data = $request->all();

            $user_data['password'] = bcrypt($request->password);

            if ($file = $request->file('photo_id')) {

                $name = $file->getClientOriginalName() . time();
                $file->move('images', $name);

                $profile_photo = Photo::create(['path' => $name]);

                $user_data['photo_id'] = $profile_photo->id;
            }
            User::create($user_data);
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles_array = Role::pluck('role_name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (trim($request->password) == '') {
            $user_data = $request->except('password');
        } else {
            $user_data = $request->all();
            $user_data['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id')) {

            $name = $file->getClientOriginalName() . time();
            $file->move('images', $name);

            $profile_photo = Photo::create(['path' => $name]);

            $user_data['photo_id'] = $profile_photo->id;
        }

        $user->update($user_data);
        Session::flash('user.update', 'The User: ' . $user->name . ' has been updated successfully!');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path() . $user->photo->path);

        $user->delete();
        Session::flash('user.delete', 'The User: ' . $user->name . ' has been deleted successfully!');

        return redirect()->route('users.index');
    }
}
