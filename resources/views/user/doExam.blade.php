<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Làm Bài</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="lambai.css">
    <link rel="stylesheet" href="public/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
        body {
            background-color: #fdf3f4;
        }
    </style>


</head>


<body>





    <div class="content-two-columns">
        <div class="container">
            <div class="row">

                <div class="cot-trai">

                    <div class="skill-test-lists common-test-detail">
                        <div class="col-12 col-lg-12 col-sm-12">
                            <div class="row">

                                <div class="d9Box part-item detail">
                                    <input id="navbar-indicator" class="navbar-collapse" type="checkbox" checked>

                                    <h3 class="title22Bold" style="text-align: center">{{$exam->name}}</h3>
                                    <div class="detail-question" style="padding: 10px">
                                        <div class="num-question col" style="padding-left: 1px!important;"><span><i
                                                    class="fa fa-check-square-o" aria-hidden="true"></i>Thời gian làm
                                                bài : {{ $exam->time_limit }} Phút</span>
                                            <p></p> 

                                        </div>

                                       


                                        <!-- Display the countdown timer in an element -->
                                        <p id="demo"></p>

                                        <script>
                                            // Set the date we're counting down to
                                            var tim = "<?php echo $exam->time_limit; ?>";

                                            var distance = 0.1 * 60 * 1000;
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
                                                if (distance <= 0) {
                                                    clearInterval(x);
                                                    record();
                                                    document.myform.submit();
                                                }
                                                distance -= 1000;
                                            }, 1000);
                                        </script>

                                    </div>
                                </div>
                                <form action="{{ url('student/' . $ids . '/exam' . '/' . $ide) }}" method="post"
                                    onsubmit="record()" name="myform" id="form1">
                                    @csrf
                                    <script>
                                        function record() {

                                        }
                                    </script>

                                    <div class="exam-content">
                                        <?php $i = 0; ?>


                                        <?php foreach ($data as $ch): ?>

                                        <ul>

                                            @switch($ch->type)
                                                @case(1)
                                                    <li>


                                                        <h4>{{ 'Câu hỏi :' . $i + 1 }}</h4>



                                                        <p><?php echo $ch->name; ?></p>
                                                        <div class="part-item detail question-detail" style="padding: 10px">
                                                            <div class="question-answer-detail" data-type="0">
                                                                <!-- Single choice-->

                                                                <label for="<?php echo $i . '1'; ?>" class="container">
                                                                    <input type="radio" name="{{ $i }}"
                                                                        id="<?php echo $i . '1'; ?>"
                                                                        value="1"><?php echo $ch->answer1; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                                <label for="<?php echo $i . '2'; ?>" class="container">

                                                                    <input type="radio" name="{{ $i }}"
                                                                        id="<?php echo $i . '2'; ?>"
                                                                        value="2"><?php echo $ch->answer2; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                                <label for="<?php echo $i . '3'; ?>" class="container">
                                                                    <input type="radio" name="{{ $i }}"
                                                                        id="<?php echo $i . '3'; ?>" value="3">
                                                                    <?php echo $ch->answer3; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                                <label for="<?php echo $i . '4'; ?>" class="container">

                                                                    <input type="radio" name="{{ $i }}"
                                                                        id="<?php echo $i . '4'; ?>"
                                                                        value="4"><?php echo $ch->answer4; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                            </div>

                                                    </li>
                                                @break

                                                @case(2)
                                                    <li>


                                                        <h4>{{ 'Câu hỏi :' . $i + 1 }}</h4>



                                                        <p><?php echo $ch->name; ?></p>
                                                        <div class="part-item detail question-detail" style="padding: 10px">
                                                            <div class="question-answer-detail" data-type="0">
                                                                <!-- Single choice-->

                                                                <label for="<?php echo $i . '1'; ?>" class="container">
                                                                    <input type="checkbox" name="{{ $i . '1' }}"
                                                                        id="<?php echo $i . '1'; ?>"
                                                                        value="1"><?php echo $ch->answer1; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                                <label for="<?php echo $i . '2'; ?>" class="container">

                                                                    <input type="checkbox" name="{{ $i . '2' }}"
                                                                        id="<?php echo $i . '2'; ?>"
                                                                        value="1"><?php echo $ch->answer2; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                                <label for="<?php echo $i . '3'; ?>" class="container">
                                                                    <input type="checkbox" name="{{ $i . '3' }}"
                                                                        id="<?php echo $i . '3'; ?>" value="1">
                                                                    <?php echo $ch->answer3; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                                <label for="<?php echo $i . '4'; ?>" class="container">

                                                                    <input type="checkbox" name="{{ $i . '4' }}"
                                                                        id="<?php echo $i . '4'; ?>"
                                                                        value="1"><?php echo $ch->answer4; ?>

                                                                    <span class="checkmark"></span>

                                                                </label>
                                                                <br></br>
                                                            </div>

                                                    </li>
                                                @break

                                                @case(3)
                                                    <li>

                                                        <h4>{{ 'Câu hỏi :' . $i + 1 }}</h4>



                                                        <p><?php echo $ch->name; ?></p>
                                                        <div class="part-item detail question-detail" style="padding: 10px">
                                                            <textarea name="{{'traloi'.$i}}" placeholder="Nhập câu trả lời ">  </textarea>

                                                        </div>
                                                    </li>
                                                @break
                                            @endswitch

                                        </ul>
                                        <?php $i++; ?>
                                        <?php endforeach;?>
                                        <div style="padding-left: 20px!important;" class="center-btn">
                                            <input form="form1" name="time" type="hidden" id="demo1">
                                            <button onclick="record()" type="submit" class="btn1">Nộp bài</button>

                                            <script>
                                                function record() {
                                                    document.getElementById("demo1").value = (tim * 60 * 1000 - distance) / 1000;
                                                }
                                            </script>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!--/PART 1-->
                        </div>
                    </div>
                </div>
                <!--/ENGLISH TEST SKILL-->
                <style>

                </style>
</body>

</html>
