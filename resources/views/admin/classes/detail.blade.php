@extends('admin.layouts.app')
@section('title', 'Detail Class')

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-details-hr">
                            <div class="row" style="text-align: center";>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Name</b><br /> {{ $class->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Semester</b><br />{{ $class->semester }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="text-align: center";>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Description</b><br /> {{ $class->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="text-align: center;">
                                <a class="btn btn-primary" href="{{ route('class.add_list_student', [$class->id]) }}">Add
                                    Student</a>
                                <a class="btn btn-primary" href="{{ route('class.add_courses_classes', [$class->id]) }}">Add
                                    Course</a>
                                <a class="btn btn-warning" href="{{ route('class.formedit', [$class->id]) }}"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                        <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row mg-b-15">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="skill-title">
                                                                <h2>Courses</h2>
                                                                <hr />
                                                            </div>
                                                            <table>
                                                                @forelse($courses as $course)
                                                                    <tr>
                                                                        <td> {{ $course->name }} </td>
                                                                    </tr>
                                                                @empty
                                                                @endforelse
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mg-b-15">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="skill-title">
                                                                <h2>Students</h2>
                                                                <hr />
                                                            </div>
                                                            <table>
                                                                @forelse($students as $student)
                                                                    <tr>
                                                                        <td> {{ $student->name }} </td>
                                                                    </tr>
                                                                @empty
                                                                @endforelse
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
