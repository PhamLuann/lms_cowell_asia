<div class="asset-inner">
    <table>
        <tr>
            <th>ID Bài Test </th>
            <th>Tên </th>
            <th>Mô tả</th>
            <th>Chủ đề</th>
            <th>Điểm tối đa</th>
            <th>Thời gian làm</th>
            <th></th>
        </tr>
        @forelse($exams as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->tag }}</td>
                <td>{{ $item->maxpoint }}</td>
                <td>{{ $item->time_limit . ' phút' }}</td>

                <td>

                    <form action="{{ route('student.addidexam') }}" method="post">
                        @csrf
                        <input type="text" hidden="true" name="student_id" value="{{ $student_id }}">
                        <input type="text" hidden="true" name="exam_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary"><i aria-hidden="true"></i>Add</button>
                    </form>
                </td>
            </tr>

        @empty
            <h3>No data</h3>
        @endforelse


    </table>
    {{ $exams->appends(request()->all())->links() }}
</div>
