@extends('user.layouts.user_app')
@section('title', 'Exam')

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
                    <li><a href="{{route('dbcourses')}}">Courses</a></li>
                    <li><a href="{{route('dbexam')}}" class="pro-act">Exams</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="stu-db">
        <div class="container pg-inn">
            <div class="col-md-3">
                <div class="pro-user">
                    <img src="{{asset($students->img)}}" alt="user">
                </div>
                <div class="pro-user-bio">
                    <ul>
                        <li>
                            <h4>Name: {{$user->first_name}} {{$user->last_name}}</h4>
                        </li>
                        <li>Student Id: {{$students->id}}</li>
                    </ul>
                </div>
            </div>
            <div class="udb-sec udb-cour-stat">
                <h4><img src="{{asset('frontends/images/icon/db3.png')}}" alt="" /> Exams</h4>
                <div class="pro-con-table">
                    <table class="bordered responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Exam Name</th>
                                <th>Description</th>
                                <th>Time limit</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($stexam as $exam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $exam->name}}</td>
                                <td>{{ $exam->description}}</td>
                                <td>{{ $exam->time_limit}}</td>
                                <td>
                                    <a href="{{url('student/'.$students->id.'/exam/'.$exam->id)}}" type="button" class="btn btn-success">Do exam</a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <br>   </br>
                    <h4><img src="{{asset('frontends/images/icon/db3.png')}}" alt="" /> Exams History</h4>
                    <table class="bordered responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Exam ID</th>
                                <th>Point</th>
                                <th>Time </th>
                                <th>Date Submit</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($history as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->exam_id}}</td>
                                <td>{{ $history->point}}</td>
                                <td>{{ $history->test_time}}</td>
                                <td>{{ $history->created_at}}</td>
                               
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop