<?php namespace App\Http\Controllers;

/**
 * Class AdminUsersController
 *
 * Admin can add remove update user information
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App\Http\Controllers
 */

use App\Models\CMS\Photo;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * View all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Create new user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store user in database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate(request(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'role_id'   => 'required',
            'is_active' => 'required',
            'password'  => 'required',
            'photo_id'  => 'required'
        ]);

        if($request->file(['photo_id']))
        {
            $photo              = Photo::addPhotoToPublic($request);
            $input['photo_id']  = $photo->id;
        }

        $input['password']  = bcrypt($request->get('password'));
        $user               = User::create($input);

        if(!isset($user->id))
        {
            return redirect()->back()->withInput()->withErrors('Could not save successfully');
        }

        Return redirect('/admin/users');
    }

    /**
     * Edit user information
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user info to database
     *
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(request $request, $user)
    {
        $data = [];
        $feildsToValues = [
            'name',
            'email',
            'role_id',
            'is_active',
            'password'
        ];

        foreach ($feildsToValues as $feild)
        {

            if($request->get($feild))
            {
                $data[$feild] = $request->get($feild);
            }

        }

        if($request->file(['photo_id']))
        {
            $photo              = Photo::addPhotoToPublic($request);
            $data['photo_id']   = $photo->id;
        }

        Auth::user()->where(['id'=>$user])->update($data);

        return redirect('/admin/users');

    }
    /**
     * Delete user from database
     *
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);
        unlink(public_path(). $user->photo->file);
        $user->delete();

        return redirect('/admin/users');
    }
}
