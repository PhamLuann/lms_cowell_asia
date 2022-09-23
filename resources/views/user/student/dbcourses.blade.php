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
                    <li><a href="{{route('dashboard')}}" >My Dashboard</a></li>
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
                            <li>Student Id: {{$students->id}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="udb">
                        <div class="udb-sec udb-cour">
                            <h4><img src="{{asset('frontends/images/icon/db2.png')}}" alt=""/> Booking Courses</h4>
                            <div class="sdb-cours">
                                <ul>
                                    @forelse($courses as $course)
                                    <li>
                                        <a href="{{route('cdetail', [$course->id])}}">
                                            <div class="list-mig-like-com com-mar-bot-30">
                                                <div class="list-mig-lc-img"> <img src="{{asset($course->img)}}" alt=""> 
                                                <span class="home-list-pop-rat list-mi-pr">{{$course->duration}}</span> 
                                            </div>
                                                <div class="list-mig-lc-con">
                                                    <h5>{{$course->name}}</h5>
                                                    <p>{{$course->description}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop