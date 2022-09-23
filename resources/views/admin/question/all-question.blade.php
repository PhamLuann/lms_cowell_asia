@extends('admin.layouts.app')
@section('title', 'Admin Home')
@section('search')
    
        
            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:50px">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func" action="{{ url('admin/search/question') }}"
                                        method="get">
                                        <div class="row">
                                            <div class=" col-sm-6 "><input style="display:inline margin-left:50px"
                                                    type="text" name="name" placeholder="Search..."
                                                    class="search-int form-control"></div>
                                            <div class="col-sm-6 "><button style="margin-left:50px" type="submit"
                                                    class="btn btn-primary">Apply</button></div>
                                            
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-right:50px">
                                <select class="form-select" name="type" aria-label="Default select example">
                                    <option selected value=""> Chọn loại câu hỏi</option>
                                    <option value="1">Trắc nghiệp 1 đáp án</option>
                                    <option value="2">Trắc nghiệp nhiều đáp án</option>
                                    <option value="3">Tự Luận</option>
                                    <option value="4">Khác</option>
                                </select>
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
                        <h4>Danh Sách Câu Hỏi</h4>
                        <div class="add-product">
                            <a href="{{ url('admin/question/create') }}">Thêm Câu Hỏi</a>

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
                                    <th>Action</th>
                                </tr>
                                @foreach ($questions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->answer1 }}</td>
                                        <td>{{ $item->answer2 }}</td>
                                        <td>{{ $item->answer3 }}</td>
                                        <td>{{ $item->answer4 }}</td>
                                        <td>{{ $item->correct_answer }}</td>
                                        <td>{{ $item->point }}</td>
                                        <td>
                                            @switch($item->type)
                                                @case(1)
                                                    {{ 'Trắc nghiệm 1 đáp án' }}
                                                @break

                                                @case(2)
                                                    {{ 'Trắc nghiệm nhiều đáp án' }}
                                                @break

                                                @case(3)
                                                    {{ 'Tự luận' }}
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td>
                                            <form action="{{ route('question.edit', $item->id) }}">
                                                <button type="submit" data-toggle="tooltip" title="Edit"
                                                    class="pd-setting-ed"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                            <form action="{{ url('admin/question/' . $item->id) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button onclick="return confirm('Confirm Delete!')" data-toggle="tooltip"
                                                    title="Delete" class="pd-setting-ed"><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </table>
                            {{ $questions->appends(request()->all())->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
