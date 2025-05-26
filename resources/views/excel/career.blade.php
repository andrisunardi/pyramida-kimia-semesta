<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="15">
                <b>{{ trans('index.career') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="15">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="15"></td>
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
                <b>{{ trans('index.location') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.location_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.location_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.link') }}</b>
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
        @forelse ($careers as $career)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $career->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->name_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->name_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->description }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->description_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->description_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->location }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->location_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->location_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $career->link }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($career->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $career->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $career->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="15">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="15"></td>
        </tr>
    </tfoot>
</table>
