<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Requests\ClassesRequest;
use App\Mail\SendEmail;
use App\Models\classes_student;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ClassesController extends Controller
{
    public function show()
    {
        $classes = Classes::select([
            'id',
            'name',
            'semester',
            'description',
            'created_at',
            'updated_at',
        ])->paginate();

        return view('admin.classes.show', compact('classes'));
    }

    public function show1($id)
    {
        $student_id = $id;
        $addedclasses = classes_student::select('classes_id')->where('student_id', '=', $student_id)->get();

        $classes = Classes::select([
            'id',
            'name',
            'semester',
            'description',
            'created_at',
            'updated_at',
        ])->whereNotIn('id', $addedclasses->toArray())
            ->paginate();
        return view('admin.students.add_classes_students', compact('classes', 'student_id'));
    }

    public function detail($id)
    {
        $class = Classes::find($id);
        $students = $class->Student()->get();
        $courses = $class->courses()->get();
        return view('admin.classes.detail', compact('class', 'students', 'courses'));
    }
    public function create()
    {
        return view('admin.classes.create');
    }
    public function store(Request $request)
    {
        try {
            DB::table('classes')->insert([
                'name' => $request->name,
                'semester' => $request->semester,
                'description' => $request->description,
            ]);
        } catch (\Throwable $e) {
            throw new ModelNotFoundException();
        }
        return redirect(route('class.create'));
        //dd($request);
    }

    public function formedit(Request $request, $id)
    {
        $class = Classes::find($id);
        if ($class) {
            return view('admin.classes.formedit', compact('class'));
        }
        return redirect(route('class.show'));
    }

    public function edit(ClassesRequest $request, $id)
    {
        $class = Classes::find($id);
        if ($class) {
            $class->name = $request->input('name');
            $class->semester = $request->input('semester');
            $class->description = $request->input('description');
            $class->save();
            $msg = 'Update classs is success!';
            return redirect(route('class.show'))->with('msg', $msg);
        }
    }

    public function destroy(Request $request)
    {
        $class_id = $request->input('class_id', 0);
        if ($class_id) {
            Classes::destroy($class_id);
            return redirect(route('class.show'))->with('msg', "Delete class {$class_id} success!");
        } else {
            throw new ModelNotFoundException();
        }
    }

    public function add_student(Request $request)
    {
        //dd($request);
        $classes_id = $request->input('classes_id');
        $student_id = $request->input('student_id');
        $class = DB::table('classes_student')
            ->insert([
                'classes_id' => $classes_id,
                'student_id' => $student_id
            ]);
        if ($class) {
            $student = Student::find($student_id);

            $to_email = $student->email;

            Mail::to($to_email)->send(new SendEmail);
            return redirect(route('student.add_classes_students', [$student_id]));
        }
    }
    public function add_list_student($id)
    {
        $class_id = $id;
        $addedstudent = classes_student::select('student_id')->where('classes_id', '=', $class_id)->get();
        $students = Student::select()->whereNotIn('id', $addedstudent->toArray())->paginate();
        $url = url::previous();
        return view('admin.classes.add_list_student', compact('students', 'class_id', 'url'));
    }

    public function add_listid(Request $request, $id)
    {
        $url = $request->input('url');
        $input = $request->except('_token', 'url');
        foreach ($input as  $a) {
            $create['student_id'] = $a;
            $create['classes_id'] = $id;
            classes_student::create($create);
        }
        return redirect($url);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $classes = Classes::select()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('semester', $query)
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(12);

            return view('admin.classes.__render', compact('classes'))->render();
        }
    }

    public function searchclass(Request $request)
    {
        $student_id = $request->input('student_id');
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $classes = DB::table('classes')->select()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('semester', $query)
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(12);

            return view('admin.students.__render_addclass', compact('classes', 'student_id'))->render();
        }
    }
}
