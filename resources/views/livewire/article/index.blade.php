@section('title', trans('index.article'))
@section('icon', 'fas fa-newspaper')

<main>
    @livewire('banner')

    <div class="section section-blog section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <ul class="blog-posts post-col2">
                                @foreach ($articles as $key => $article)
                                    <li class="post post-loop col-md-6" wire:key="{{ $key }}">
                                        <div class="post-thumbs">
                                            <x-components::image :href="route('article.view', [
                                                'slug' => $article->slug,
                                            ])" :src="$article->assetImage()" :alt="$article->altImage()"
                                                :target="''" :navigate="true" />
                                        </div>
                                        <div class="post-entry">
                                            <div class="post-meta">
                                                <span class="pub-date">
                                                    <em class="fa fa-calendar" aria-hidden="true"></em>
                                                    {{ $article->date->isoFormat('LL') }}
                                                </span>
                                            </div>
                                            <h2>
                                                <x-components::link :href="route('article.view', [
                                                    'slug' => $article->slug,
                                                ])" :text="$article->translate_name" />
                                            </h2>
                                            <p>
                                                {{ Str::limit($article->translate_description, 100) }}
                                            </p>
                                            <x-components::link :class="'btn btn-alt'" :href="route('article.view', [
                                                'slug' => $article->slug,
                                            ])" :text="trans('index.read_more')" />
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="clear"></div>

                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        @livewire('article.article-sidebar-right-component')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
