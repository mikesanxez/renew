<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    //protected $username = 'Email';
    //protected $redirectAfterLogout = 'login';
    //protected $loginPath = 'login';
    protected $redirectTo = '/';

    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'apellido' => ['required', 'regex:/^[\pL\s]+$/u'],
            'telefono' => 'required|numeric',
            'username' => 'required|alpha_num',
        ]);
    }

   
    protected function create(array $data)
    {
        return $usuario = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'apellido' => $data['apellido'],
            'telefono' => $data['telefono'],
            'username' => $data['username'],
            'rol_id' => '2',
        ]);
    }
/*
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);
    }

    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'Email';
    }

    protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }   */
}
