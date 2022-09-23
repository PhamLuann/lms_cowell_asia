@forelse($courses as $course)
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="c-card border border-dark rounded-circle">
        <div class="text-center" style="margin-bottom: 10px;">
            <img src="{{ asset($course->img) }}" alt="course-img" class="image-course">
        </div>
        <div class="courses-tit">
            <h2 class="text-capitalize fw-bold text-center">{{$course->name}}</h2>
        </div>
        <div class="course-des">
            <p style="color: wheat;"><span><i class="fa fa-clock"></i></span> <b>Duration:</b> {{$course->duration}} Months</p>
            <p style="color: wheat;"><span><i class="fa fa-clock"></i></span> <b>Description:</b> {{$course->description}}</p>
        </div>
        <div class="">
            <a href="{{route('course.detail', [$course->id])}}" type="button" class="btn btn-success">Detail</a>
            <a href="{{ route('course.editcourse', [$course->id]) }}" type="button" class="btn btn-warning">Edit</a>
            <form method="post" action="{{ route('course.delete') }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                <button onclick="return confirm('Confirm Delete!')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@empty
<h2 class="text-danger">No Courses</h2>
@endforelse
<div style="position: absolute; bottom: 0%;">
    {{ $courses->links() }}
</div>