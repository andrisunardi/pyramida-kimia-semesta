<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="8">
                <b>{{ trans('index.role') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="8">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('index.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.guard_name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('index.permission') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('index.user') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.created_at') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.updated_at') }}</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
            <tr>
                <td valign="middle" align="center">{{ $loop->iteration }}</td>
                <td valign="middle" align="center">{{ $role->id }}</td>
                <td valign="middle" align="left">{{ $role->name }}</td>
                <td valign="middle" align="center">{{ $role->guard_name }}</td>
                <td valign="middle" align="center">{{ $role->permissions_count }}</td>
                <td valign="middle" align="center">{{ $role->users_count }}</td>
                <td valign="middle" align="center">{{ $role->created_at }}</td>
                <td valign="middle" align="center">{{ $role->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="8">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"></td>
        </tr>
    </tfoot>
</table>
