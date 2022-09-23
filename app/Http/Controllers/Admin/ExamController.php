<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\exam_question;
use App\Models\ExamHistory;
use App\Models\examRequest;
use App\Models\Question;
use App\Models\question_exams;
use Illuminate\Support\Facades\DB;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::select()->paginate();
        $tag=Exam::select('tag')->distinct()->get();

        return view('admin.exam.all-exams')->with('exams', $exams)->with('category',$tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.add-exam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Exam::create($input);
        return redirect(route('exam.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exams = Exam::find($id);

        $question = $exams->questions()->orderBy('id')
            ->get();
        $count = 0;
        $sum = 0;
        foreach ($question as $a) {
            $sum += $a->point;
            $count++;
        }
        $exams->maxpoint = $sum;

        $examRequest = DB::table('exam_request')->join('student_exam_histories', 'exam_history_id', '=', 'student_exam_histories.id')
            ->where('student_exam_histories.exam_id', '=', "$id")
            ->get();
        
        return view('admin.exam.exam-details')->with('exam', $exams)->with('questions', $question)->with('count', $count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exams = Exam::find($id);
        return view('admin.exam.edit-exam')->with('exam', $exams);
    }


    public function update(Request $request, $id)
    {
        $exams = Exam::find($id);
        $input = $request->all();

        $exams->update($input);
        return redirect(url('admin/exam'))->with('flash_message', 'Exams Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::destroy($id);

        return redirect(url('admin/exam'))->with('flash message', "Question delete successfully");
    }
    public function deleteQuestion($id, $idq)
    {
        $deleted = exam_question::where('exam_id', "$id")
            ->where('question_id', "$idq")
            ->delete();
        return redirect(route('exam.show', $id));
    }
    public function createQuestionToExam($id)
    {
        $exams = Exam::find($id);

        $exam_questions = $exams->questions()->pluck('question_id');

        $questions = Question::select()
            ->whereNotIn('id', $exam_questions->toArray())
            ->paginate();
        $exam = Exam::find($id);
        return view('admin.exam.exam-add-question')->with('exam', $exam)->with('questions', $questions);
    }

    public function storeQuestionToExam(Request $request, $id)
    {
        $input = $request->all();

        foreach ($input as  $a) {
            $create['question_id'] = $a;
            $create['exam_id'] = $id;
            exam_question::create($create);
        }
        return redirect(url('admin/exam/' . $id));
    }
    // Lam bai va cham diem
    public function doExam($ids, $ide)
    {
        $exams = Exam::find($ide);

        $question = $exams->questions()->orderBy('id')
            ->get();
        return view('user.doExam')->with('data', $question)->with('ids', $ids)->with('ide', $ide)->with('exam', $exams);
    }
    public function getResult(Request $request, $ids, $ide)
    {
        $input = $request->all();

        $exams = Exam::find($ide);
        // dd($input);
        $question = $exams->questions()->orderBy('id')
            ->get();
        $examHistory['student_id'] = $ids;
        //dd($examHistory['student_id']);
        $examHistory['exam_id'] = $ide;
       
        $examHistory['test_time'] = $input['time'];

        $examHistory['point'] = 0;
        $examHistory1 = ExamHistory::create($examHistory);
        $i = 0;
        $point = 0;
        foreach ($question as $a) {
            if ($a->type == 1) {
                if (isset($input["$i"]) && $input["$i"] == $a->correct_answer)
                    $point += $a->point;
            } else if ($a->type == 2) {
                $ketqua = '';
                $b = $i * 10 + 1;
                if (isset($input["$b"]))
                    $ketqua .= '1';
                $b++;
                if (isset($input["$b"]))
                    $ketqua .= '2';
                $b++;
                if (isset($input["$b"]))
                    $ketqua .= '3';
                $b++;
                if (isset($input["$b"]))
                    $ketqua .= '4';
                if ($ketqua == $a->correct_answer) $point += $a->point;
            } else {

                $examRequest['exam_history_id'] = $examHistory1->id;
                // dd($examRequest['exam_history_id']);
                $examRequest['question_id'] = $a->id;
                $examRequest['answer'] = $input["traloi$i"];
                $examRequest['point'] = -1;
                examRequest::create($examRequest);
            }

            $i++;
        }
        $examHistory1->point = $point;
        $examHistory1->update();
        return 'Điểm của bạn là ' . $point;
    }


    public function processRequestExam()
    {
        $examRequest = examRequest::where('point', '=', '-1')->paginate();

        return view('admin.exam.all-exam-request')->with('exams', $examRequest);
    }

    public function scoreRequestExam(Request $request, $id)
    {
        $input = $request->all();
        $exam_request = examRequest::find($id);


        $exam_request->point = $input['point'];
        $exam_request->update($exam_request->toArray());
        $examHistory = ExamHistory::find($exam_request->exam_history_id);
        $examHistory->point += $input['point'];
        $examHistory->update($examHistory->toArray());

        return redirect('admin/request/exam');
    }

    public function searchexam(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('query');

            $fillter = $request->get('fillter');
            
            if ($fillter != '') {
                $exams = Exam::select()
                    ->where([['name', 'like', '%' . $query . '%'], ['tag', $fillter]])
                    ->orWhere([['tag', 'like', '%' . $query . '%'], ['tag', $fillter]])
                    
                    ->paginate(12);
            } else {
                $exams = Exam::select()
                    ->where('name', 'like', '%' . $query . '%')
                    ->orWhere('tag', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->paginate(12);
            }
            return view('admin.students.__render_addexam', compact('exams', 'student_id'))->render();
        }

    }

}