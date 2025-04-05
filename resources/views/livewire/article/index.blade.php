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
                                            <a draggable="false"
                                                href="{{ route('article.view', ['slug' => $article->slug]) }}"
                                                wire:navigate>
                                                <x-components::image :src="$article->assetImage()" :alt="$article->altImage()" />
                                            </a>
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
                        <div class="sidebar-right">
                            <div class="wgs-box wgs-search">
                                <div class="wgs-content">
                                    <form wire:submit.prevent="submit" role="form" autocomplete="off">
                                        <div class="form-group">
                                            <input type="search" class="form-control" placeholder="Search..."
                                                wire:model="search">
                                            <button type="submit" class="search-btn" wire:click="getArticles">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="wgs-box wgs-recents">
                                <h3 class="wgs-heading">Recent Posts</h3>
                                <div class="wgs-content">
                                    <ul class="blog-recent">
                                        <li>
                                            <a href="news-details.html">
                                                <img alt="" src="image/post-thumb-a.jpg">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit volup accus
                                                    antium doloremque laudantiu...</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="news-details.html">
                                                <img alt="" src="image/post-thumb-b.jpg">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit volup accus
                                                    antium doloremque laudantiu...</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="news-details.html">
                                                <img alt="" src="image/post-thumb-c.jpg">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit volup accus
                                                    antium doloremque laudantiu...</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="news-details.html">
                                                <img alt="" src="image/post-thumb-d.jpg">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit volup accus
                                                    antium doloremque laudantiu...</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="wgs-box wgs-tags">
                                <h3 class="wgs-heading">Tags</h3>
                                <div class="wgs-content">
                                    <ul class="tag-list clearfix">
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Cargo</a></li>
                                        <li><a href="#">Delivery</a></li>
                                        <li><a href="#">Safe</a></li>
                                        <li><a href="#">Fast</a></li>
                                        <li><a href="#">sea</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="wgs-box wgs-contact-info">
                                <h3 class="wgs-heading">Contact Information</h3>
                                <div class="wgs-content boxed">
                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa fa-map" aria-hidden="true"></i>
                                            <span>1234 Sed ut perspiciatis Road, <br>At vero eos, D58 8975,
                                                London.</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>(123) 4567 8910</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span>Email : <a href="#">info@sitename.com</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Sidebar #end -->

                </div>

            </div>
        </div>
    </div>
</main>
