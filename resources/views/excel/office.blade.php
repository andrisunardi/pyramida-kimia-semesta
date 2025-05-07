<table>
    <thead>
        <tr>
            <th align="center" colspan="10">
                <b>{{ trans('index.career_benefit') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <th align="center" colspan="10">
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
                <b>{{ trans('index.address') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.maps') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.phone') }}</b>
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
        @forelse ($offices as $office)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $office->id }}
                </td>
                <td align="left">
                    {{ $office->name }}
                </td>
                <td align="left">
                    {{ $office->address }}
                </td>
                <td align="left">
                    {{ $office->maps }}
                </td>
                <td align="left">
                    {{ $office->phone }}
                </td>
                <td align="left">
                    {{ $office->image }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($office->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $office->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $office->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="10">
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
