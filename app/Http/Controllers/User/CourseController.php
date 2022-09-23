<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Models\Students;
use App\Models\Courses;
use App\Models\courses_student;
use App\Models\Exam;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function allcourses()
    {
        $students = Students::select()->where('user_id', Sentinel::getUser()->id)->first();
        $courseStudent = courses_student::select('courses_id')->where('student_id', '=', "$students->id")->get();

        $courses = Courses::select()
            ->whereNotIn('id', $courseStudent->toArray())
            ->get();
        return view('user.courses.allcourses', compact('courses'));
    }

    public function question($ide, $ids)
    {
        $exams = Exam::find($ide);

        $question = $exams->questions()->orderBy('id')->get();

        return view('user.question')->with('data', $question)->with('ids', $ids)->with('ide', $ide)->with('exam', $exams);
    }

    public function coursedetail($id)
    {
        $students = Students::select()->where('user_id', Sentinel::getUser()->id)->first();
        $user = Sentinel::getUser();
        $course = Courses::find($id);
        $lessons = DB::table('lessons')->where('course_id', $course->id)->get();
        
        return view('user.student.dbcourses-detail', compact('course', 'lessons', 'students', 'user'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $courses = Courses::select()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('duration',  $query)
                ->orderBy('id', 'desc')
                ->paginate(12);

            return view('user.courses.__render', compact('courses'))->render();
        }
    }

    public function booking($id)
    {
        # code...
        $students = Students::select()->where('user_id', Sentinel::getUser()->id)->first();
        DB::table('courses_student')->insert([
            'student_id' => $students->id,
            'courses_id' => $id,
        ]);


        return redirect('course/allcourses');
    }
    public function learn($id)
    {
        $lesson = Lesson::find($id);
        return view('user.student.learn-lesson', compact('lesson'));
    }
}
