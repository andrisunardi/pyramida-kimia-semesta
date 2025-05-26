<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="13">
                <b>{{ trans('index.partner') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="13"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="13">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="13"></td>
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
                <b>{{ trans('index.link') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.image') }}</b>
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
        @forelse ($partners as $partner)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $partner->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->name_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->name_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->description }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->description_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->description_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->link }}
                </td>
                <td valign="middle" align="left">
                    {{ $partner->image }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($partner->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $partner->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $partner->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="13">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="13"></td>
        </tr>
    </tfoot>
</table>
