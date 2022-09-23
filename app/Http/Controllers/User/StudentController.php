<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Courses;
use App\Models\courses_student;
use App\Models\Student_Exam;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function dashboard(){
        $user = Sentinel::getUser();
        $students = Students::select()->where('user_id',$user->id)->first();
        $courseStudent=courses_student::select('courses_id')-> where('student_id','=',"$students->id")->get();

        $courses = Courses::select()
        ->whereNotIn('id',$courseStudent->toArray())
        ->get();

        return view('user.student.dashboard', compact('students', 'user','courses','courseStudent'));
    }

    public function dbprofile(){
        $user = Sentinel::getUser();
        $students = Students::select()->where('user_id',$user->id)->first();
        return view('user.student.dbprofile', compact('students','user'));
    }

    public function store(Request $request)
    {
        $image = $request->file('img');
        $path = Storage::putFile('images', $image);
       
        $learner=$request->all();
        $learner['img'] = $path;
    
        $learner['roleid'] ='1';
        Students::create($learner);
        User::create($learner);
        return redirect(route('user.student.dbprofile'));
    }

    public function update(Request $request){
        $user = Sentinel::getUser();
            $user->last_name = $request->get('last_name');
            $user->first_name = $request->get('first_name');
            $user->birthday = $request->get('birthday');
        $students = Students::find($request->get('student_id'));
            $students->gender = $request->get('gender');
            $students->address = $request->get('address');

        if ($request->hasFile('img')){
            $image = $request->file('img');
            $path = Storage::putFile('images', $image);
            $students->img = $path;
        }
        $students->save();
        $user->save();
        return view('user.student.dbprofile', compact('students','user'));
    }
    public function create(){
        return view('user.student.edit-dbprofile');
    }
    public function editdbprofile(){

        $user = Sentinel::getUser();
        $students = Students::select()->where('user_id',$user->id)->get();
        return view('user.student.edit-dbprofile', compact('students','user'));

    }

    public function dbexam(){
        $user = Sentinel::getUser();
        $students = Students::select()->where('user_id',$user->id)->first();

        $stexam = DB::table('student_exams AS se')->select([
            'exams.id',
            'name',
            'description',
            'time_limit',
        ])
        ->join('exams', 'exams.id', '=', 'se.exam_id')
        ->where('student_id', $students->id)
        ->get();
        // dd($stexam);
       $history=DB::table('student_exam_histories')->where('student_id',$students->id)->get();

        return view('user.student.dbexam', compact('students', 'user', 'stexam','history'));
    }

    public function dbcourses(){
        $user = Sentinel::getUser();
        $students = Students::select()->where('user_id',$user->id)->first();
        $courseStudent=courses_student::select('courses_id')-> where('student_id','=',"$students->id")->get();
        $courses = Courses::select()->whereIn('id',$courseStudent->toArray())->get();
        return view('user.student.dbcourses', compact('students','user', 'courses'));
    }

}
