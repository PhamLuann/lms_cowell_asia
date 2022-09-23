@extends('admin.layouts.app')
@section('title', 'Detail Course')

@section('search')
<!-- Single pro tab review Start-->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="breadcome-list single-page-breadcome">
                <div class="row">
                    <h2 class="text-center text-capitalize">{{$course->name}}</h2>
                    <p class="text-center text-capitalize">Description: {{$course->description}}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<!-- for show lesson -->
    @if(count($lessons)>=1)
    <table class="table table-bordered table-hover" style="padding: 20px;">
        <tr>
            <td colspan="8"><b>Lesson in this course</b></td>
        </tr>
        <tr>
            <th></th>
            <th class="text-center">Name</th>
            <th class="text-center">Chapter</th>
            <th class="text-center">Description</th>
            <th class="text-center">Create at</th>
            <th class="text-center">Update at</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($lessons as $lesson)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$lesson->name}}</td>
            <td>{{$lesson->chapter}}</td>
            <td>{{$lesson->description}}</td>
            <td>{{$lesson->created_at}}</td>
            <td>{{$lesson->updated_at}}</td>
            <td class="text-center">
                <a href="{{route('lesson.detail', [$lesson->id]) }}" data-toggle="tooltip" data-placement="top" title="View" type="button" class="btn btn-success"><i class="bi bi-view-list"></i></a>
                <a href="{{route('lesson.edit', [$lesson->id]) }}" type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <form method="post" action="{{ route('lesson.delete') }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="lesson_id" id="lesson_id" value="{{ $lesson->id }}">
                    <button onclick="return confirm('Confirm Delete!')" type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

<!-- for exam -->
    @if(count($exams)>=1)
    <table class="table table-bordered" style="padding: 20px;">
        <tr>
            <td colspan="7"><b>Exams in this course</b></td>
        </tr>
        <tr>
            <th></th>
            <th class="text-center">Name</th>
            <th class="text-center">Maxpoint</th>
            <th class="text-center">Description</th>
            <th class="text-center">Create at</th>
            <th class="text-center">Update at</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($exams as $exam)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$exam->name}}</td>
            <td>{{$exam->maxpoint}}</td>
            <td>{{$exam->description}}</td>
            <td>{{$exam->created_at}}</td>
            <td>{{$exam->updated_at}}</td>
            <td class="text-center">
                <a href="{{ route('exam.show', $exam->id) }}" data-toggle="tooltip" data-placement="top" title="View" type="button" class="btn btn-success"><i class="bi bi-view-list"></i></a>
                <a href="{{ route('exam.edit', $exam->id) }}" type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <form method="post" action="{{  url('/exam/' . $exam->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="lesson_id" id="lesson_id" value="{{ $lesson->id }}">
                    <button onclick="return confirm('Confirm Delete!')" type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
<!-- for class -->
    @if(count($classes)>=1)
    <table class="table table-bordered" style="padding: 20px;">
        <tr>
            <td colspan="7"><b>Classes studying this course</b></td>
        </tr>
        <tr>
            <th></th>
            <th class="text-center">Name</th>
            <th class="text-center">Semester</th>
            <th class="text-center">Description</th>
            <th class="text-center">Create at</th>
            <th class="text-center">Update at</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($classes as $class)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$class->name}}</td>
            <td>{{$class->semester}}</td>
            <td>{{$class->description}}</td>
            <td>{{$class->created_at}}</td>
            <td>{{$class->updated_at}}</td>
            <td class="text-center">
                <a href="{{ route('class.detail', [$class->id]) }}" data-toggle="tooltip" data-placement="top" title="View" type="button" class="btn btn-success"><i class="bi bi-view-list"></i></a>
                <a href="{{ route('class.formedit', [$class->id]) }}" type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <form method="post" action="{{ route('class.destroy') }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="lesson_id" id="lesson_id" value="{{ $lesson->id }}">
                    <button onclick="return confirm('Confirm Delete!')" type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
<!-- for students -->

    @if(count($students)>=1)
    <table class="table table-bordered" style="padding: 20px;">
        <tr>
            <td colspan="8"><b>Student without class</b></td>
        </tr>
        <tr>
            <th></th>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Created At</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('student.profile',[$student->id])}}"><img src="{{ asset($student->img) }}" width="80px" alt="None" /></a></td>
            <td>{{$student->name}}</td>
            <td>{{$student->address}}</td>
            <td> {{ $student->email }} </td>
            <td> {{ $student->gender }} </td>
            <td> {{ $student->created_at }}</td>
            
        </tr>
        @endforeach
    </table>
    @endif
@stop