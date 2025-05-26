<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="8">
                <b>{{ trans('index.permission') }}</b>
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
                <b>{{ trans('index.total') }} {{ trans('index.role') }}</b>
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
        @forelse ($permissions as $permission)
            <tr>
                <td valign="middle" align="center">{{ $loop->iteration }}</td>
                <td valign="middle" align="center">{{ $permission->id }}</td>
                <td valign="middle" align="left">{{ $permission->name }}</td>
                <td valign="middle" align="center">{{ $permission->guard_name }}</td>
                <td valign="middle" align="center">{{ $permission->roles_count }}</td>
                <td valign="middle" align="center">{{ $permission->users_count }}</td>
                <td valign="middle" align="center">{{ $permission->created_at }}</td>
                <td valign="middle" align="center">{{ $permission->updated_at }}</td>
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
