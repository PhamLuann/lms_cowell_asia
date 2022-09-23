@extends('user.layouts.user_app')
@section('title', 'Profile')

@section('content')
<section>
        <div class="pro-cover">
        </div>
        <div class="pro-menu">
            <div class="container">
                <div class="col-md-9 col-md-offset-3">
                    <ul>
                    <li><a href="{{route('dashboard')}}">My Dashboard</a></li>
                        <li><a href="{{route('dbprofile')}}"  class="pro-act">Profile</a></li>
                        <li><a href="{{route('dbcourses')}}">Courses</a></li>
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
                </div>
                <div class="col-md-9">
                    <div class="udb">

                        <div class="udb-sec udb-prof">
                            <h4><img src="{{asset('frontends/images/icon/db1.png')}}" alt="" /> My Profile</h4>
                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="responsive-table bordered">
                                    <tbody>
                                        <tr>
                                            <td>Fist Name:</td>
                                            <td>{{$user->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td>{{$user->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>student Id:</td>
                                            <td>{{$students->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Birthday:</td>
                                            <td>{{$user->birthday}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td>{{$students->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td>{{$students->address}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="sdb-bot-edit">
                                <a href="{{route('edit-dbprofile')}}" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"><i class="fa fa-pencil"></i> Edit my profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@stop