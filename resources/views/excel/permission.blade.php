<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>{{ trans('index.permission') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th align="center" colspan="8">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th align="center"><b>#</b></th>
            <th align="center"><b>ID</b></th>
            <th align="center"><b>Name</b></th>
            <th align="center"><b>Guard Name</b></th>
            <th align="center"><b>Total Role</b></th>
            <th align="center"><b>Total User</b></th>
            <th align="center"><b>Created At</b></th>
            <th align="center"><b>Updated At</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($permissions as $permission)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $permission->id }}</td>
                <td align="center">{{ $permission->name }}</td>
                <td align="center">{{ $permission->guard_name }}</td>
                <td align="center">{{ $permission->roles_count }}</td>
                <td align="center">{{ $permission->users_count }}</td>
                <td align="center">{{ $permission->created_at }}</td>
                <td align="center">{{ $permission->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="8">No Data Available</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"></td>
        </tr>
    </tfoot>
</table>
