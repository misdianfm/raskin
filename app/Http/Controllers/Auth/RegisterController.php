<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'level' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data /*Request $request*/)
    {
        /*$pengguna = new User();
        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);

        return redirect()->back();*/
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'level' => $data['level'],
        ]);
        $adminRole = Role::where('name','admin')->first();
        $user->attachRole($adminRole);
        return $user;
        /*$role = new App\Role(['name' => 'admin']);
        $user->roles()->save($role);
        return $user;*/
    }
    public function register(\Illuminate\Http\Request $request)
    {
        // validate the form 

        $this->validator($request->all())->validate();

        // add the user
        $this->create($request->all());

        // redirect user
        return redirect($this->redirectPath())->with('sukses', 'Berhasil menambah data pengguna.');
    }
    public function __construct()
    {
        $this->middleware('superadmin');
    }
}
