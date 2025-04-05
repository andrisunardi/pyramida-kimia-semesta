<div class="sidebar-right">
    <div class="wgs-box wgs-search">
        <div class="wgs-content">
            <form wire:submit.prevent="submit" role="form" autocomplete="off">
                <div class="form-group">
                    <input wire:model="search" type="search" class="form-control"
                        placeholder="{{ trans('index.search') }}..." maxlength="30">
                    <button type="submit" class="search-btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="wgs-box wgs-recents">
        <h3 class="wgs-heading">
            {{ trans('index.recent_articles') }}
        </h3>
        <div class="wgs-content">
            <ul class="blog-recent">
                @foreach ($recentArticles as $key => $recentArticle)
                    <li wire:key="{{ $key }}">
                        <a draggable="false"
                            href="{{ route('article.view', [
                                'slug' => $recentArticle->slug,
                            ]) }}"
                            wire:navigate>
                            <x-components::image :src="$recentArticle->assetImage()" :alt="$recentArticle->altImage()" />
                            <p>{{ Str::limit($recentArticle->translate_description, 100) }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="wgs-box wgs-tags">
        <h3 class="wgs-heading">{{ trans('index.tags') }}</h3>
        <div class="wgs-content">
            <ul class="tag-list clearfix">
                @if (App::isLocale('en'))
                    @foreach ($tags as $tag)
                        <li wire:key="{{ $key }}">
                            <a draggable="false" href="{{ route('article.index', ['search' => $tag]) }}" wire:navigate>
                                {{ $tag }}
                            </a>
                        </li>
                    @endforeach
                @endif

                @if (App::isLocale('id'))
                    @foreach ($idTags as $tag)
                        <li wire:key="{{ $key }}">
                            <a draggable="false" href="{{ route('article.index', ['search' => $tag]) }}" wire:navigate>
                                {{ $tag }}
                            </a>
                        </li>
                    @endforeach
                @endif

                @if (App::isLocale('zh'))
                    @foreach ($zhTags as $tag)
                        <li wire:key="{{ $key }}">
                            <a draggable="false" href="{{ route('article.index', ['search' => $tag]) }}" wire:navigate>
                                {{ $tag }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="wgs-box wgs-contact-info">
        <h3 class="wgs-heading">{{ trans('index.contact_information') }}</h3>
        <div class="wgs-content boxed">
            <ul class="contact-list">
                <li>
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <span>
                        <x-components::link.external-link :href="env('CONTACT_MAPS')" :text="env('CONTACT_ADDRESS')" :icon="''" />
                    </span>
                </li>
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span><x-components::link.phone :value="env('CONTACT_PHONE')" :icon="''" /></span>
                </li>
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span><x-components::link.email :value="env('CONTACT_EMAIL')" :icon="''" /></span>
                </li>
            </ul>
        </div>
    </div>

</div>
