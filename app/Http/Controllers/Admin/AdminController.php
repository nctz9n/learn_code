<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

     public function __construct(){
        $this->middleware('owner');
     }
    public function index()
    {
        $auth_id =Auth::user()->id;
        $users =User::where('admin',1)->whereNotIn('id' ,[$auth_id])->orderBy('id' ,'desc')->paginate(15);
        return view('admin.admins.index' ,['users'=>$users]);

    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(UserRequest $request, User $model)
    {

        $model->create($request->merge(['password' =>Hash::make($request->get('password'))])->all());
        return redirect()->route('admins.index')->withStatus(__('Admin successfully created.'));

    }

    public function edit(User $admin){
        return view('admin.admins.edit',compact('admin'));
    }

    public function update(Request $request ,User $admin){

        $rules=[
            'name'=>'required|string|min:5|max:30',
            'email'=>'required|email',
            'password'=>'nullable|min:6|confirmed',
        ];

        $this->validate($request ,$rules);
        $admin->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
            ->except([$request->get('password') ? '' :'password']));

            return redirect()->route('admins.index')->withStatus(__('Admin successfully update'));


    }

    public function destroy(User $admin){
        $admin->delete();
        return redirect()->route('admins.index')->withStatus(__('Admin successfully deleted.'));
    }


}
