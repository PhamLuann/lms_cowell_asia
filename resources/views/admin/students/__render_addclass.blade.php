<div class="asset-inner">
    <table>
        <tr>
            <th>ID</th>
            <th>Name of Class</th>
            <th>Semester</th>
            <th>Description</th>
        </tr>
        @forelse($classes as $class)
            <form action="{{ route('student.add_id') }}" method="post">
                @csrf
                <input type="text" hidden="true" name="student_id" value="{{ $student_id }}">
                <input type="text" hidden="true" name="classes_id" value="{{ $class->id }}">
                <tr>
                    <td>
                        {{ $loop->iteration + ($classes->currentPage() - 1) * $classes->perPage() }}
                    </td>
                    <td> {{ $class->name }} </td>
                    <td> {{ $class->semester }} </td>
                    <td> {{ $class->description }} </td>
                    <td>
                        <button type="submit" class="btn btn-primary"><i
                                aria-hidden="true"></i>Add</button>
                    </td>
                </tr>
            </form>
        @empty
            <tr>
                <td colspan="6">No Class</td>
            </tr>
        @endforelse
    </table>
</div>
<div>
    {{$classes->links()}}
</div>
