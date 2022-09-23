<?php

namespace App\Http\Controllers\Admin\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LessonRequest;
use App\Models\Courses;
use App\Models\Exam;
use App\Models\File;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class LessonController extends Controller
{
    //
    public function index(Request $request)
    {
        $lessons = Lesson::select([
            'id',
            'name',
            'course_id',
            'chapter',
            'description',
        ])
            ->paginate(12);
        $courses = Courses::select()->get();
        $chapters = Lesson::select('chapter')->distinct()->get();

        return view('admin.lessons.all-lesson', compact('courses', 'chapters', 'lessons'));
    }

    public function detail($id)
    {
        $lesson = Lesson::find($id);
        return view('admin.lessons.detail-lesson', compact('lesson'));
    }

    public function create()
    {
        $courses = Courses::all();
        $exams = Exam::select(['id', 'name'])->get();
        return view('admin.lessons.add-lesson', compact('courses', 'exams'));
    }

    public function store(LessonRequest $request)
    {   
        $lesson = $request->except('_token', 'file');
        $files = $request->file('file');
        $paths = [];
        foreach ($files as $file) {
            array_push($paths, Storage::putFile('Lesson-files', $file));
        }

        if ($new_lesson = Lesson::create($lesson)) {
            $lesson_id = $new_lesson->id;
            foreach ($paths as $path) {
                File::create([
                    'file' => $path,
                    'lesson_id' => $lesson_id,
                ]);
            }
            return redirect(route('lesson.all'));
        }
    }

    public function edit(Request $request, $id)
    {
        $url = url::previous();     //to return previos page
        $lesson = Lesson::find($id);
        $courses = Courses::all()->where('id', '<>', $lesson->course()->first()->id);
        $exams = Exam::all()->where('id', '<>', $lesson->exam()->first()->id);
        if ($lesson) {
            return view('admin.lessons.edit-lesson', compact('lesson', 'courses', 'exams', 'url'));
        }
        return redirect(route('lesson.all'));
    }

    public function update(Request $request, $id)
    {
        $url = $request->get('pre-url');
        $lesson = Lesson::find($id);
        $paths = [];
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                array_push($paths, Storage::putFile('Lesson-files', $file));
            }
        }
        if ($lesson) {
            $lesson->course_id = $request->get('course_id');
            $lesson->name = $request->input('name');
            $lesson->chapter = $request->input('chapter');
            $lesson->description = $request->input('description');
            $lesson->video_url = $request->input('video_url');
            $lesson->exam_id = $request->input('exam_id');
            $lesson->save();

            if (!empty($paths)) {
                $lesson_id = $lesson->id;
                foreach ($paths as $path) {
                    File::create([
                        'file' => $path,
                        'lesson_id' => $lesson_id,
                    ]);
                }
            }
            $msg = 'Update Lesson is success!';
            return redirect($url)->with('msg', $msg);
        }
    }

    public function destroy(Request $request)
    {
        # code...
        $url = url::previous();
        $lesson_id = $request->get('lesson_id', 0);
        if ($lesson_id) {
            Lesson::destroy($lesson_id);
            $files = File::select('id')->where('lesson_id', $lesson_id)->get();
            foreach($files as $file){
                $file->delete();
            }
            return redirect($url)->with('msg', "Delete lesson {$lesson_id} success!");
        } else {
            throw new ModelNotFoundException();
        }
    }

    public function deletefile(Request $request)
    {
        $id = $request->get('id');
        File::destroy($id);
    }
    // download zip
    public function downloadzip(Request $request, $id)
    {
        $file = File::find($id);
        return response()->download($file->file);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $fillter = $request->get('fillter');
            if ($fillter != '') {
                $lessons = Lesson::select()
                    ->where([['name', 'like', '%' . $query . '%'], ['course_id', $fillter]])
                    ->orWhere([['name', 'like', '%' . $query . '%'], ['chapter', $fillter]])
                    ->orWhere([['description', 'like', '%' . $query . '%'], ['course_id', $fillter]])
                    ->orWhere([['description', 'like', '%' . $query . '%'], ['chapter', $fillter]])
                    ->paginate(12);
            } else {
                $lessons = Lesson::select()
                    ->where('name', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->paginate(12);
            }
            return view('admin.lessons.__render', compact('lessons'))->render();
        }
    }
}
