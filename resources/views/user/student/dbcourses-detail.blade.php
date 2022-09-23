@extends('user.layouts.user_app')
@section('title', 'Courses')

@section('content')
<section>
    <div class="pro-cover">
    </div>
    <div class="pro-menu">
        <div class="container">
            <div class="col-md-9 col-md-offset-3">
                <ul>
                    <li><a href="{{route('dashboard')}}">My Dashboard</a></li>
                    <li><a href="{{route('dbprofile')}}">Profile</a></li>
                    <li><a href="{{route('dbcourses')}}" class="pro-act">Courses</a></li>
                    <li><a href="{{route('dbexam')}}">Exams</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="stu-db">
        <div class="container pg-inn">
            <div class="col-md-3">
                <div class="pro-user">
                    <img src="{{ asset($students->img) }}" alt="user">
                </div>
                <div class="pro-user-bio">
                    <ul>
                        <li>
                            <h4>Name: {{$user->first_name}} {{$user->last_name}}</h4>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="udb">
                    <div class="udb-sec udb-cour">
                        <h4><img src="{{asset('frontends/images/icon/db2.png')}}" alt="" /> {{$course->name}}</h4>
                        <div class="sdb-cours">
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
                                </tr>
                                @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$lesson->name}}</td>
                                    <td>{{$lesson->chapter}}</td>
                                    <td>{{$lesson->description}}</td>
                                    <td class="text-center">
                                        <a href="{{route('learn', [$lesson->id]) }}" data-toggle="tooltip" data-placement="top" title="View" type="button" class="btn btn-success">Learn</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop