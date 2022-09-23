@extends('user.layouts.user_app')
@section('title', 'All Courses')
@section('search')
<div class="search-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-form">
                            <form>
                                <div class="sf-type">
                                    <div class="sf-input">
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

                                        <input type="text" id="key" name="key" placeholder="Search course">
                                    </div>
                                </div>
                                <div class="sf-submit">
                                    <input type="submit" value="Search Course">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop
@section('content')
    <div class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>All <span>Courses</span></h2>
                </div>
            </div>
            <div id="data">@include("user.courses.__render")</div>
        </div>
</div>
<script>
    $(document).ready(function() {
        function fetch_data(page, query) {
            $.ajax({
                url: "{{route('search')}}" + "?page=" + page + "&query=" + query,
                success: function(data) {
                    $('#data').html('');
                    $('#data').html(data);
                }
            })
        }

        $(document).on('keyup', '#key', function() {
            var query = $('#key').val();
            var page = $('#hidden_page').val();
            alert(query);
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