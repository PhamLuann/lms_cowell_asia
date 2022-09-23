@forelse($courses as $course)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="c-card border border-dark rounded-circle">
            <form action="{{ route('student.addidcourse') }}" method="post">
                @csrf
                <input type="text" hidden="true" name="student_id" value="{{ $student_id }}">
                <input type="text" hidden="true" name="course_id" value="{{ $course->id }}">
                <div class="text-center" style="margin-bottom: 10px;">
                    <img src="{{ asset($course->img) }}" alt="course-img" class="image-course">
                </div>
                <div class="courses-tit">
                    <h2 class="text-capitalize fw-bold text-center">{{ $course->name }}</h2>
                </div>
                <div class="course-des">
                    <p style="color: wheat;"><span><i class="fa fa-clock"></i></span> <b>Duration:</b>
                        {{ $course->duration }} Months</p>
                    <p style="color: wheat;"><span><i class="fa fa-clock"></i></span> <b>Description:</b>
                        {{ $course->description }}</p>
                </div>
                <div class="" style="text-align: center">
                    <button type="submit" class="btn btn-primary"><i aria-hidden="true"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
@empty
    <h2 class="text-danger">No Courses</h2>
@endforelse
<div style="position: absolute; bottom: 0%;">
    {{ $courses->links() }}
</div>
