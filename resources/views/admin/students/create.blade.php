@extends('admin.layouts.app')
@section('title', 'Add Students')

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15" style="min-height: 550px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Insert Student Information</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="{{ route('student.store') }}" method="post"
                                                    enctype="multipart/form-data" class="">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="address" type="text" class="form-control"
                                                                    placeholder="Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="gender" type="text" class="form-control"
                                                                    placeholder="Gender">
                                                            </div>
                                                            <div class="mb-3" style="margin-bottom: 20px;">
                                                                <span style="font-size: 14px"
                                                                    class="label label-info"></span>
                                                                <input type="file" class="form-control" name="img"
                                                                    accept=".jpg, .png, .gif, .ico">
                                                                @error('img')
                                                                    <div class="invalid-feedback" style="color: red;">*{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name='email' type="text" class="form-control"
                                                                    placeholder="Email">
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
