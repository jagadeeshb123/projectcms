<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use PhpParser\Node\Stmt\Return_;

class AdminUsersController extends Controller
{
    public function index(){

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required'
        ]);

        $photo = Photo::addPhotoToPublic($request);
        $password = bcrypt($request->password);
        $data = User::updateValidation($request, $photo, $password);
        User::create($data);

        Return redirect('/admin/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(request $request, $user)
    {
        $photo = $password = null;
        if($request->photo_id)
            $photo = Photo::addPhotoToPublic($request);
        if($request->password)
            $password = bcrypt($request->password);
        //checking for updated fields and passing to assoc array
        $data = User::updateValidation($request, $photo, $password);

        Auth::user()->where(['id'=>$user])->update($data);

        return redirect('/admin/users');
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        unlink(public_path(). $user->photo->file);
        $user->delete();

        return redirect('/admin/users');
    }
}
