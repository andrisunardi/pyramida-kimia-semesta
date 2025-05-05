<table>
    <thead>
        <tr>
            <th align="center" colspan="13">
                <b>{{ trans('index.gallery') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="13"></td>
        </tr>
        <tr>
            <th align="center" colspan="13">
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
                <b>{{ trans('index.gallery_category') }}</b>
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
        @forelse ($galleries as $gallery)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $gallery->id }}
                </td>
                <td align="left">
                    {{ $gallery->category?->name }}
                </td>
                <td align="left">
                    {{ $gallery->name }}
                </td>
                <td align="left">
                    {{ $gallery->name_id }}
                </td>
                <td align="left">
                    {{ $gallery->name_zh }}
                </td>
                <td align="left">
                    {{ $gallery->description }}
                </td>
                <td align="left">
                    {{ $gallery->description_id }}
                </td>
                <td align="left">
                    {{ $gallery->description_zh }}
                </td>
                <td align="left">
                    {{ $gallery->image }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($gallery->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $gallery->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $gallery->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="13">
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
