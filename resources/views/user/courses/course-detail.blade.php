@extends('user.layouts.user_app')
@section('title', 'Course-Detail')

@section('content')
<!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70 pg-inn">
            <div class="row">
                <div class="cor">
                    <div class="col-md-3">
                        <div class="cor-top-deta cor-side-com">
                            <div class="cor-top-deta">
                                <div class="ho-st-login cor-apply field-com">
                                    <div class="col s12">
                                        <form class="col s12">
                                            <div class="cor-left-app-tit">
                                                <h4>Apply This Course</h4>  
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input type="text" class="validate">
                                                    <label>Full Name</label>
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
                                                    <input type="text" class="validate">
                                                    <label>Phone</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                            <select>
                                            <option value="" disabled selected>Select Course</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
									        </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input type="submit" value="APPLY NOW" class="waves-effect waves-light light-btn">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cor-side-com">
                            <div class="">
                                <div class="de-left-tit">
                                    <h4>Upcoming Event</h4>
                                </div>
                            </div>
                            <div class="ho-event">
                                <ul>
                                    <li>
                                        <div class="ho-ev-link ho-ev-link-full">
                                            <a href="#">
                                                <h4>Workshop PHP</h4>
                                            </a>
                                            <p>Nulla at velit convallis venenatis.</p>
                                            <span>9:15 am – 5:00 pm</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ho-ev-link ho-ev-link-full">
                                            <a href="#">
                                                <h4>Workshop PHP</h4>
                                            </a>
                                            <p>Nulla at velit convallis venenatis.</p>
                                            <span>9:15 am – 5:00 pm</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ho-ev-link ho-ev-link-full">
                                            <a href="#">
                                                <h4>Workshop PHP</h4>
                                            </a>
                                            <p>Nulla at velit convallis venenatis.</p>
                                            <span>9:15 am – 5:00 pm</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ho-ev-link ho-ev-link-full">
                                            <a href="#">
                                                <h4>Workshop PHP</h4>
                                            </a>
                                            <p>Nulla at velit convallis venenatis.</p>
                                            <span>9:15 am – 5:00 pm</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cor-mid-img">
                            <img src="images/course.jpg" alt="">
                        </div>
                        <div class="cor-con-mid">
                            <div class="cor-p1">
                                <h2>Biological Sciences</h2>
                                <span>Category: Software Testing</span>
                                <div class="share-btn">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cor-p4">
                                <h3>Course Details:</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going
                                    to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                                    this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem
                                    Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                                <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <div class="cor-p5">
                                <h3>Course Syllabus</h3>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">
									<img src="images/icon/cor4.png" alt=""> <span>Requirements</span></a>
                                    </li>
                                    <li><a data-toggle="tab" href="#menu1"><img src="frontends/images/icon/cor3.png" alt=""><span>Fees</span></a></li>
                                    <li><a data-toggle="tab" href="#menu2"><img src="frontends/images/icon/cor1.png" alt=""><span>Student Profile</span></a></li>
                                    <li><a data-toggle="tab" href="#menu2"><img src="frontends/images/icon/cor5.png" alt=""><span>How to Apply</span></a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h4>Home</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                        <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h4>Menu 1</h4>
                                        <p>Some content in menu 1.</p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h4>Menu 2</h4>
                                        <p>Some content in menu 2.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cor-p4">
                                <h3>A typical weekly timetable:</h3>
                                <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li>
                                        <div class="collapsible-header active">1st year</div>
                                        <div class="collapsible-body cor-tim-tab">
                                            <h4>First Year Courses</h4>
                                            <ul>
                                                <li>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</li>
                                                <li>Anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</li>
                                                <li>Combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</li>
                                                <li>Nullam tincidunt urna non porttitor luctus. Suspendisse sem urna, auctor ac commodo eu, bibendum sed nulla.</li>
                                            </ul>
                                            <h4>Assessment</h4>
                                            <ul>
                                                <li>Three written papers form the First University Examination, together with a submitted portfolio of two exam essays of 2,000 words for Introduction to English Language and Literature.</li>
                                                <li>All exams must be passed, but marks do not count towards the final degree.</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header">2st year</div>
                                        <div class="collapsible-body cor-tim-tab">
                                            <h4>Second Year Courses</h4>
                                            <ul>
                                                <li>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</li>
                                                <li>Anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</li>
                                                <li>Combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</li>
                                            </ul>
                                            <h4>Assessment</h4>
                                            <ul>
                                                <li>Three written papers form the First University Examination, together with a submitted portfolio of two exam essays of 2,000 words for Introduction to English Language and Literature.</li>
                                                <li>All exams must be passed, but marks do not count towards the final degree.</li>
                                                <li>Combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header">3st year</div>
                                        <div class="collapsible-body cor-tim-tab">
                                            <h4>Third Year Courses</h4>
                                            <ul>
                                                <li>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</li>
                                                <li>Anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</li>
                                            </ul>
                                            <h4>Assessment</h4>
                                            <ul>
                                                <li>Three written papers form the First University Examination, together with a submitted portfolio of two exam essays of 2,000 words for Introduction to English Language and Literature.</li>
                                                <li>All exams must be passed, but marks do not count towards the final degree.</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="cor-p6">
                                <h3>Write Reviews</h3>
                                <div class="cor-p7-revi">
                                    <form class="col s12">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" class="validate">
                                                <label>Name</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" class="validate">
                                                <label>Email id</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea class="materialize-textarea"></textarea>
                                                <label>Message</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="submit" value="Submit" class="waves-effect waves-light btn-book">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cor-side-com">
                            <div class="ho-ev-latest ho-ev-latest-bg-3">
                                <div class="ho-lat-ev">
                                    <h4>Student Login</h4>
                                    <p>Student area velit convallis venenatis lacus quis, efficitur lectus.</p>
                                </div>
                            </div>
                            <div class="ho-st-login">
                                <div class="col s12">
                                    <form class="col s12">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" class="validate">
                                                <label>Student user name</label>
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
                                                <input type="submit" value="Login" class="waves-effect waves-light light-btn">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="cor-side-com">
                            <div class="ho-ev-latest ho-ev-latest-bg-2">
                                <div class="ho-lat-ev">
                                    <a href="#">
                                        <h4>Job Vacants</h4>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    </a>
                                </div>
                            </div>
                            <div class="ho-ev-latest in-ev-latest-bg-1">
                                <div class="ho-lat-ev">
                                    <a href="#">
                                        <h4>Job Vacants</h4>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    </a>
                                </div>
                            </div>
                            <div class="ho-ev-latest in-ev-latest-bg-1">
                                <div class="ho-lat-ev">
                                    <a href="#">
                                        <h4>Job Vacants</h4>
                                        <p>Nulla at velit convallis, venenatis lacus quis, efficitur lectus.</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--SECTION END-->
@stop


    