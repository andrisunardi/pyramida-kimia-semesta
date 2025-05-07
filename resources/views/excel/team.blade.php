<table>
    <thead>
        <tr>
            <th align="center" colspan="12">
                <b>{{ trans('index.team') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="12"></td>
        </tr>
        <tr>
            <th align="center" colspan="12">
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
                <b>{{ trans('index.job') }}</b>
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
                <b>{{ trans('index.slug') }}</b>
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
        @forelse ($teams as $team)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $team->id }}
                </td>
                <td align="left">
                    {{ $team->name }}
                </td>
                <td align="left">
                    {{ $team->job }}
                </td>
                <td align="left">
                    {{ $team->name_zh }}
                </td>
                <td align="left">
                    {{ $team->description }}
                </td>
                <td align="left">
                    {{ $team->description_id }}
                </td>
                <td align="left">
                    {{ $team->description_zh }}
                </td>
                <td align="left">
                    {{ $team->image }}
                </td>
                <td align="left">
                    {{ $team->slug }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($team->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $team->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $team->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="12">
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
