@extends('admin.layouts.app')
@section('title', 'Edit Lesson')

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15 " style="min-height: 500px; margin-top: 50px;">
    <div class="container-fluid">
        <form action="{{route('lesson.updatelesson', [$lesson->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-left: 15%;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <span style="font-size: 14px" class="label label-info">Select course</span>
                            <select id="course_id" name="course_id" class="form-control form-select @error('course_id') is-invalid @enderror">
                                @php
                                $cou = $lesson->course()->get();
                                @endphp
                                <option value="{{$lesson->course_id}}">{{$cou[0]->name}}</option>
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
                                @php
                                $ex = $lesson->exam()->get();
                                @endphp
                                <option value="{{$lesson->exam_id}}">{{$ex[0]->name}}</option>
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
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <span style="font-size: 14px" class="label label-info">Lesson name</span>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Lession Name" value="{{ old('name', $lesson->name)}}">
                            @error('name')
                            <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <span style="font-size: 14px" class="label label-info">Chapter</span>
                            <input name="chapter" type="text" class="form-control @error('chapter') is-invalid @enderror" placeholder="Chapter" value="{{ old('chapter', $lesson->chapter)}}">
                            @error('chapter')
                            <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group @error('description') is-invalid @enderror">
                    <span style="font-size: 14px" class="label label-info">Description</span>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" value="{{ old('description', $lesson->description)}}"></input>
                    @error('description')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <!-- file -->
                <div class="mb-3" style="margin-bottom: 20px;">
                    <span style="font-size: 14px" class="label label-info">File</span>
                    <div>
                        @foreach($lesson->files as $file)
                        @if(substr($file->file, -3) == 'mp4')
                        <div id="video">
                            <video src="{{ asset($file->file)}}" width="500px" controls></video>
                            <a id="delvideo" style="font-size: 35px;" data-toggle="tooltip" data-placement="top" title="Delete video"><i class="bi bi-x-lg"></i></a>
                            <input type="hidden" id="video_id" value="{{$file->id}}" />
                        </div>
                        @endif
                        @if(substr($file->file, -3) == 'pdf')
                        <div id="pdf">
                            <embed src="{{ asset($file->file)}}" width="500px" type="application/pdf">
                            <a id="delpdf" style="font-size: 35px; " data-toggle="tooltip" data-placement="top" title="Delete pdf"><i class="bi bi-x-lg"></i></a>
                            <input type="hidden" id="pdf_id" value="{{$file->id}}" />
                        </div>
                        @endif
                        @if(substr($file->file, -3) == 'zip' || substr($file->file, -3) == 'rar')
                        <div id="zip">
                            <p style="display: inline;">{{$file->file}}</p>
                            <a id="delzip" style="font-size: 25px; display: inline-block;" data-toggle="tooltip" data-placement="top" title="Delete Zip"><i class="bi bi-x-lg"></i></a>
                            <input type="hidden" id="zip_id" value="{{$file->id}}" />
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <input type="file" name="file[]" class="form-control" accept=".pdf, .zip, .rar, .mp4" multiple></input>
                    @error('file')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <!-- end file -->
                <div class="form-group">
                    <span style="font-size: 14px" class="label label-info">Video url</span>
                    <input name="video_url" type="url" class="form-control @error('video_url') is-invalid @enderror" placeholder="Video url" value="{{ old('video_url', $lesson->video_url)}}">
                    @error('video_url')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <input type="text" name="pre-url" hidden="true" value="{{$url}}">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#delpdf', function() {
            var id = $('#pdf_id').val()
            delete_file(id);
            document.getElementById('pdf').remove();
        });
        $(document).on('click', '#delvideo', function() {
            var id = $('#video_id').val()
            delete_file(id);
            document.getElementById('video').remove();
        });
        $(document).on('click', '#delzip', function() {
            var id = $('#zip_id').val()
            delete_file(id);
            document.getElementById('zip').remove();
        });

        function delete_file(id) {
            $.ajax({
                url: "{{route('lesson.deletefile')}}" + "?id=" + id,
                success: function(data) {
                    $('#data').html('');
                    $('#data').html(data);
                }
            })
        }
    });
</script>
@stop