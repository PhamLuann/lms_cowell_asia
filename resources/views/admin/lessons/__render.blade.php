@forelse($lessons as $lesson)
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="c-card border border-dark rounded-circle">
        <div class="courses-tit">
            <h2 class="text-capitalize fw-bold text-center">{{$lesson->name}}</h2>
        </div>
        <div class="course-des">
            <p class="text-capitalize" style="color:wheat;"><span><i class="fa fa-clock text-capitalize"></i></span> <b>Course:</b> {{$lesson->course()->first()->name}}</p>
            <p style="color:wheat;"><span><i class="fa fa-clock"></i></span> <b>Chapter:</b>{{$lesson->chapter}}</p>
            <p style="color:wheat;"><span><i class="fa fa-clock"></i></span> <b>Description:</b>{{$lesson->description}}</p>
        </div>
        <div class="">
            <a href="{{route('lesson.detail', [$lesson->id]) }}" type="button" class="btn btn-success">Detail</a>
            <a href="{{route('lesson.edit', [$lesson->id]) }}" type="button" class="btn btn-warning">Edit</a>
            <form method="post" action="{{ route('lesson.delete') }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="lesson_id" id="lesson_id" value="{{ $lesson->id }}">
                <button onclick="return confirm('Confirm Delete!')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@empty
<h2>No data found</h2>
@endforelse
<div id="pagination" style="position: absolute; bottom: 0%;">{!!$lessons->links()!!}</div>