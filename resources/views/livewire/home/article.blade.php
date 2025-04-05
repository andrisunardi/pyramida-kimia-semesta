<div class="section section-news section-pad">
    <div class="container">
        <div class="content row">
            <h2 class="heading-section center">
                {{ trans('index.latest_article') }}
            </h2>

            <div class="row">
                <div class="blog-posts">
                    @foreach ($articles as $key => $article)
                        <div class="post post-loop col-md-4" wire:key="{{ $key }}">
                            <div class="post-thumbs">
                                <a draggable="false" href="{{ route('article.view', ['slug' => $article->slug]) }}"
                                    wire:navigate>
                                    <x-components::image :src="$article->assetImage()" :alt="$article->altImage()" />
                                </a>
                            </div>
                            <div class="post-entry">
                                <div class="post-meta">
                                    <span class="pub-date">{{ $article->date->isoFormat('LL') }}</span>
                                </div>
                                <h2>
                                    <x-components::link :href="route('article.view', ['slug' => $article->slug])" :text="$article->translate_name" />
                                </h2>
                                <p>
                                    {{ Str::limit($article->translate_description, 100) }}
                                </p>
                                <x-components::link :class="'btn btn-alt'" :href="route('article.view', [
                                    'slug' => $article->slug,
                                ])" :text="trans('index.read_more')" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
