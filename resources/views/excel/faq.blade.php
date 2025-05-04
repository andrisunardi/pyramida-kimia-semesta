<table>
    <thead>
        <tr>
            <th align="center" colspan="11">
                <b>{{ trans('index.faq') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="11"></td>
        </tr>
        <tr>
            <th align="center" colspan="11">
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
                <b>{{ trans('index.question') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.question_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.question_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.answer') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.answer_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.answer_zh') }}</b>
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
        @forelse ($faqs as $faq)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $faq->id }}
                </td>
                <td align="left">
                    {{ $faq->question }}
                </td>
                <td align="left">
                    {{ $faq->question_id }}
                </td>
                <td align="left">
                    {{ $faq->question_zh }}
                </td>
                <td align="left">
                    {{ $faq->answer }}
                </td>
                <td align="left">
                    {{ $faq->answer_id }}
                </td>
                <td align="left">
                    {{ $faq->answer_zh }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($faq->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $faq->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $faq->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="11">
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
