<div class="section section-news section-pad">
    <div class="container">
        <div class="content row">
            <h2 class="heading-section center">
                {{ trans('index.latest_article') }}
            </h2>

            <div class="row">
                <div class="blog-posts">
                    @foreach ($articles as $key => $article)
                        <div class="post post-loop col-md-4">
                            <div class="post-thumbs">
                                <a href="news-details.html">
                                    <x-components::image :src="$article->assetImage()" :alt="$article->altImage()" />
                                </a>
                            </div>
                            <div class="post-entry">
                                <div class="post-meta"><span class="pub-date">15, Jun 2017</span></div>
                                <h2>
                                    <x-components::link :href="route('article.view', ['slug' => $article->slug])" :text="$article->translate_name" />
                                    <a href="news-details.html">Power Technology solar programme welcomes</a>
                                </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor
                                    incididunt
                                    laboris nisi ut aliquip ex ea commodo consequat...</p>
                                <a class="btn btn-alt" href="#">
                                    Read More
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
