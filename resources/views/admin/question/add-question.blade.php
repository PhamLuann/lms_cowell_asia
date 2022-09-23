@extends('admin.layouts.app')
@section('title', 'Admin Home')

@section('content')
   <!-- Single pro tab review Start-->
   <div class="single-pro-review-area mt-t-30 mg-b-15 mg-t-30" style="margin-top:50px ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Thêm Câu Hỏi</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <form id="add-department" action="{{ route('question.store') }}" class="add-department" method="post">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <textarea required name="name" type="text" class="form-control" placeholder="Name" size="200"></textarea>
                                                    </div>
                                                    
                                                
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input required name="answer1" type="text" class="form-control" placeholder="Đáp án 1">
                                                    </div>
                                                    <div class="form-group">
                                                        <input required name="answer2" type="text" class="form-control" placeholder="Đáp án 2">
                                                    </div>
                                                    <div class="form-group">
                                                        <input required name="answer3" type="text" class="form-control" placeholder="Đáp án 3">
                                                    </div>
                                                    <div class="form-group">
                                                        <input required name="answer4" type="text" class="form-control" placeholder="Đáp án 4 ">
                                                    </div>

                                                        <div required class="form-group">
                                                            <input name="correct_answer" type="text" class="form-control" placeholder="Đáp án đúng ">
                                                        </div>
                                                            <div class="form-group">
                                                                <select required name="type" class="form-control">
                                                                        <option disabled value="none" selected="" disabled="">Chọn loại câu hỏi</option>
                                                                        <option value="1">Trắc nghiệp 1 đáp án</option>
                                                                        <option value="2">Trắc nghiệp nhiều đáp án</option>
                                                                        <option value="3">Tự luận</option>
                                                                        <option value="4">Khác</option>
                                                                        
                                                                    </select>
                                                            </div>
                                                            <div required class="form-group">
                                                                <input name="point" type="text" class="form-control" placeholder="Điểm">
                                                            </div>
                                                        
                                                    
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
