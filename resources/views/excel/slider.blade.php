<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="12">
                <b>{{ trans('index.slider') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="12"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="12">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="12"></td>
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
        @forelse ($sliders as $slider)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $slider->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->name_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->name_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->description }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->description_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->description_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $slider->image }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($slider->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $slider->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $slider->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="12">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="12"></td>
        </tr>
    </tfoot>
</table>
