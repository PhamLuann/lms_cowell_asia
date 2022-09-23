<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'course_id' =>      ['required'],
            'name' =>           ['required', 'max:255'],
            'file' =>       ['required'],
            'description' =>    ['required'],
            'chapter' =>    ['required'],
            'exam_id'=>    ['required'],
        ];
    }
}
