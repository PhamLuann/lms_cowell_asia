<section>
    <!-- TOP BAR -->
    <div class="ed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ed-com-t1-left">
                        <ul>
                            <li><a href="#">Contact: Team 4 - Co-Well</a>
                            </li>
                            <li><a href="#">Phone: +123-456-7890</a>
                            </li>
                        </ul>
                    </div>
                    <div class="ed-com-t1-right">
                        <ul>
                            @if(Session::get('name'))
                            <li><a href="">{{Session::get('name')}}</a>
                            </li>
                            <li><a href="{{ route('logout') }}" data-toggle="" data-target="">Log out</a>
                            </li>
                            @else
                            <li><a href="{{route('login')}}" data-toggle="" data-target="">Sign In</a>
                            </li>
                            <li><a href="{{route('register')}}" data-toggle="" data-target="">Sign Up</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="ed-com-t1-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOGO AND MENU SECTION -->
    <div class="top-logo" data-spy="affix" data-offset-top="250">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wed-logo">
                        <a href="{{route('home')}}"><img src="{{asset('frontends/images/logo.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="main-menu">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a>
                            </li>

                            <!-- MEGA MENU 1 -->
                            <div class="mm-pos">
                                <div class="about-mm m-menu">
                                    <div class="m-menu-inn">
                                        <div class="mm1-com mm1-s1">
                                            <div class="ed-course-in">
                                                <a class="course-overlay menu-about" href="admission.html">
                                                    <img src="{{asset('frontends/images/h-about.jpg')}}" alt="">
                                                    <span>Academics</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mm1-com mm1-s2">
                                            <p>Want to change the world? At Berkeley we’re doing just that. When you join the Golden Bear community, you’re part of an institution that shifts the global conversation every single day.</p>
                                            <a href="about.html" class="mm-r-m-btn">Read more</a>
                                        </div>
                                        <div class="mm1-com mm1-s3">
                                            <ul>
                                                <li><a href="{{route('allcourses')}}">All Courses</a></li>
                                                <li><a href="course-details.html">Course details</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="admission.html">Admission</a></li>
                                                <li><a href="awards.html">Awards</a></li>
                                            </ul>
                                        </div>
                                        <div class="mm1-com mm1-s4">
                                            <ul>
                                                <li><a href="dashboard.html">Student profile</a></li>
                                                <li><a href="db-courses.html">Dashboard courses</a></li>
                                                <li><a href="db-exams.html">Dashboard exams</a></li>
                                                <li><a href="db-profile.html">Dashboard profile</a></li>
                                                <li><a href="db-time-line.html">Dashboard timeline</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </li>
                            <li><a href="{{route('dashboard')}}">Student</a>
                            </li>
                            <!-- MEGA MENU 1 -->
                            <div class="mm-pos">
                                <div class="admi-mm m-menu">
                                    <div class="m-menu-inn">
                                        <div class="mm2-com mm1-com mm1-s1">
                                            <div class="ed-course-in">
                                                <a class="course-overlay" href="about.html">
                                                    <img src="{{asset('frontends/images/h-about1.jpg')}}" alt="">
                                                    <span>Academics</span>
                                                </a>
                                            </div>
                                            <p>Donec lacus libero, rutrum ac sollicitudin sed, mattis non eros. Vestibulum congue nec eros quis lacinia. Mauris non tincidunt lectus. Nulla mollis, orci vitae accumsan rhoncus.</p>
                                            <a href="about.html" class="mm-r-m-btn">Read more</a>
                                        </div>
                                        <div class="mm2-com mm1-com mm1-s1">
                                            <div class="ed-course-in">
                                                <a class="course-overlay" href="admission.html">
                                                    <img src="{{asset('frontends/images/h-adm1.jpg')}}" alt="">
                                                    <span>Admission</span>
                                                </a>
                                            </div>
                                            <p>Donec lacus libero, rutrum ac sollicitudin sed, mattis non eros. Vestibulum congue nec eros quis lacinia. Mauris non tincidunt lectus. Nulla mollis, orci vitae accumsan rhoncus.</p>
                                            <a href="admission.html" class="mm-r-m-btn">Read more</a>
                                        </div>
                                        <div class="mm2-com mm1-com mm1-s1">
                                            <div class="ed-course-in">
                                                <a class="course-overlay" href="awards.html">
                                                    <img src="{{asset('frontends/images/h-cam1.jpg')}}" alt="">
                                                    <span>History & awards</span>
                                                </a>
                                            </div>
                                            <p>Donec lacus libero, rutrum ac sollicitudin sed, mattis non eros. Vestibulum congue nec eros quis lacinia. Mauris non tincidunt lectus. Nulla mollis, orci vitae accumsan rhoncus.</p>
                                            <a href="awards.html" class="mm-r-m-btn">Read more</a>
                                        </div>
                                        <div class="mm2-com mm1-com mm1-s4">
                                            <div class="ed-course-in">
                                                <a class="course-overlay" href="seminar.html">
                                                    <img src="{{asset('frontends/images/h-res1.jpg')}}" alt="">
                                                    <span>Seminar 2018</span>
                                                </a>
                                            </div>
                                            <p>Donec lacus libero, rutrum ac sollicitudin sed, mattis non eros. Vestibulum congue nec eros quis lacinia. Mauris non tincidunt lectus. Nulla mollis, orci vitae accumsan rhoncus.</p>
                                            <a href="seminar.html" class="mm-r-m-btn">Read more</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </li>
                            <li><a href="{{route('allcourses')}}">All Courses</a></li>
                            <!--<li><a class='dropdown-button ed-sub-menu' href='#' data-activates='dropdown1'>Courses</a></li>-->
                            <li class="cour-menu">
                                <!-- MEGA MENU 1 -->
                                <div class="mm-pos">
                                    <div class="cour-mm m-menu">
                                        <div class="m-menu-inn">
                                            <div class="mm1-com mm1-cour-com mm1-s3">
                                                <h4>Frontend pages:1</h4>
                                                <ul>
                                                    <li><a href="index-2.html">Home</a></li>
                                                    <li><a href="index-1.html">Home - 1</a></li>
                                            </div>
                                            <div class="mm1-com mm1-cour-com mm1-s3">
                                                <h4>Frontend pages:2</h4>
                                                <ul>
                                                    <li><a href="facilities.html">facilities</a></li>
                                                    <li><a href="facilities-detail.html">facilities detail</a></li>
                                                    <li><a href="research.html">research</a></li>
                                                    <li><a href="seminar.html">seminar</a></li>
                                                    <li><a href="gallery-photo.html">gallery photo</a></li>
                                                </ul>
                                                <h4 class="ed-dr-men-mar-top">User Dashboard</h4>
                                                <ul>
                                                    <li><a href="dashboard.html">Student profile</a></li>
                                                    <li><a href="db-courses.html">Dashboard courses</a></li>
                                                    <li><a href="db-exams.html">Dashboard exams</a></li>
                                                    <li><a href="db-profile.html">Dashboard profile</a></li>
                                                    <li><a href="db-time-line.html">Dashboard timeline</a></li>
                                                </ul>
                                            </div>
                                            <div class="mm1-com mm1-cour-com mm1-s3">
                                                <h4>Admin panel:1</h4>
                                                <ul>
                                                    <li><a href="admin.html">admin</a></li>
                                                    <li><a href="admin-add-courses.html">Add new course</a></li>
                                                    <li><a href="admin-all-courses.html">All courses</a></li>
                                                    <li><a href="admin-student-details.html">Student details</a></li>
                                                    <li><a href="admin-user-add.html">Add new user</a></li>
                                                    <li><a href="admin-user-all.html">All users</a></li>
                                                    <li><a href="admin-panel-setting.html">Admin setting</a></li>
                                                    <li><a href="admin-event-add.html">event add</a></li>
                                                    <li><a href="admin-event-all.html">event all</a></li>
                                                    <li><a href="admin-setting.html">Admin Setting</a></li>
                                                    <li><a href="admin-slider.html">Slider setting</a></li>
                                                    <li><a href="admin-slider-edit.html">Slider edit</a></li>
                                                    <li><a href="admin-course-details.html">course details</a></li>
                                                    <li><a href="admin-login.html">admin login</a></li>
                                                </ul>
                                            </div>
                                            <div class="mm1-com mm1-cour-com mm1-s3">
                                                <h4>Admin panel:2</h4>
                                                <ul>
                                                    <li><a href="admin-event-edit.html">event edit</a></li>
                                                    <li><a href="admin-exam-add.html">exam add</a></li>
                                                    <li><a href="admin-exam-all.html">exam all</a></li>
                                                    <li><a href="admin-exam-edit.html">exam edit</a></li>
                                                    <li><a href="admin-export-data.html">export data</a></li>
                                                    <li><a href="admin-import-data.html">import data</a></li>
                                                    <li><a href="admin-job-add.html">Add new jobs</a></li>
                                                    <li><a href="admin-job-all.html">All jobs</a></li>
                                                    <li><a href="admin-job-edit.html">Edit job</a></li>
                                                    <li><a href="admin-main-menu.html">main menu</a></li>
                                                    <li><a href="admin-page-add.html">Add new page</a></li>
                                                    <li><a href="admin-page-all.html">All pages</a></li>
                                                    <li><a href="admin-page-edit.html">Edit page</a></li>
                                                    <li><a href="admin-forgot.html">forgot password</a></li>
                                                </ul>
                                            </div>
                                            <div class="mm1-com mm1-cour-com mm1-s4">
                                                <h4>Admin panel:3</h4>
                                                <ul>
                                                    <li><a href="admin-quick-link.html">quick link</a></li>
                                                    <li><a href="admin-seminar-add.html">Add new seminar</a></li>
                                                    <li><a href="admin-seminar-all.html">All seminar</a></li>
                                                    <li><a href="admin-seminar-edit.html">Edit seminar</a></li>
                                                    <li><a href="admin-seminar-enquiry.html">Semester enquiry</a></li>
                                                    <li><a href="admin-all-enquiry.html">All enquiry</a></li>
                                                    <li><a href="admin-view-enquiry.html">All enquiry view</a></li>
                                                    <li><a href="admin-event-enquiry.html">event enquiry</a></li>
                                                    <li><a href="admin-admission-enquiry.html">Admission enquiry</a></li>
                                                    <li><a href="admin-common-enquiry.html">common enquiry</a></li>
                                                    <li><a href="admin-course-enquiry.html">course enquiry</a></li>
                                                    <li><a href="admin-all-menu.html">menu all</a></li>
                                                    <li><a href="admin-about-menu.html">Menu - About</a></li>
                                                    <li><a href="admin-admission-menu.html">Menu - admission</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </ul>
                    </div>
                </div>
                <div class="all-drop-down-menu">

                </div>

            </div>
        </div>
    </div>
    @yield('search')
</section>