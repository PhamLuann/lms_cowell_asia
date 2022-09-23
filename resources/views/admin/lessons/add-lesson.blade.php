@extends('admin.layouts.app')
@section('title', 'Add Lesson')

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15 " style="min-height: 500px; margin-top: 50px;">
    <div class="container-fluid">
        <form action="{{route('lesson.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-left: 15%;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <span style="font-size: 14px" class="label label-info">Select course</span>
                            <select id="course_id" name="course_id" class="form-control form-select @error('course_id') is-invalid @enderror">
                                <option value="">-</option>
                                @forelse($courses as $course)
                                @if ($course->id == old('course_id'))
                                <option selected="selected" value="{{ $course->id }}">{{ $course->name }}</option>
                                @else
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                            @error('course_id')
                            <div class="invalid-feedback" style="color: red;">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <span style="font-size: 14px" class="label label-info">Select Final Exam</span>
                            <select name="exam_id" class="form-control form-select @error('course_id') is-invalid @enderror">
                                <option value="">-</option>
                                @forelse($exams as $exam)
                                @if ($exam->id == old('exam_id'))
                                <option selected="selected" value="{{ $exam->id }}">{{ $exam->name }}</option>
                                @else
                                <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                            @error('exam_id')
                            <div class="invalid-feedback" style="color: red;">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Lession Name" value="{{ old('name')}}">
                    @error('name')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="chapter" type="text" class="form-control @error('chapter') is-invalid @enderror" placeholder="Chapter" value="{{ old('chapter')}}">
                    @error('chapter')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group @error('description') is-invalid @enderror">
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{ old('description')}}"></input>
                    @error('description')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <!-- file -->
                <div class="mb-3" style="margin-bottom: 20px;">
                    <span style="font-size: 14px" class="label label-info">File</span>
                    <input type="file" name="file[]" class="form-control" accept=".pdf, .zip, .rar, .mp4" multiple></input>
                    @error('file')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input name="video_url" type="url" class="form-control @error('video') is-invalid @enderror" placeholder="Video url" value="{{ old('video')}}">
                    @error('video')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
            </div>
                <div class="col-lg-12">
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop