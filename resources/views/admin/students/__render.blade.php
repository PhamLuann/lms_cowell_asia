<div class="asset-inner">
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Created At</th>
            <th>Optinos</th>
        </tr>
        @forelse($students as $student)
            <tr>

                <td>
                    {{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}
                </td>

                <td><a href="{{ route('student.profile', [$student->id]) }}"><img src="{{ asset($student->img) }}"
                            alt="None" /></a></td>
                <td> {{ $student->address }} </td>
                <td> {{ $student->gender }} </td>
                <td> {{ $student->created_at }}</td>

                <td>
                    <a class="btn btn-warning" href="{{ route('student.formedit', [$student->id]) }}"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <form method="post" action="{{ route('student.destroy') }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"
                                aria-hidden="true"></i></button>
                    </form>
                    {{-- <a class="btn btn-primary" href="{{ route('student.add_classes_students', [$student->id]) }}"><i
                            class="fa fa-plus-square-o" aria-hidden="true"></i></a> --}}
                    <a class="btn btn-primary" href="{{ route('student.profile', [$student->id]) }}">Profile</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Student</td>
            </tr>
        @endforelse
    </table>
</div>
<div>
    {{ $students->links() }}
</div>
