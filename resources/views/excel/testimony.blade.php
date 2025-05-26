<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="8">
                <b>{{ trans('index.testmony') }}</b>
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
                <b>{{ trans('index.company') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.message') }}</b>
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
        @forelse ($testimonies as $testmony)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $testmony->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $testmony->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $testmony->company }}
                </td>
                <td valign="middle" align="left">
                    {{ $testmony->message }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($testmony->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $testmony->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $testmony->updated_at }}
                </td>
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
