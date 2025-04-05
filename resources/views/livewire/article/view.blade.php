@section('title', $article->translate_name)
@section('icon', 'fas fa-newspaper')

<main>
    @livewire('banner', [
        'title' => $article->translate_name,
        'image' => asset('images/banner/article.png'),
    ])

    <div class="section section-blog section-pad">
        <div class="container">
            <div class="content row">
                <div class="blog-wrapper row">
                    <div class="col-md-8 res-m-bttm">
                        <div class="post post-single">
                            <div class="post-thumbs">
                                <x-components::image :src="$article->assetImage()" :alt="$article->altImage()" />
                            </div>
                            <div class="post-meta">
                                <span class="pub-date">
                                    <em class="fa fa-calendar" aria-hidden="true"></em>
                                    {{ $article->date->isoFormat('LL') }}
                                </span>
                            </div>
                            <div class="post-entry">
                                <h1>{{ $article->translate_name }}</h1>
                                <p>{!! $article->translate_description !!}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        @livewire('article.article-sidebar-right-component')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-news section-pad bg-light">
        <div class="container">
            <div class="content row">
                <h2 class="heading-section center">
                    {{ trans('index.other_articles') }}
                </h2>
                <div class="row">
                    <div class="blog-posts">
                        @foreach ($otherArticles as $key => $otherArticle)
                            <div class="post post-loop col-md-4" wire:key="{{ $key }}">
                                <div class="post-thumbs">
                                    <x-components::image :href="route('article.view', [
                                        'slug' => $otherArticle->slug,
                                    ])" :src="$otherArticle->assetImage()" :alt="$otherArticle->altImage()"
                                        :target="''" :navigate="true" />
                                </div>
                                <div class="post-entry">
                                    <div class="post-meta">
                                        <span class="pub-date">{{ $otherArticle->date->isoFormat('LL') }}</span>
                                    </div>
                                    <h2>
                                        <x-components::link :href="route('article.view', [
                                            'slug' => $otherArticle->slug,
                                        ])" :text="$otherArticle->translate_name" />
                                    </h2>
                                    <p>
                                        {{ Str::limit($otherArticle->translate_description, 100) }}
                                    </p>
                                    <x-components::link :class="'btn btn-alt'" :href="route('article.view', [
                                        'slug' => $otherArticle->slug,
                                    ])" :text="trans('index.read_more')" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
