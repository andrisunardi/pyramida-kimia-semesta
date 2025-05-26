<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="11">
                <b>{{ trans('index.contact') }}</b>
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
                <b>{{ trans('index.company') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.email') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.phone') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.subject') }}</b>
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
        @forelse ($contacts as $contact)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $contact->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->company }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->email }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->phone }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->subject }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->message }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($contact->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $contact->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $contact->updated_at }}
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
