@extends('admin.layouts.app')
@section('title', 'Admin Home')

@section('content')


    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:60px">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Thông Tin Bài Kiểm Tra</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <form id="add-department" action="{{ url('admin/exam/'.$exam->id.'create') }}"
                                                class="add-department" method="get">
                                                {!! csrf_field() !!}
                                                
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Tên bài kiểm tra</span>
                                                            <h3   type="text" class="form-control" >{{$exam->name}}  </h3>
                                                            
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Thời gian làm bài</span>
                                                            <h3   type="text" class="form-control" >{{$exam->time_limit.' phút '}}  </h3>
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Mô tả</span>
                                                            <h3   type="text" class="form-control" >{{$exam->description}}  </h3>
                                                        </div>

                                                        <div class="form-group">
                                                            <span style="font-size: 14px" class="label label-info">Chủ đề</span>
                                                            <h3   type="text" class="form-control" >{{$exam->tag}}  </h3>
                                                        </div>
                                                    </div>





                                                </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2>Danh sách câu hỏi thuộc bài kiểm tra</h2>
                                                <br>
                                                <h4>{{'Số câu: '.$count}}</h4>
                                                <br>
                                                <h4>{{'Tổng điểm: '.$exam->maxpoint}}</h4>
                                                <div class="add-product">
                                                    <a href="{{url('admin/exam/'.$exam->id.'/create')}}">Thêm câu hỏi vào bài kiểm tra </a>
                                                   
                                                </div>
                                                
                                                
                                                
                                                 <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Id câu hỏi</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Đáp án 1</th>
                                                        <th scope="col">Đáp án 2</th>
                                                        <th scope="col">Đáp án 3</th>
                                                        <th scope="col">Đáp án 4</th>
                                                        <th scope="col">Đáp án đúng</th>
                                                        <th>Điểm </th>
                                                        <th scope="col">Loại câu hỏi</th>
                                                        <th scope="col">Action</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($questions as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->answer1}}</td>
                                    <td>{{$item->answer2}}</td>
                                    <td>{{$item->answer3}}</td>
                                    <td>{{$item->answer4}}</td>
                                    <td>{{$item->correct_answer}}</td>
                                    <td>{{$item->point}}</td>
                                    <td>@switch($item->type)
                                        @case(1)
                                            {{'Trắc nghiệm 1 đáp án'}}
                                            @break
                                        @case(2)
                                        {{'Trắc nghiệm nhiều đáp án'}}
                                            @break
                                        @case(3)
                                            {{'Tự luận'}}
                                                @break
                                        @default
                                            
                                    @endswitch</td>
                                    <td>
                                        <form action=""></form>
                                        <form action="{{ route('question.edit', $item->id) }}">
                                            <button  type="submit" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </form>
                                        <form action="{{  url('admin/exam/' . $exam->id.'/delete/'.$item->id) }}" method="get" >
                                            
                                            <button onclick="return confirm('Confirm Delete!')" data-toggle="tooltip" title="Remove form Exam" class="pd-setting-ed"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                                  
                                                    </tbody>
                                                  </table>
                                                {{-- {{$questions->appends(request()->all())->links()}} --}}
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
    

@endsection
