<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\User_team_relation;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' =>['sometimes','image','mimes:jpg,jpeg,png,bmp,svg','max:5000'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {   
        if(request()->has('addProfilePicture')){
            $avatarUpload = request()->file('addProfilePicture');
            $avatarName = time() . '.'.$avatarUpload->getClientOriginalExtension();
            $avatarPath = public_path('/img/avatar');
            $avatarUpload -> move($avatarPath,$avatarName);
            $id = Auth::user()->id;
            $user = new User();
            $user->name = request('name');
            $user->created_by = $id;
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->isAdmin = request('userType');
            $user->avatar = $avatarName;
            $user->status = '1';
            $user->save();
        }
        else{
            $id = Auth::user()->id;
            $user = new User();
            $user->name=request('name');
            $user->created_by = $id;
            $user->email= request('email');
            $user->password = Hash::make(request('password'));
            $user->isAdmin = request('userType');
            $user->avatar = 'default-avatar.jpg';
            $user->status = '1';
            $user->save();

        }

        $relation = new User_team_relation();
        $relation->userId=$user->id;
        $relation->teamId = request('UserTeam');
        $relation->save();

        // return redirect('/users/'.$user->id);


    }

    public function changepassword($id){

        $user=User::findorfail($id);
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect('users/'.$id);

    }

}
