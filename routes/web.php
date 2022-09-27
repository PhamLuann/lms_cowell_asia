<?php


use App\Http\Controllers\Admin\Classes\ClassesController;


use App\Http\Controllers\Admin\Courses\CourseController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Lesson\LessonController;
use App\Http\Controllers\Admin\Lesson\SearchController;
use App\Models\Course;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\Student\StudentController as StudentStudentController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\StudentController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\User\CourseController as UserCourseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', [IndexController::class, 'index'])->name('admin.index');

Route::get('student/{ids}/exam/{ide}',[ExamController::class, 'doExam']);
Route::post('student/{ids}/exam/{ide}',[ExamController::class, 'getResult']);
Route::prefix('user')->group(function(){
    Route::post('login', [LoginController::class, 'postLogin'])->name('login.post');
    Route::get('/home', [IndexController::class, 'indexu'])->name('home');
    Route::get('login', [IndexController::class, 'login'])->name('login');
    Route::get('register', [IndexController::class, 'register'])->name('register');
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware('myweb.auth:editor')->group(function () {
    Route::get('/home', [IndexController::class, 'index'])->name('admin.index');
    Route::get('/homeEdit', [IndexController::class, 'indexedit'])->name('adminedit.index');


    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/add', [StudentStudentController::class, 'create'])->name('create');
        Route::post('/add', [StudentStudentController::class, 'store'])->name('store');
        Route::get('/show', [StudentStudentController::class, 'show'])->name('show');
        Route::get('/profile/{id}', [StudentStudentController::class, 'profile'])->name('profile');
        Route::get('/edit/{id}', [StudentStudentController::class, 'formedit'])->name('formedit');
        Route::post('/edit/{id}', [StudentStudentController::class, 'edit'])->name('edit');
        Route::delete('/destoy', [StudentStudentController::class, 'destroy'])->name('destroy');
        Route::get('/addclass/{id}', [ClassesController::class, 'show1'])->name('add_classes_students');
        Route::post('/addid', [ClassesController::class, 'add_student'])->name('add_id');
        Route::get('/search', [StudentStudentController::class, 'search'])->name('search');
        Route::get('/addexam/{id}', [StudentStudentController::class, 'add_exam'])->name('add_exam');
        Route::post('/addidexam', [StudentStudentController::class, 'addidexam'])->name('addidexam');
        Route::get('/addcourse/{id}', [StudentStudentController::class, 'add_course'])->name('add_course');
        Route::post('/addidcourse', [StudentStudentController::class, 'addidcourse'])->name('addidcourse');

    });
    Route::prefix('class')->name('class.')->group(function () {
        Route::get('/add', [ClassesController::class, 'create'])->name('create');
        Route::post('/add', [ClassesController::class, 'store'])->name('store');
        Route::get('/show', [ClassesController::class, 'show'])->name('show');
        Route::get('/detail/{id}', [ClassesController::class, 'detail'])->name('detail');
        Route::get('/edit/{id}', [ClassesController::class, 'formedit'])->name('formedit');
        Route::post('/edit/{id}', [ClassesController::class, 'edit'])->name('edit');
        Route::delete('/destroy', [ClassesController::class, 'destroy'])->name('destroy');
        Route::get('/addcourses/{id}', [CourseController::class, 'index1'])->name('add_courses_classes');
        Route::post('/addid', [CourseController::class, 'add_course'])->name('add_id');
        Route::get('/addliststudent/{id}', [ClassesController::class, 'add_list_student'])->name('add_list_student');
        Route::post('/addlistid/{id}', [ClassesController::class, 'add_listid'])->name('add_listid');

        Route::get('/search', [ClassesController::class, 'searchclass'])->name('searchclass');
    });

    Route::prefix('/courses')->name('course.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('allcourse');
        Route::get('/show/{id}', [CourseController::class, 'detail'])->name('detail');
        Route::get('/pagination/fetch_data', [CourseController::class, 'search'])->name('search');
        Route::get('/addcourse', [CourseController::class, 'addcourse'])->name('addcourse');
        Route::post('addcourse', [CourseController::class, 'store'])->name('store');
        Route::get('/editcourse/{id}', [CourseController::class, 'edit'])->name('editcourse');
        Route::post('/editcourse/{id}', [CourseController::class, 'update'])->name('update');
        Route::delete('/delete', [CourseController::class, 'destroy'])->name('delete');
        Route::get('/show/{id}', [CourseController::class, 'detail'])->name('detail');
        Route::get('/search', [CourseController::class, 'searchcourse'])->name('searchcourse');
    });
    
    Route::prefix('/user')->middleware('myweb.auth:admin')->name('user.')->group(function(){
        Route::get('/',[UserController::class, 'index'])->name('all');
        Route::get('/adduser',[UserController::class, 'adduser'])->name('add');
        Route::get('/edit/{id}', [UserController::class, 'editForm'])->name('editform');
        Route::post('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::delete('/destoy',[UserController::class, 'destoy'])->name('destoy');
        Route::post('/add', [UserController::class, 'store'])->name('store');
        Route::get('/search', [UserController::class, 'search'])->name('search');
        
    });

    Route::get('/show/{id}', [CourseController::class, 'detail'])->name('detail');
    Route::prefix('/lessons')->name('lesson.')->group(function(){
        Route::get('/', [LessonController::class, 'index'])->name('all');
        Route::get('/pagination/fetch_data', [LessonController::class, 'search'])->name('search');
        Route::get('/show/{id}', [LessonController::class, 'detail'])->name('detail');
        Route::get('/create', [LessonController::class, 'create'])->name('create');
        Route::post('/create', [LessonController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LessonController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [LessonController::class, 'update'])->name('updatelesson');
        Route::delete('/delete', [LessonController::class, 'destroy'])->name('delete');
        Route::get('/downloadzip/{id}', [LessonController::class, 'downloadzip'])->name('download');
        Route::get('/delete-file', [LessonController::class, 'deletefile'])->name('deletefile');
    });
    Route::get('exam/{id}/create',[ExamController::class, 'createQuestionToExam']);
    Route::get('exam/{id}/add',[ExamController::class, 'storeQuestionToExam'])->name('question_to_exam');
    Route::resource('/question', QuestionController::class);
Route::resource('/exam', ExamController::class);
Route::get('search/question', [QuestionController::class, 'searchByNameAnswer1Type'])->name('search');
Route::get('exam/{id}/delete/{idq}',[ExamController::class, 'deleteQuestion']);
Route::get('exam/{id}/create',[ExamController::class, 'createQuestionToExam']);
Route::get('exam/{id}/add',[ExamController::class, 'storeQuestionToExam']);
Route::get('request/exam',[ExamController::class, 'processRequestExam']);
Route::post('request/exam/{id}',[ExamController::class, 'scoreRequestExam'])->name('requestexam');
Route::get('search/exam', [ExamController::class, 'searchexam'])->name('searchexam');
Route::get('search/stexam', [ExamController::class, 'searchstexam'])->name('searchstexam');
Route::get('student/{ids}/exam/{ide}', [UserCourseController::class, 'question'])->name('question');


});





Route::get('sendemail/{id}', [StudentController::class, 'sendEmail'])->name('sendEmail');
Route::get('/search', [ClassesController::class, 'search'])->name('searchclass');


Route::prefix('student')->middleware('myweb.auth:user')->group(function(){
    Route::get('dashboard', [StudentController::class, 'dashboard'])->name('dashboard');

    Route::get('dbcourses', [StudentController::class, 'dbcourses'])->name('dbcourses');


    Route::get('dbexam', [StudentController::class, 'dbexam'])->name('dbexam');

    Route::get('dbprofile', [StudentController::class, 'dbprofile'])->name('dbprofile');

    Route::post('add',[StudentController::class, 'store'])->name('store');

    Route::post('update',[StudentController::class, 'update'])->name('update');

    Route::get('edit-dbprofile', [StudentController::class, 'editdbprofile'])->name('edit-dbprofile');

    
});

Route::prefix('course')->group(function(){
    Route::get('question', [UserCourseController::class, 'question'])->name('question');
    Route::get('allcourses', [UserCourseController::class, 'allcourses'])->name('allcourses');
    Route::get('search', [UserCourseController::class, 'search'])->name('search');
    Route::get('booking/{id}', [UserCourseController::class, 'booking'])->name('booking');
    Route::get('viewcourse/{id}', [UserCourseController::class, 'coursedetail'])->name('cdetail');
    Route::get('/show/{id}', [UserCourseController::class, 'learn'])->name('learn');

});
