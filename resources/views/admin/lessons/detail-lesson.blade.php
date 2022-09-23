@extends('admin.layouts.app')
@section('title', 'Detail Lesson')

@section('search')
<!-- Single pro tab review Start-->
<div class="breadcome-area mg-t-30">
    <div class="container-fluid">
        <div class="row">
            <div class="breadcome-list single-page-breadcome">
                <div class="row">
                    <h2 class="text-center text-capitalize">{{$lesson->name}}</h2>
                    <p class="text-center text-capitalize">Chapter: {{$lesson->chapter}}</p>
                    <p class="text-center text-capitalize">Description: {{$lesson->description}}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="courses-area container-fluid" style="min-height: 530px; text-align: center;">
    @if($lesson->video_url)
    <div style="margin-bottom: 50px;">
        <div id="player"></div>
        @php
        $url = $lesson->video_url;
        $id = substr($url, 32, 11);
        @endphp
        <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '550',
                    width: '1000',
                    videoId: '{{$id}}',
                    playerVars: {
                        'playsinline': 1
                    },
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            function onPlayerReady(event) {
                event.target.playVideo();
            }
            var done = false;

            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.PLAYING && !done) {
                    setTimeout(stopVideo, 6000);
                    done = true;
                }
            }

            function stopVideo() {
                player.stopVideo();
            }
        </script>
    </div>
    @endif
    <!-- end youtube -->

    <!-- file start -->
    <div style="margin-bottom: 40px;">
        @foreach($lesson->files as $file)
            @if(substr($file->file, -3) == 'mp4')
                <video src="{{ asset($file->file)}}" width="1000px" controls></video>
                <hr>
            @endif
            @if(substr($file->file, -3) == 'pdf')
                <div>
                    <embed src="{{ asset($file->file)}}" width="1000" style="min-height: 1500px;" type="application/pdf">
                    <hr>
                </div>
            @endif
            @if(substr($file->file, -3) == 'zip' || substr($file->file, -3) == 'rar')
                <div style="position: absolute; bottom: 10px; left: 50px;">
                    <a href="{{route('lesson.download', [$file->id])}}" class="btn btn-lg btn-primary">Dowload Zip</a>
                </div>
            @endif
        @endforeach
    </div>
    <!-- end file -->
</div>
@stop