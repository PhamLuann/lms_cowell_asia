@extends('admin.layouts.app')
@section('title', 'Edit Courses')

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15 " style="min-height: 500px; margin-top: 50px;">
    <div class="container-fluid">
        <form action="{{route('course.update', [$course->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-left: 15%;">
                <div class="form-group">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Course Name" value="{{ old('name', $course->name)}}">
                    @error('name')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="duration" type="text" class="form-control @error('duration') is-invalid @enderror" placeholder="Course Duration (Number)" value="{{ old('duration', $course->duration)}}">
                    @error('duration')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group @error('description') is-invalid @enderror">
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px;" placeholder="Description" value="{{ old('description', $course->description)}}"></input>
                    @error('description')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>

                <!-- photo -->
                <div class="mb-3" style="margin-bottom: 20px;">
                    <span style="font-size: 14px" class="label label-info">Image</span>
                    @if ($course->img)
                    <img src="{{ asset($course->img) }}" class="img-thumbnail" width="150px" alt="">
                    @endif
                    <input type="file" name="image" class="form-control"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop