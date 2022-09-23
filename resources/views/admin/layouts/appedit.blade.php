<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">

  <!-- educate icon CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('css/educate-custon-icon.css')}}">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/morrisjs/morris.css')}}">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu-vertical.css')}}">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.print.min.css')}}">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
  <!-- modernizr JS
		============================================ -->
  <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- for select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
  @include('admin.partials.sidebaredit')
  <!-- End Left menu area -->

  <!-- Start Welcome area -->
  <div class="all-content-wrapper" style="position: relative;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="">
            <a href="#"><img class="" src="{{asset('img/logo.png')}}" alt="" /></a>
          </div>
        </div>
      </div>
    </div>
    @include('admin.partials.header')
    @yield('content')
  </div>
  @include('admin.partials.footer')


  <!-- jquery
		============================================ -->
  <script src="{{ asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <!-- wow JS
		============================================ -->
  <script src="{{ asset('js/wow.min.js')}}"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="{{ asset('js/jquery-price-slider.js')}}"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="{{ asset('js/jquery.meanmenu.js')}}"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
  <!-- sticky JS
		============================================ -->
  <script src="{{ asset('js/jquery.sticky.js')}}"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
  <!-- counterup JS
		============================================ -->
  <script src="{{ asset('js/counterup/jquery.counterup.min.js')}}"></script>
  <script src="{{ asset('js/counterup/waypoints.min.js')}}"></script>
  <script src="{{ asset('js/counterup/counterup-active.js')}}"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="{{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{ asset('js/scrollbar/mCustomScrollbar-active.js')}}"></script>
  <!-- metisMenu JS
		============================================ -->
  <script src="{{ asset('js/metisMenu/metisMenu.min.js')}}"></script>
  <script src="{{ asset('js/metisMenu/metisMenu-active.js')}}"></script>
  <!-- morrisjs JS
		============================================ -->
  <script src="{{ asset('js/morrisjs/raphael-min.js')}}"></script>
  <script src="{{ asset('js/morrisjs/morris.js')}}"></script>
  <script src="{{ asset('js/morrisjs/home3-active.js')}}"></script>
  <!-- morrisjs JS
		============================================ -->
  <script src="{{ asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{ asset('js/sparkline/jquery.charts-sparkline.js')}}"></script>
  <script src="{{ asset('js/sparkline/sparkline-active.js')}}"></script>
  <!-- calendar JS
		============================================ -->
  <script src="{{ asset('js/calendar/moment.min.js')}}"></script>
  <script src="{{ asset('js/calendar/fullcalendar.min.js')}}"></script>
  <script src="{{ asset('js/calendar/fullcalendar-active.js')}}"></script>
  <!-- plugins JS
		============================================ -->
  <script src="{{ asset('js/plugins.js')}}"></script>
  <!-- main JS
		============================================ -->
  <script src="{{ asset('js/main.js')}}"></script>
  <!-- tawk chat JS
		============================================ -->
  <!-- maskedinput JS
		============================================ -->
  <script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
  <script src="{{asset('js/masking-active.js')}}"></script>
  <script src="{{asset('js/datepicker/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/datepicker/datepicker-active.js')}}"></script>
  <!-- dropzone JS
		============================================ -->
  <script src="{{asset('js/dropzone/dropzone.js')}}"></script>
  <!-- tab JS
		============================================ -->
  <script src="{{asset('js/tab.js')}}"></script>
  <!-- form validate JS
		============================================ -->
  <script src="{{asset('js/form-validation/jquery.form.min.js')}}"></script>
  <script src="{{asset('js/form-validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('js/form-validation/form-active.js')}}"></script>
  <!-- <script src="{{ asset('js/tawk-chat.js')}}"></script> -->
  <!-- for select 2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>