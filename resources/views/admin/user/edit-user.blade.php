@extends('admin.layouts.app')
@section('title', 'Edit User')

@section('content')        
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Edit User</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                        <form action="{{ route('user.edit', $user->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <input name="first_name" type="text" class="form-control" 
                                                            placeholder="First Name" value="{{ old('first_name', $user->first_name) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="last_name" type="text" class="form-control" 
                                                            placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <input name="role" type="text" class="form-control" 
                                                            placeholder="Role" value="{{ old('role', $role->first()->role_id) }}"> -->
                                                            <div class="form-group">
                                                            <select name="role"  type="text" class="form-control"  >
                                                            <option value="{{ old('role', $role->first()->role_id) }}">{{ $role->first()->name}}</option>
                                                            @forelse($orther_roles as $ro)
                                                                <option value="{{$ro->id}}">{{$ro->name}}</option>
                                                            @empty
                                                            @endforelse
                                                            </select>
                                                        </div>
                                                        </div>
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
@stop