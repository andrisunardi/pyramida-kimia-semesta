@section('title', trans('index.gallery'))
@section('icon', 'fas fa-images')

<main>
    <div class="banner banner-static">
        <div class="container">
            <div class="content row">
                <div class="banner-text">
                    <h1 class="page-title">@yield('title')</h1>
                </div>
                <div class="imagebg">
                    <x-components::image :src="asset('images/banner/gallery.png')" />
                </div>

            </div>
        </div>
    </div>

    <div class="section section-photo-gallery section-pad">
        <div class="container">
            <div class="content row">
                <div class="gallery gallery-lightbox gallery-photos gallery-filled hover-zoom">

                    <ul class="photos-list col-x4">
                        <li>
                            <a href="image/gallery/gallery1-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery1.jpg" alt="Photo Title">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery2-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery2.jpg" alt="@by Author" title="Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery3-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery3.jpg" alt="@by Author" title="Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery4-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery4.jpg" alt="Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery5-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery5.jpg" alt="" title="Another Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery6-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery6.jpg" alt="Photo credit - Another Author"
                                        title="Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery7-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery7.jpg" alt="Photo/Project Name">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery8-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery8.jpg" alt="Project Name">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery9-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery9.jpg" alt="" title="Another Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery10-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery10.jpg" alt="Photo credit - Another Author"
                                        title="Name of Photo">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery11-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery11.jpg" alt="Photo/Project Name">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="image/gallery/gallery12-large.jpg">
                                <div class="photo">
                                    <img src="image/gallery/gallery12.jpg" alt="Project Name">
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- Gallery #end -->

            </div>
        </div>
    </div>
</main>
