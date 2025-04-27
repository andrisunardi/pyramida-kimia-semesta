<table>
    <thead>
        <tr>
            <th align="center" colspan="15"><b>User</b></th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th align="center" colspan="15">{{ $permission->name }}</th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th align="center" colspan="15">Printed Date : {{ now()->isoFormat('LLLL') }}</th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th align="center"><b>#</b></th>
            <th align="center"><b>ID</b></th>
            <th align="center"><b>NIK</b></th>
            <th align="center"><b>Code</b></th>
            <th align="center"><b>Name</b></th>
            <th align="center"><b>Email</b></th>
            <th align="center"><b>Phone</b></th>
            <th align="center"><b>Religion</b></th>
            <th align="center"><b>Join Date</b></th>
            <th align="center"><b>Resign Date</b></th>
            <th align="center"><b>Username</b></th>
            <th align="center"><b>Image</b></th>
            <th align="center"><b>Notes</b></th>
            <th align="center"><b>Active</b></th>
            <th align="center"><b>Total Permission</b></th>
            <th align="center"><b>Created At</b></th>
            <th align="center"><b>Updated At</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $user->id }}</td>
                <td align="center">{{ $user->nik }}</td>
                <td align="center">{{ $user->code }}</td>
                <td align="center">{{ $user->name }}</td>
                <td align="center">{{ $user->email }}</td>
                <td align="center">{{ $user->phone }}</td>
                <td align="center">{{ $user->religion->name }}</td>
                <td align="center">{{ $user->join_date->toDateString() }}</td>
                <td align="center">{{ $user->resign_date?->toDateString() }}</td>
                <td align="center">{{ $user->username }}</td>
                <td align="center">{{ Str::yesNo($user->is_active) }}</td>
                <td align="center">{{ $user->permissions_count }}</td>
                <td align="center">{{ $user->created_at }}</td>
                <td align="center">{{ $user->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="15">No Data Available</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="15"></td>
        </tr>
    </tfoot>
</table>
