<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="11">
                <b>{{ trans('index.history') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="11"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="11">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="11"></td>
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
                <b>{{ trans('index.name_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.name_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.description') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.description_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.description_zh') }}</b>
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
        @forelse ($histories as $history)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $history->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $history->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $history->name_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $history->name_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $history->description }}
                </td>
                <td valign="middle" align="left">
                    {{ $history->description_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $history->description_zh }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($history->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $history->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $history->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="11">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="11"></td>
        </tr>
    </tfoot>
</table>
