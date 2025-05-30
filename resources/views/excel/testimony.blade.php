<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="10">
                <b>{{ trans('index.testimony') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="10">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="10"></td>
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
                <b>{{ trans('index.company') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.message') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.message_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.message_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.active') }}</b>
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
        @forelse ($testimonies as $testimony)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $testimony->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $testimony->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $testimony->company }}
                </td>
                <td valign="middle" align="left">
                    {{ $testimony->message }}
                </td>
                <td valign="middle" align="left">
                    {{ $testimony->message_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $testimony->message_zh }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($testimony->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $testimony->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $testimony->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="10">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10"></td>
        </tr>
    </tfoot>
</table>
