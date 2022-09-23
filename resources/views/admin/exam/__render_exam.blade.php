<div class="asset-inner">
    <table>
        <tr>
            <th>ID Bài Test </th>
            <th>Tên </th>
            <th>Mô tả</th>
            <th>Chủ đề</th>
            <th>Điểm tối đa</th>
            <th>Thời gian làm</th>
            <th>Setting</th>
        </tr>
        @forelse($exams as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->tag}}</td>
            <td>{{$item->maxpoint}}</td>
            <td>{{$item->time_limit.' phút'}}</td>
            
            <td>
                <form action="{{ route('exam.edit', $item->id) }}">
                    <button  type="submit"  title="Edit" class="pd-setting-ed"><i
                        class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
                <form action="{{  route('exam.destroy',$item->id) }}" method="POST" >
                     {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    <button onclick="return confirm('Confirm Delete!')"  title="Delete" class="pd-setting-ed"><i
                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form>
                <form action="{{ route('exam.show', $item->id) }}" method="GET">
                    <button  type="submit" data-toggle="tooltip" title="Info" class="pd-setting-ed"><i
                         class="fa fa-info" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <h3>No data</h3>
        @endforelse
       
    
    </table>
    {{$exams->appends(request()->all())->links()}}

</div>