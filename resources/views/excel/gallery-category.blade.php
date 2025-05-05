<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>{{ trans('index.gallery_category') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th align="center" colspan="8">
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
                <b>{{ trans('index.name_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.name_zh') }}</b>
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
        @forelse ($galleryCategories as $galleryCategory)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $galleryCategory->id }}
                </td>
                <td align="left">
                    {{ $galleryCategory->name }}
                </td>
                <td align="left">
                    {{ $galleryCategory->name_id }}
                </td>
                <td align="left">
                    {{ $galleryCategory->name_zh }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($galleryCategory->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $galleryCategory->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $galleryCategory->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="8">
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
