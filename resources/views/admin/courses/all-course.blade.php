@extends('admin.layouts.app')
@section('title', 'All Courses')

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
                                    <input type="text" id="key" name="key" placeholder="Search..." class="form-control" style="width: 450px !important;">
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
<div id="data" class="courses-area container-fluid" style="min-height: 450px;">
    @include('admin.courses.__render')
</div>
@include('admin.courses.__alert')

<script>
    $(document).ready(function() {
        function fetch_data(page, query) {
            $.ajax({
                url: "{{route('course.search')}}" + "?page=" + page + "&query=" + query,
                success: function(data) {
                    $('#data').html('');
                    $('#data').html(data);
                }
            })
        }

        $(document).on('keyup', '#key', function() {
            var query = $('#key').val();
            var page = $('#hidden_page').val();
            fetch_data(page, query);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);

            var query = $('#key').val();
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            fetch_data(page, query);
        });

    });
</script>
@stop
