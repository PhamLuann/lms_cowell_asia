<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\SendEmailCourse;
use App\Models\Course;
use App\Models\course_student;
use App\Models\Exam;
use App\Models\exam_student;

class StudentController extends Controller
{
    public function show()
    {
        $students = Student::select([
            'id',
            'img',
            'created_at',
            'updated_at',
            'gender',
        ])
            ->paginate();

        return view('admin.students.show', compact('students'));
    }
    public function create()
    {
        return view('admin.students.create');
    }

    public function profile($id)
    {
        $student = Student::find($id);
        $classes = $student->Classes()->get();
        $courses = $student->Courses()->get();
        return view('admin.students.profile', compact('student', 'classes', 'courses'));
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('img')) {
            //     // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('img');
        $path = Storage::putFile('images', $image);

        $learner = $request->all();
        $learner['img'] = $path;

        $learner['role_id'] = '3';

        $user = $request->get('email');
        Student::create($learner);

        return redirect(route('student.show'));
    }

    public function formedit(Request $request, $id)
    {
        $student = Student::find($id);
        if ($student) {
            return view('admin.students.formedit', compact('student'));
        }
        return redirect(route('student.show'));
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);
        if ($request->hasFile('img')) {
            // Nếu không thì in ra thông báo
            $image = $request->file('img');
            $path = Storage::putFile('images', $image);
            $student->img = $path;
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        if ($student) {
            $student->name = $request->input('name');
            $student->address = $request->input('address');
            $student->email = $request->input('email');
            $student->gender = $request->input('gender');
            $student->save();
            $msg = 'Update students is success!';
            return redirect(route('student.show'))->with('msg', $msg);
        }
    }
    public function destroy(Request $request)
    {
        # code...
        $student_id = $request->input('student_id', 0);
        if ($student_id) {
            student::destroy($student_id);
            return redirect(route('student.show'))->with('msg', "Delete student {$student_id} success!");
        } else {
            throw new ModelNotFoundException();
        }
    }

    public function add_exam($id)
    {
        $student_id = $id;
        $addedexam = exam_student::select('exam_id')->where('student_id', '=', $student_id)->get();
        $exams = Exam::select()->whereNotIn('id', $addedexam->toArray())->paginate();

        return view('admin.students.add_exams_student')->with('exams', $exams)->with('student_id', $student_id);
    }

    public function addidexam(Request $request)
    {
        $exam_id = $request->input('exam_id');
        $student_id = $request->input('student_id');
        $exam = DB::table('exam_student')
            ->insert([
                'exam_id' => $exam_id,
                'student_id' => $student_id
            ]);
        if ($exam) {
            $student = Student::find($student_id);

            $to_email = $student->email;

            Mail::to($to_email)->send(new SendEmail);
            return redirect(route('student.add_exam', [$student_id]));
        }
    }

    public function add_course($id)
    {
        $student_id = $id;
        $addedcourse = course_student::select('course_id')->where('student_id', '=', $student_id)->get();
        $courses = Course::select()->whereNotIn('id', $addedcourse->toArray())
            ->paginate(12);
        return view('admin.students.add_courses_students', compact('courses', 'student_id'));
    }

    public function addidcourse(Request $request)
    {
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');
        $course = DB::table('course_student')
            ->insert([
                'course_id' => $course_id,
                'student_id' => $student_id
            ]);
        if ($course) {
            $student = Student::find($student_id);

            $to_email = $student->email;

            Mail::to($to_email)->send(new SendEmailCourse);
            return redirect(route('student.add_course', [$student_id]));
        }
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $students = Student::select()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('address', 'like', '%' . $query . '%')
                ->orWhere('gender', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(12);
            return view('admin.students.__render', compact('students'))->render();
        }
    }
}
