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
                    </div>
                    <div class="pro-user-bio">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="udb">

                        <div class="udb-sec udb-prof">
                            <h4><img src="{{asset('frontends/images/icon/db1.png')}}" alt=""/> My Profile</h4>
                            <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="sdb-tabl-com sdb-pro-table">
                               @foreach($students as $student)
                               <table class="responsive-table bordered">
                                    <tbody>
                                        <tr>
                                            <td>First Name:</td>
                                            <td><input class="text" type="text" value="{{ old('fist_name', $user->first_name)}}" name="first_name"></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td><input class="text" type="text" value="{{ old('last_name', $user->last_name)}} " name="last_name"></td>
                                        </tr>
            
                                        <tr>
                                            <td>Gender:</td>
                                            <td><input class="text" type="text" value="{{ old('gender', $student->gender)}}" name="gender"></td>
                                        </tr>
                                        <tr>
                                            <td>Birthday:</td>
                                            <td><input class="text" type="text" value="{{ old('birthday', $user->birthday)}}" name="birthday"></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><input class="text" type="text" value="{{ old('address', $student->address)}}" name="address"></td>
                                        </tr>
                                        <tr>
                                        <td>Image:</td>
                                        <td>
                                        <div class="mb-3" style="margin-bottom: 20px;">
                                            <input type="file" name="img" class="form-control">
                                        </td>
                                        </tr>
                                    </tbody>
                                    <input hidden="true" name="student_id" value="{{$student->id}}">
                                </table>
                               @endforeach
                                <div class="sdb-bot-edit" style="text-align:center">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-save" aria-hidden="true"></i> SAVE</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop