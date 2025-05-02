<table>
    <thead>
        <tr>
            <th align="center" colspan="17">
                <b>{{ trans('index.article') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="17"></td>
        </tr>
        <tr>
            <th align="center" colspan="17">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="17"></td>
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
                <b>{{ trans('index.tags') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.tags_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.tags_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.date') }}</b>
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
        @forelse ($articles as $article)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $article->id }}
                </td>
                <td align="left">
                    {{ $article->name }}
                </td>
                <td align="left">
                    {{ $article->name_id }}
                </td>
                <td align="left">
                    {{ $article->name_zh }}
                </td>
                <td align="left">
                    {{ $article->description }}
                </td>
                <td align="left">
                    {{ $article->description_id }}
                </td>
                <td align="left">
                    {{ $article->description_zh }}
                </td>
                <td align="left">
                    {{ collect($article->tags)->join(', ') }}
                </td>
                <td align="left">
                    {{ collect($article->tags_id)->join(', ') }}
                </td>
                <td align="left">
                    {{ collect($article->tags_zh)->join(', ') }}
                </td>
                <td align="left">
                    {{ $article->date }}
                </td>
                <td align="left">
                    {{ $article->image }}
                </td>
                <td align="left">
                    {{ $article->slug }}
                </td>
                <td valign="middle" align="center">
                    {{ Utils::translate(Utils::yesNo($article->is_active)) }}
                </td>
                <td valign="middle" align="center">
                    {{ $article->created_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $article->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="17">
                    {{ trans('index.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="17"></td>
        </tr>
    </tfoot>
</table>
