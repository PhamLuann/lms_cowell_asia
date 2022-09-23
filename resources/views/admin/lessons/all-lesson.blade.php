@extends('admin.layouts.app')
@section('title', 'All Lesson')

@section('search')
<div class="breadcome-area mg-t-30">
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
                        <div class="col-lg-6 col-md-6 col-sm6 col-xs-12">
                            <form class="breadcome-heading">
                                @csrf
                                <select id="fillter" class="form-control" name="scopes[]" style="width: 400px;">
                                    <option value="">Fillter</option>
                                    <optgroup multiple="multiple" id="ftcourse" name="ftcourse" label="By Course">
                                        @forelse($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                        @empty
                                        @endforelse
                                    </optgroup>
                                    <optgroup id="ftchapter" name="ftchapter" label="By Chapter">
                                        @forelse($chapters as $chapter)
                                        <option value="{{$chapter->chapter}}">{{$chapter->chapter}}</option>
                                        @empty
                                        @endforelse
                                    </optgroup>
                                </select>
                            </form>
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
    <!-- for data show -->
    @include('admin.lessons.__render')
</div>

<script>
    $(document).ready(function() {
        function fetch_data(page, query, fillter) {
            $.ajax({
                url: "{{route('lesson.search')}}" + "?page=" + page + "&query=" + query + "&fillter=" + fillter,
                success: function(data) {
                    $('#data').html('');
                    $('#data').html(data);
                }
            })
        }

        $(document).on('keyup', '#key', function() {
            var query = $('#key').val();
            var fillter = $('#fillter').val();
            var page = $('#hidden_page').val();
            fetch_data(page, query, fillter);
        });

        $(document).on('change', '#fillter', function() {
            var query = $('#key').val();
            var fillter = $('#fillter').val();
            var page = $('#hidden_page').val();
            fetch_data(page, query, fillter);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);

            var query = $('#key').val();
            var fillter = $('#fillter').val();

            $('li').removeClass('active');
            $(this).parent().addClass('active');
            fetch_data(page, query, fillter);
        });

    });
</script>
@stop