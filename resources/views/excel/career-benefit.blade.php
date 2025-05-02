<table>
    <thead>
        <tr>
            <th align="center" colspan="12">
                <b>{{ trans('index.career_benefit') }}</b>
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
        @forelse ($careerBenefits as $careerBenefit)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $careerBenefit->id }}
                </td>
                <td align="left">
                    {{ $careerBenefit->name }}
                </td>
                <td align="left">
                    {{ $careerBenefit->name_id }}
                </td>
                <td align="left">
                    {{ $careerBenefit->name_zh }}
                </td>
                <td align="left">
                    {{ $careerBenefit->description }}
                </td>
                <td align="left">
                    {{ $careerBenefit->description_id }}
                </td>
                <td align="left">
                    {{ $careerBenefit->description_zh }}
                </td>
                <td align="left">
                    {{ $careerBenefit->image }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($careerBenefit->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $careerBenefit->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $careerBenefit->updated_at }}
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
