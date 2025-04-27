<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="11">
                <b>{{ trans('index.permission') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="11"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="11">
                Printed Date : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="11"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>#</b>
            </th>
            <th valign="middle" align="center">
                <b>ID</b>
            </th>
            <th valign="middle" align="center">
                <b>Name</b>
            </th>
            <th valign="middle" align="center">
                <b>Company</b>
            </th>
            <th valign="middle" align="center">
                <b>Email</b>
            </th>
            <th valign="middle" align="center">
                <b>Phone</b>
            </th>
            <th valign="middle" align="center">
                <b>Subject</b>
            </th>
            <th valign="middle" align="center">
                <b>Message</b>
            </th>
            <th valign="middle" align="center">
                <b>Active</b>
            </th>
            <th valign="middle" align="center">
                <b>Created At</b>
            </th>
            <th valign="middle" align="center">
                <b>Updated At</b>
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
                <td align="left">
                    {{ $contact->name }}
                </td>
                <td align="left">
                    {{ $contact->company }}
                </td>
                <td align="left">
                    {{ $contact->phone }}
                </td>
                <td align="left">
                    {{ $contact->subject }}
                </td>
                <td align="left">
                    {{ $contact->message }}
                </td>
                <td valign="middle" align="center">
                    {{ Str::yesNo($contact->is_active) }}
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
