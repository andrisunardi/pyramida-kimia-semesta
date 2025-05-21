<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>{{ trans('index.role') }}</b>
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
            <th align="center">
                <b>{{ trans('index.#') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.id') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.name') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.guard_name') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.total') }} {{ trans('index.permission') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.total') }} {{ trans('index.user') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.created_at') }}</b>
            </th>
            <th align="center">
                <b>{{ trans('index.updated_at') }}</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $role->id }}</td>
                <td align="left">{{ $role->name }}</td>
                <td align="center">{{ $role->guard_name }}</td>
                <td align="center">{{ $role->permissions_count }}</td>
                <td align="center">{{ $role->users_count }}</td>
                <td align="center">{{ $role->created_at }}</td>
                <td align="center">{{ $role->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="8">
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
