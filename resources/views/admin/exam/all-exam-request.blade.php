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
</div>
@stop
@section('content')
<?php

use App\Models\Question; ?>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Danh Sách Câu Hỏi Chờ Cho Điểm</h4>

                    <div class="asset-inner">
                        <table class="table">
                            <tr>
                                <th>ID Câu hỏi </th>
                                <th>Tên câu hỏi </th>
                                <th style="width:500px;">Câu trả lời</th>
                                <th> Điểm </th>


                                <th>Setting</th>
                            </tr>
                            @foreach ($exams as $item)
                            <tr>
                                <td>{{ $item->question_id }}</td>
                                <td><?php $a = Question::find($item->question_id);
                                    echo $a->name; ?></td>
                                <td>
                                    <p style="word-wrap: break-word;">{{ $item->answer }}</p>
                                </td>

                                <td>

                                    <input class="form-control" required form="{{ 'form' . $item->id }}" name="point" placeholder="Nhập điểm">
                                </td>

                                <td>
                                    <form action="{{route('requestexam',[$item->id]) }}" method="POST" id="{{ 'form' . $item->id }}">
                                        @csrf
                                        <button type="submit" title="Submit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach


                        </table>
                        {{ $exams->appends(request()->all())->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection