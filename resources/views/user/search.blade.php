@extends('user.layouts.user_app')
@section('title', 'Search')

@section('content')
<section>
        <div class="ed-res-bg">
		<div class="container com-sp pad-bot-70 ed-res-bg">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-rsear">
                        <div class="ed-rsear-in">
                            <ul>
                                <li>
									<div class="ed-rese-grid">
										<div class="ed-rsear-img">
											<img src="{{asset('frontends/images/course/sm-1.jpg')}}" alt="">
										</div>
										<div class="ed-rsear-dec">
											<h4><a href="#">Space Research with Nasa</a></h4>
											<a href="#">Status <span>Success</span></a>
											<a href="#">Duration <span>120 Days</span></a>
											<div class="ed-flag"><img src="images/icon/flag-1.png" alt=""></div>
										</div>
									</div>
                                </li>
                                <li>
									<div class="ed-rese-grid">
										<div class="ed-rsear-img">
											<img src="{{asset('frontends/images/course/sm-2.jpg')}}" alt="">
										</div>
										<div class="ed-rsear-dec">
											<h4><a href="#">Attention deficit disorder</a></h4>
											<a href="#">Status <span>Success</span></a>
											<a href="#">Duration <span>120 Days</span></a>
											<div class="ed-flag"><img src="{{asset('frontends/images/icon/flag-2.png')}}" alt=""></div>
										</div>
								</div>
                            </ul>
                        </div>
                    </div>
                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
		</div>
    </section>
@stop