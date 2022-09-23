<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\classes_course;
use App\Models\Course;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Courses::select()
            ->paginate(8);
        return view('admin.courses.all-course', compact('courses'));
    }

    public function index1($id)
    {
        $classes_id = $id;
        $addedcourse = classes_course::select('course_id')->where('classes_id', '=', $classes_id)->get();
        $courses = Courses::select()->whereNotIn('id', $addedcourse->toArray())
            ->paginate(8);
        return view('admin.classes.add_courses_classes', compact('courses', 'classes_id'));
    }
    public function add_course(Request $request)
    {
        // dd($request);
        $course_id = $request->input('course_id');
        $class_id = $request->input('classes_id');
        DB::table('classes_course')
            ->insert([
                'classes_id' => $class_id,
                'course_id' => $course_id,
            ]);
        return redirect(route('class.add_courses_classes', [$class_id]));
    }

    public function detail($id)
    {
        # code...
        $course = Courses::find($id);
        $lessons = DB::table('lessons')->where('course_id', $course->id)->get();
        $exams = $course->exams()->get();
        $classes = $course->classes()->get();
        $students = $course->student()->get();
        return view('admin.courses.detail-course', compact('course', 'lessons', 'exams', 'classes', 'students'));
    }

    public function addcourse()
    {
        $course = new Courses();
        return view('admin.courses.add-course', compact('course'));
    }


    public function store(CourseRequest $request)
    {
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $path = Storage::putFile('images', $image);
        try {
            DB::table('courses')->insert([
                'name' => $request->name,
                'duration' => $request->duration,
                'description' => $request->description,
                'img' => $path,
            ]);
        } catch (\Throwable $t) {
            throw new ModelNotFoundException();
        }
        return redirect(route('course.allcourse'));
    }
    public function edit(Request $request, $id)
    {
        $course = Courses::find($id);
        if ($course) {
            return view('admin.courses.edit-course', compact('course'));
        }
        return redirect(route('course.allcourse'));
    }



    public function update(CourseRequest $request, $id)
    {
        $course = Courses::find($id);
        if (!$request->hasFile('image') && empty($course->img)) {
            // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::putFile('images', $image);
            $course->img = $path;
        }
        if ($course) {
            $course->name = $request->input('name');
            $course->duration = $request->input('duration');
            $course->description = $request->input('description');
            $course->save();
            $msg = 'Update Courses is success!';
            return redirect(route('course.allcourse'))->with('msg', $msg);
        }
    }
    public function destroy(Request $request)
    {
        # code...
        $course_id = $request->input('course_id', 0);
        if ($course_id) {
            $classes = DB::table('classes_courses')->select('id')->where('courses_id', $course_id)->get();
            $students = DB::table('courses_students')->select('id')->where('courses_id', $course_id)->get();
            if(count($classes) == 0 && count($students) == 0){
                Courses::destroy($course_id);
                $lessons = Lesson::select('id')->where('course_id', $course_id)->get();
                foreach ($lessons as $lesson) {
                    $lesson->delete();
                }
            } else {
                return redirect(route('course.allcourse'))->with('msg', "Have class or student studying this course");
            }
            return redirect(route('course.allcourse'))->with('msg', "Delete course {$course_id} success!");
        } else {
            throw new ModelNotFoundException();
        }
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
                ->paginate(8);

            return view('admin.courses.__render', compact('courses'))->render();
        }
    }
    public function searchcourse(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $courses = Courses::select()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('duration',  $query)
                ->paginate(8);

            return view('admin.students.__render_addcourse', compact('courses'))->render();
        }
    }
}
