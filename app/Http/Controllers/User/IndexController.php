<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class IndexController extends Controller
{
    public function index(){
        $courses = Courses::select()->get();
        return view('user.index', compact('courses'));
    }

    public function search(){
        return view('user.search'); 
    }
    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    
}
