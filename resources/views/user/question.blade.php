@extends('user.layouts.user_app')
@section('title', 'Exam')

@section('content')
<div>
    <h3 class="title22Bold" style="text-align: center">Ôn tập 400 câu trắc nghiệm Mạo từ Phần 1</h3>
    <div class="detail-question" style="padding: 10px">
        <div class="num-question col" style="padding-left: 1px!important;"><span><i class="fa fa-check-square-o" aria-hidden="true">
                </i>Thời gian làm bài :</span>
            <input type="text" id="m_val" placeholder="Phút" value="{{ $exam->time_limit }}" /> <br />
        </div>

        </i>Thời gian còn lại:</span>
        <!-- Display the countdown timer in an element -->
        <p id="demo"></p>

        <script>
            // Set the date we're counting down to
            var tim = "<?php echo $exam->time_limit; ?>";

            var distance = tim * 60 * 1000;
            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date


                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("demo").innerHTML = "Thời gian còn lại: " +
                    +minutes + "m " + seconds + "s ";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.myform.submit();
                }
                distance -= 1000;
            }, 1000);
        </script>

    </div>
</div>
<form action="{{ url('student/' . $ids . '/exam' . '/' . $ide) }}" method="post" onsubmit="record()" name="myform" id="form1">
    @csrf
    <script>
        function record() {

        }
    </script>

    <div class="exam-content">
        <?php $i = 0; ?>


        @foreach($data as $ch)
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10 col-lg-10">
                    <div class="border">
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                @switch($ch->type)
                                @case(1)
                                <h3 class="text-danger">{{ 'Câu hỏi' . $i + 1}}</h3>
                                <h5 class="mt-1 ml-2"><?php echo $ch->name; ?></h5>
                            </div>
                            <div class="ans ml-2">
                                <input type="radio" name="{{ $i }}" id="<?php echo $i . '1'; ?>" value="1">
                                <label for="<?php echo $i . '1'; ?>">
                                    <?php echo $ch->answer1; ?>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <input type="radio" name="{{ $i }}" id="<?php echo $i . '2'; ?>" value="2">
                                <label for="<?php echo $i . '2'; ?>">
                                    <?php echo $ch->answer2; ?>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <input type="radio" name="{{ $i }}" id="<?php echo $i . '3'; ?>" value="3">
                                <label for="<?php echo $i . '3'; ?>">
                                    <?php echo $ch->answer3; ?>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <input type="radio" name="{{ $i }}" id="<?php echo $i . '4'; ?>" value="4">
                                <label for="<?php echo $i . '4'; ?>">
                                    <?php echo $ch->answer4; ?>
                                </label>
                            </div>
                        </div>
                        @break
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            @case(2)
                            <h3 class="text-danger">{{ 'Câu hỏi :' . $i + 1 }}</h3>
                            <h5 class="mt-1 ml-2"><?php echo $ch->name; ?></h5>
                        </div>
                        <div class="ans ml-2">
                            <input type="checkbox" name="{{ $i . '1' }}" id="1">
                            <label for="<?php echo $i . '1'; ?>" class="checkbox" value="1">
                                <?php echo $ch->answer1; ?>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <input type="checkbox" name="{{ $i . '2' }}" id="2">
                            <label for="<?php echo $i . '2'; ?>" class="checkbox" value="2"><?php echo $ch->answer2; ?>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <input type="checkbox" name="{{ $i . '3' }}" id="3">
                            <label for="<?php echo $i . '3'; ?>" class="checkbox" value="3"><?php echo $ch->answer3; ?>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <input type="checkbox" name="{{ $i . '4' }}" id="">
                            <label for="<?php echo $i . '4'; ?>" class="checkbox" value="4"><?php echo $ch->answer4; ?>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                @break
                <div class="container mt-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10 col-lg-10">
                            <div class="border">
                                <div class="question bg-white p-3 border-bottom">
                                    @case(3)
                                    <div class="d-flex flex-row align-items-center question-title">
                                        <h3 class="text-danger">{{ 'Câu hỏi :' . $i + 1 }}</h3>
                                        <h5 class="mt-1 ml-2"><?php echo $ch->name; ?></h5>
                                    </div>
                                    <div class="ans ml-2">
                                        <input type="text" name="{{'traloi'.$i}}" placeholder="Nhập câu trả lời ">
                                    </div>
                                    @break
                                    @endswitch

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <br></br>
            <div class="" style="text-align: center;">
                <button type="submit" onclick="record()" class="btn btn-info"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            </div>
            <br></br>
            <script>
                function record() {
                    document.getElementById("demo1").value = (tim * 60 * 1000 - distance) / 1000;
                }
            </script>
        </div>

        @stop