@extends('admin.layouts.app')
@section('title', 'Edit Classes')

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15" style="min-height: 550px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Edit Class Information</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="{{ route('class.edit', [$class->id])  }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="name" type="text" class="form-control"
                                                                    placeholder="Name Class"
                                                                    value="{{ old('name', $class->name) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="semester" type="text" class="form-control"
                                                                    placeholder="Semester"
                                                                    value="{{ old('semester', $class->semester) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="description" type="text"
                                                                    class="form-control" placeholder="Description"
                                                                    value="{{ old('description', $class->description) }}">
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
