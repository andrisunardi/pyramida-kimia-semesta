<table>
    <thead>
        <tr>
            <th align="center" colspan="15">
                <b>{{ trans('index.product') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th align="center" colspan="15">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('index.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.product_category') }}</b>
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
                <b>{{ trans('index.image_coa') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.image_msds') }}</b>
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
        @forelse ($products as $product)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $product->id }}
                </td>
                <td align="left">
                    {{ $product->category?->name }}
                </td>
                <td align="left">
                    {{ $product->name }}
                </td>
                <td align="left">
                    {{ $product->name_id }}
                </td>
                <td align="left">
                    {{ $product->name_zh }}
                </td>
                <td align="left">
                    {{ $product->description }}
                </td>
                <td align="left">
                    {{ $product->description_id }}
                </td>
                <td align="left">
                    {{ $product->description_zh }}
                </td>
                <td align="left">
                    {{ $product->image }}
                </td>
                <td align="left">
                    {{ $product->image_coa }}
                </td>
                <td align="left">
                    {{ $product->image_msds }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($product->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $product->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $product->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="15">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="15"></td>
        </tr>
    </tfoot>
</table>
