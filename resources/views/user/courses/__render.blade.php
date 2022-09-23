<div class="row" >
@forelse($courses as $course)
<div class="col-md-6">
        <!--POPULAR COURSES-->
        <div class="home-top-cour">
            <!--POPULAR COURSES IMAGE-->
            <div class="col-md-3"> <img src="{{asset($course->img)}}" alt=""> </div>
            <!--POPULAR COURSES: CONTENT-->
            <div class="col-md-9 home-top-cour-desc">
                <a href="{{route('booking', [$course->id])}}">
                    <h3>{{$course->name}}</h3>
                </a>
                <h4>{{$course->description}}</h4>
                <p>{{$course->duration}}</p> <span class="home-top-cour-rat">4.2</span>
                <div class="hom-list-share">
                    <ul>
                        <li><a href="{{route('booking', [$course->id])}}"><i class="fa fa-bar-chart" aria-hidden="true"></i>Start Now</a> </li>
                        <li><a><i class="fa fa-eye" aria-hidden="true"></i>10 Aavailable</a> </li>
                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        @empty
        @endforelse
</div>
</div>