<div class="asset-inner">
    <table>
        <tr>
            <th>ID</th>
            <th>Name of Class</th>
            <th>Semester</th>
            <th>Courses</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
        @forelse($classes as $class)
            <tr>
                <td>
                    {{ $loop->iteration + ($classes->currentPage() - 1) * $classes->perPage() }}
                </td>
                <td><a href="{{ route('class.detail', [$class->id]) }}"></a> {{ $class->name }} </td>
                <td> {{ $class->semester }} </td>
                @if (count($class->courses()->get())>0)
                    <td> {{ $class->courses()->first()->name }} </td>
                @else
                    <td> No course </td>
                @endif
                <td> {{ $class->description }} </td>
                <td>
                    <a class="btn btn-warning" href="{{ route('class.formedit', [$class->id]) }}"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <form method="post" action="{{ route('class.destroy') }}"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="class_id" id="class_id"
                            value="{{ $class->id }}">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"
                                aria-hidden="true"></i></button>
                    </form>
                    <a class="btn btn-primary"
                        href="{{ route('class.detail', [$class->id]) }}">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Class</td>
            </tr>
        @endforelse
    </table>
</div>
<div>
    {{ $classes->links()}}
</div>
