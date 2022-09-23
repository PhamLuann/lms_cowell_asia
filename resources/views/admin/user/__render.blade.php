<div class="asset-inner">
    <table>
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Setting</th>
        </tr>
        @forelse($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('user.editform', [$user->id]) }}" data-toggle="tooltip"
                        title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <form method="post" action="{{ route('user.destoy') }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                        <button type="submit" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i
                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>

                </td>
            </tr>
        @empty
        @endforelse
    </table>
</div>

<div>
    {!! $users->links() !!}
</div>
