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
                    <h4>Create an Account</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form method="post" action="{{route('register.action')}}">
                {{csrf_field()}}

                <div class="mb-3">
                    <input type="text" name="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                     placeholder="First Name" value="{{old('first_name')}}">
                    @error('first_name')
                     <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    placeholder="Last Name" value="{{old('last_name')}}">
                    @error('last_name')
                     <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{old('email')}}">
                    @error('email')
                     <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password">
                    @error('password')
                     <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation"
class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="Confirm Password">
                    @error('password_confirmation')
                     <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xs-8">&nbsp;</div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"  class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <div class="input-field s12"> <a href="{{route('login')}}" data-dismiss="" data-toggle="" data-target="">Are you a already member ? Login</a> </div>
                    <!-- /.col -->
                </div>
            </form>
                </div>
            </div>
        </div>
@stop