<table>
    <thead>
        <tr>
            <th align="center" colspan="7"><b>Role</b></th>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th align="center" colspan="7">{{ $permission->name }}</th>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th align="center" colspan="7">Printed Date : {{ now()->isoFormat('LLLL') }}</th>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th align="center"><b>#</b></th>
            <th align="center"><b>ID</b></th>
            <th align="center"><b>Name</b></th>
            <th align="center"><b>Guard Name</b></th>
            <th align="center"><b>Total User</b></th>
            <th align="center"><b>Created At</b></th>
            <th align="center"><b>Updated At</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $role->id }}</td>
                <td align="center">{{ $role->name }}</td>
                <td align="center">{{ $role->guard_name }}</td>
                <td align="center">{{ $role->users_count }}</td>
                <td align="center">{{ $role->created_at }}</td>
                <td align="center">{{ $role->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="7">No Data Available</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7"></td>
        </tr>
    </tfoot>
</table>
