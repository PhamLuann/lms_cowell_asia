<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table){
            $table->id();
            $table->string('address');
            $table->string('img');
            $table->string('gender');
            $table->timestamps();

        });
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('semester');

            $table->string('description');
            $table->timestamps();
        });
         Schema::create('classes_student', function (Blueprint $table) {
            $table->id();
            $table->integer('classes_id');

            $table->integer('student_id');
            $table->timestamps();
        });
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('img');
            $table->integer('duration');
            $table->timestamps();
        });
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('maxpoint')->default(0);
            $table->string('description');
            $table->string('tag');
            $table->integer('time_limit');
            $table->timestamps();
        });

        Schema::create('classes_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('classes_id');

            $table->integer('courses_id');
            $table->timestamps();
        });
        Schema::create('courses_students', function (Blueprint $table) {
            $table->id();
            $table->integer('students_id');

            $table->integer('courses_id');
            $table->timestamps();
        });

        Schema::create('courses_exam', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id');

            $table->integer('courses_id');
            $table->timestamps();
        });
        Schema::create('exam_student', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');

            $table->integer('exam_id');

            $table->timestamps();
        });
        Schema::create('student_exam_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');

            $table->integer('exam_id');
            $table->integer('test_time');
            $table->integer('point');
            $table->timestamps();
        });



        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('course_id');
            $table->string('chapter');
            $table->string('description');
            $table->string('video_url')->nullable();
            $table->integer('exam_id');
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('answer1')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer3')->nullable();
            $table->string('answer4')->nullable();
            $table->string('correct_answer')->nullable();
            $table->string('type');
            $table->string('point');
            $table->timestamps();
        });

        Schema::create('exam_question', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id');
            $table->integer('exam_id');
            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->integer('lesson_id');
            $table->timestamps();
        });
        Schema::create('exam_request', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id');
            $table->integer('exam_history_id');
            $table->string('answer');
            $table->integer('point');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('classes_student');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('classes_course');
        Schema::dropIfExists('course_student');
        Schema::dropIfExists('exam_request');

        Schema::dropIfExists('course_exam');
        Schema::dropIfExists('exam_student');
        Schema::dropIfExists('student_exam_histories');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('question_exams');
        Schema::dropIfExists('files');
    }
};
