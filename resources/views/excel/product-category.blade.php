<table>
    <thead>
        <tr>
            <th valign="middle" align="center" colspan="13">
                <b>{{ trans('index.product_category') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="13"></td>
        </tr>
        <tr>
            <th valign="middle" align="center" colspan="13">
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
        @forelse ($productCategories as $productCategory)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $productCategory->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->name_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->name_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->description }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->description_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->description_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->image }}
                </td>
                <td valign="middle" align="left">
                    {{ $productCategory->slug }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($productCategory->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $productCategory->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $productCategory->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td valign="middle" align="center" colspan="13">
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
