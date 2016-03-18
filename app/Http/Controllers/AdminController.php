<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
		$this->middleware('admin');
	}

    public function index(){
    	$usuarios = User::where("rol_id", "2")->get();
    	return view('admin.Usuarios', compact('usuarios'));
    }
}
