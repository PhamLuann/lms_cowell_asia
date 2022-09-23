<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function indexedit(){
        return view('admin.indexedit');
    }


    public function index(){
        return view('admin.index');
    }


    public function indexu(){
        $courses = Courses::select()->get();
        return view('user.index', compact('courses'));
    }

    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function allcourses(){
        return view('user.courses.allcourses');
    }
}
