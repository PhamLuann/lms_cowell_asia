@extends('admin.layouts.app')
@section('title', 'Admin Home')

@section('content')


    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:50px" >
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Thêm Bài Test</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <form id="add-department" action="{{ route('exam.store') }}"
                                                class="add-department" method="post">
                                                {!! csrf_field() !!}
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Tên bài test</span>
                                                            <input required name="name" type="text" class="form-control">
                                                            
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Thời gian làm bài</span>
                                                            <input required name="time_limit" type="text" class="form-control"
                                                                placeholder="Nhập thời gian làm bài tính theo phút">
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Mô tả</span>
                                                            <input required name="description" type="text" class="form-control"
                                                                placeholder="Kiểm tra 15p,vv..">
                                                        </div>

                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Chủ đề</span>
                                                            <input required name="tag" type="text" class="form-control"
                                                                placeholder="Java,PHP,...">
                                                        </div>
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

@endsection
