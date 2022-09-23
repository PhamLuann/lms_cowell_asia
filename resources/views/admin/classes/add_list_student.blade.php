@extends('admin.layouts.app')
@section('title', 'Add Student')

@section('search')
    <!-- Single pro tab review Start-->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                        <input type="text" id="key" name="key" placeholder="Search..."
                                            class="form-control" style="width: 450px !important;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="product-status mg-b-15" style="min-height: 550px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Student List</h4>
                        <div class="asset-inner">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name of Student</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                                @forelse($students as $student)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td><img src="{{ asset($student->img) }}" alt="None" /></td>
                                        <td> {{ $student->name }} </td>
                                        <td> {{ $student->address }} </td>
                                        <td> {{ $student->email }} </td>
                                        <td> {{ $student->gender }} </td>
                                        <td> {{ $student->created_at }}</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $student->id }}"
                                                    name="{{ 'adds' . $student->id }}" form="myform">
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Student</td>
                                    </tr>
                                @endforelse
                            </table>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="payment-adress">
                                        <form id="myform" method="post">
                                            @csrf
                                            <input name="url" hidden="true" type="hidden" value="{{$url}}">
                                            <button type="submit" formaction="{{ route('class.add_listid', [$class_id]) }}"
                                                class="btn btn-primary">Save</button>
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
@endsection
