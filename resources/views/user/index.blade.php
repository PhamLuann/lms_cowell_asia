@extends('user.layouts.user_app')
@section('title', 'TEAM4')

@section('content')
<!-- SLIDER -->
<section>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item slider1 active">
                    <img src="{{asset('frontends/images/slider/1.jpg')}}" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Welcome to <span>University</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <a href="#" class="bann-btn-1">All Courses</a><a href="#" class="bann-btn-2">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('frontends/images/slider/2.jpg')}}" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Admission open <span>2018</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <a href="#" class="bann-btn-1">Admission</a><a href="#" class="bann-btn-2">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('frontends/images/slider/3.jpg')}}" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Education <span>Master</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <a href="#" class="bann-btn-1">All Courses</a><a href="#" class="bann-btn-2">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-chevron-left slider-arr"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-chevron-right slider-arr"></i>
            </a>
        </div>
    </section>
<!-- QUICK LINKS -->
<section>
    </section>

    <!-- DISCOVER MORE -->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Discover <span>More</span></h2>
                    <p>Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p>
                </div>
            </div>
            <div class="row">
                <div class="ed-course">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="ed-course-in">
                            <a class="course-overlay" href="{{route('dashboard')}}">
                                <img src="{{asset('frontends/images/h-cam.jpg')}}" alt="">
                                <span>Students profile</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="ed-course-in">
                            <a class="course-overlay" href="{{route('allcourses')}}">
                                <img src="{{asset('frontends/images/h-about1.jpg')}}" alt="">
                                <span>Couse</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="ed-course-in">
                            <a class="course-overlay" href="{{route('dbexam')}}">
                                <img src="{{asset('frontends/images/h-adm.jpg')}}" alt="">
                                <span>Exam</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="ed-course-in">
                            <a class="course-overlay" href="events.html">
                                <img src="{{asset('frontends/images/h-res1.jpg')}}" alt="">
                                <span>Research & Education</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- POPULAR COURSES -->
    <section class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2 >Popular <span>Courses</span></h2>
                </div>
            </div>
            <div class="row">
                @forelse($courses as $course)
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <div>
                        <!--POPULAR COURSES-->
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="col-md-3"> <img src="{{asset($course->img)}}" alt=""> </div>
                            <!--POPULAR COURSES: CONTENT-->
                            <div class="col-md-9 home-top-cour-desc">
                                <a href="{{route('booking', [$course->id])}}">
                                    <h3>{{$course->name}}</h3>
                                </a>
                                <h4>{{$course->description}}</h4>
                                <p>{{$course->duration}}</p> <span class="home-top-cour-rat">4.2</span>
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="{{route('booking', [$course->id])}}"><i class="fa fa-bar-chart" aria-hidden="true"></i>Start Now</a> </li>
                                        <li><i class="fa fa-eye" aria-hidden="true"></i>10 Aavailable</a> </li>
                                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @empty
                    @endforelse
            </div>
        </div>
    </section>

    <!-- UPCOMING EVENTS -->
    <section>
        <div class="container com-sp pad-bot-0">
            <div class="row">
                <div class="col-md-4">
                    <!--<div class="ho-ex-title">
							<h4>Upcoming Event</h4>
						</div>-->
                    <div class="ho-ev-latest ho-ev-latest-bg-1">
                        <div class="ho-lat-ev">
                            <h4>Upcoming Event</h4>
                            <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                        </div>
                    </div>
                    <div class="ho-event ho-event-mob-bot-sp">
                        <ul>
                            <li>
                                <div class="ho-ev-date"><span>07</span><span>jan,2018</span>
                                </div>
                                <div class="ho-ev-link">
                                    <a href="events.html">
                                        <h4>Latinoo College Expo 2018</h4>
                                    </a>
                                    <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    <span>9:15 am – 5:00 pm</span>
                                </div>
                            </li>
                            <li>
                                <div class="ho-ev-date"><span>12</span><span>jan,2018</span>
                                </div>
                                <div class="ho-ev-link">
                                    <a href="events.html">
                                        <h4>Training at Team Fabio Clemente</h4>
                                    </a>
                                    <p>Nulla at velit convallis venenatis.</p>
                                    <span>9:15 am – 5:00 pm</span>
                                </div>
                            </li>
                            <li>
                                <div class="ho-ev-date"><span>26</span><span>jan,2018</span>
                                </div>
                                <div class="ho-ev-link">
                                    <a href="events.html">
                                        <h4>Nulla at velit convallis</h4>
                                    </a>
                                    <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    <span>9:15 am – 5:00 pm</span>
                                </div>
                            </li>
                            <li>
                                <div class="ho-ev-date"><span>18</span><span>jan,2018</span>
                                </div>
                                <div class="ho-ev-link">
                                    <a href="events.html">
                                        <h4>Admissions Information Session and Tour</h4>
                                    </a>
                                    <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    <span>9:15 am – 5:00 pm</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--<div class="ho-ex-title">
							<h4>Upcoming Event</h4>
						</div>-->
                    <div class="ho-ev-latest ho-ev-latest-bg-2">
                        <div class="ho-lat-ev">
                            <h4>Job Vacants</h4>
                            <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                        </div>
                    </div>
                    <div class="ho-event ho-event-mob-bot-sp">
                        <ul>
                            <li>
                                <div class="ho-ev-img"><img src="{{asset('frontends/images/event/1.jpg')}}" alt="">
                                </div>
                                <div class="ho-ev-link">
                                    <a href="#">
                                        <h4>Almost before we knew it, we had left the ground</h4>
                                    </a>
                                    <p>Etiam ornare lacus nec lectus vestibulum aliquam.</p>
                                    <span>Location: New York</span>
                                </div>
                            </li>
                            <li>
                                <div class="ho-ev-img"><img src="{{asset('frontends/images/event/2.jpg')}}" alt="">
                                </div>
                                <div class="ho-ev-link">
                                    <a href="#">
                                        <h4>Then came the night of the first falling star.</h4>
                                    </a>
                                    <p>Vestibulum sollicitudin sem arcu</p>
                                    <span>Location: Los Angeles</span>
                                </div>
                            </li>
                            <li>
                                <div class="ho-ev-img"><img src="{{asset('frontends/images/event/3.jpg')}}" alt="">
                                </div>
                                <div class="ho-ev-link">
                                    <a href="#">
                                        <h4>Educate to Empower NYE Party</h4>
                                    </a>
                                    <p>Vestibulum sollicitudin sem arcu, eget ullamcorper purus hendrerit</p>
                                    <span>Location: Chennai</span>
                                </div>
                            </li>
                            <li>
                                <div class="ho-ev-img"><img src="{{asset('frontends/images/event/4.jpg')}}" alt=""></div>
                                <div class="ho-ev-link">
                                    <a href="#">
                                        <h4>Then came the night of the first falling star.</h4>
                                    </a>
                                    <p>Venenatis lacus lectus.</p>
                                    <span>Location: Chicago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--<div class="ho-ex-title">
							<h4>Upcoming Event</h4>
						</div>-->
                    <div class="ho-ev-latest ho-ev-latest-bg-3">
                        <div class="ho-lat-ev">
                            <h4>Register & Login</h4>
                            <p>Student area velit convallis venenatis lacus quis, efficitur lectus.</p>
                        </div>
                    </div>
                    <div class="ho-st-login">
                        <ul class="tabs tabs-hom-reg">
                            <li class="tab col s6"><a href="#hom-vijay">Register</a>
                            </li>
                            <li class="tab col s6"><a href="#hom_log">Login</a>
                            </li>
                        </ul>
                        <div id="hom-vijay" class="col s12">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate">
                                        <label>User name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate">
                                        <label>Email id</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate">
                                        <label>Confirm password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="submit" value="Register" class="waves-effect waves-light light-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="hom_log" class="col s12">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate">
                                        <label>Student user name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" class="validate">
                                        <label>Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="submit" value="Login" class="waves-effect waves-light light-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS AND EVENTS -->
    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>News and <span>Events</span></h2>
                    <p>Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="bot-gal h-gal ho-event-mob-bot-sp">
                        <h4>Photo Gallery</h4>
                        <ul>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/8.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/9.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/10.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/11.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/1.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/2.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/3.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/4.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/5.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/6.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/7.jpg')}}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Education master image captions" src="{{asset('frontends/images/ami/8.jpg')}}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-vid ho-event-mob-bot-sp">
                        <h4>Video Gallery</h4>
                        <iframe src="{{asset('https://www.youtube.com/embed/2WqFtiR4-F4?autoplay=0&amp;showinfo=0&amp;controls=0')}}" allowfullscreen></iframe>
                        <h5>Maecenas sollicitudin lacinia</h5>
                        <p>Maecenas finibus neque a tellus auctor mattis. Aliquam tempor varius ornare. Maecenas dignissim leo leo, nec posuere purus finibus vitae.</p>
                        <p>Quisque vitae neque at tellus malesuada convallis. Phasellus in lectus vitae ex euismod interdum non a lorem. Nulla bibendum. Curabitur mi odio, tempus quis risus cursus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-blog ho-event">
                        <h4>News & Event</h4>
                        <div class="ho-event">
                            <ul>
                                <li>
                                    <div class="ho-ev-date"><span>07</span><span>jan,2018</span>
                                    </div>
                                    <div class="ho-ev-link">
                                        <a href="events.html">
                                            <h4>Latinoo College Expo 2018</h4>
                                        </a>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                        <span>9:15 am – 5:00 pm</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="ho-ev-date"><span>12</span><span>jan,2018</span>
                                    </div>
                                    <div class="ho-ev-link">
                                        <a href="events.html">
                                            <h4>Training at Team Fabio Clemente</h4>
                                        </a>
                                        <p>Nulla at velit convallis venenatis.</p>
                                        <span>9:15 am – 5:00 pm</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="ho-ev-date"><span>26</span><span>jan,2018</span>
                                    </div>
                                    <div class="ho-ev-link">
                                        <a href="events.html">
                                            <h4>Nulla at velit convallis</h4>
                                        </a>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                        <span>9:15 am – 5:00 pm</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="ho-ev-date"><span>18</span><span>jan,2018</span>
                                    </div>
                                    <div class="ho-ev-link">
                                        <a href="events.html">
                                            <h4>Admissions Information Session and Tour</h4>
                                        </a>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                        <span>9:15 am – 5:00 pm</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
