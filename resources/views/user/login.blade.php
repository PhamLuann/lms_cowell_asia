@extends('user.layouts.user_app')
@section('title', 'TEAM4')

@section('content')
<div id="" class="" role="">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="{{asset('images/cancel.png')}}" alt="" />
                    </a>
                    <h4>Login</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div>
                            <div class="input-field s12">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" data-ng-model="name" class="validate">
                                <label>Email</label>
                            </div>
                            @error('email')
                            <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" name="password" class="validate">
                                <label>Password</label>
                            </div>
                        </div>
                        <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                    <input type="checkbox" id="test5" />
                                    <label for="test5">Remember me</label>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | <a href="{{route('register')}}" data-dismiss="" data-toggle="" data-target="">Create a new account</a> </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
@stop