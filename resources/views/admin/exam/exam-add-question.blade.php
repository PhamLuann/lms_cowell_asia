@extends('admin.layouts.app')
@section('title', 'Admin Home')
@section('search')
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                              
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Danh sách Câu Hỏi Bài Kiểm Tra Chưa Có</h4>
                        <div class="add-product">
                            <form action="{{url('/admin/exam/'.$exam->id.'/add')}}" id="myform" method="get">
                                <button type="submit"  class="btn btn-primary">Thêm Câu Hỏi Đã Chọn </button>
                            </form>
                           
                        </div>
                        <div class="asset-inner">
                            <table>
                                <tr>
                                    <th>ID Câu hỏi</th>
                                    <th>Name </th>
                                    <th>Đáp án 1</th>
                                    <th>Đáp án 2</th>
                                    <th>Đáp án 3</th>
                                    <th>Đáp án 4</th>
                                    <th>Đáp án đúng</th>
                                    <th>Điểm </th>
                                    <th>Loại câu hỏi </th>
                                    <th>Select</th>
                                </tr>
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="{{'addq'.$item->id}}" form="myform" >
                    
                                              
                                          </div>
                                        
                                    </td>
                                </tr>
                                @endforeach
                               
                               
                            </table>
                            {{$questions->appends(request()->all())->links()}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
