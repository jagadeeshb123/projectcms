<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;

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

        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);

        Return redirect('/admin/users');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update($user)
    {
        $password = bcrypt(request('password'));
        User::where(['id'=>$user])->update([
            'name'=> \request('name'),
            'email'=> \request('email'),
            'password'=> $password,
            'role_id'=> \request('role_id'),
            'is_active'=> \request('is_active'),
        ]);

        return redirect('/admin/users');

    }

    public function destroy($user)
    {
        User::where(['id'=>$user])->delete();

        return redirect('/admin/users');
    }
}
