@extends('admin.layouts.app')
@section('title', 'Edit Students')

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15" style="min-height: 550px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Edit Information</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="{{ route('student.edit', [$student->id]) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="name" type="text" class="form-control"
                                                                    placeholder="Full Name"
                                                                    value="{{ old('name', $student->name) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="address" type="text" class="form-control"
                                                                    placeholder="Address"
                                                                    value="{{ old('address', $student->address) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="gender" type="text" class="form-control"
                                                                    placeholder="Gender"
                                                                    value="{{ old('gender', $student->gender) }}">
                                                            </div>
                                                            <!-- photo -->
                                                            <div class="mb-3" style="margin-bottom: 20px;">
                                                                <label for="image" class="form-lable">Photo</label>
                                                                @if ($student->img)
                                                                    <img src="{{ asset($student->img) }}"
                                                                        class="img-thumbnail" width="150px" alt="">
                                                                @endif
                                                                <input type="file" name="img" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="email" type="text" class="form-control"
                                                                    placeholder="Email"
                                                                    value="{{ old('email', $student->email) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="password" type="password" class="form-control"
                                                                    placeholder="Password"
                                                                    value="{{ old('password', $student->password) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
