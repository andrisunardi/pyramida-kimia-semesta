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

    <div class="section section-projects section-pad">
        <div class="container">
            <div class="content row">

                <div class="wide-md center">
                    <h1>{{ trans('index.our_gallery') }}</h1>
                    <p>
                        @if (App::isLocale('en'))
                            Explore the journey of PT. Pyramida Kimia Semesta, a leader in chemical raw materials and
                            petrochemicals. Serving solar, semiconductor, and battery industries, we deliver excellence
                            across Indonesia and global markets with 20+ years of expertise in logistics, exports, and
                            distribution.
                        @endif

                        @if (App::isLocale('id'))
                            Jelajahi perjalanan PT. Pyramida Kimia Semesta, pemimpin dalam bahan baku kimia dan
                            petrokimia. Melayani industri surya, semikonduktor, dan baterai, kami memberikan keunggulan
                            di seluruh Indonesia dan pasar global dengan lebih dari 20 tahun keahlian dalam bidang
                            logistik, ekspor, dan distribusi.
                        @endif

                        @if (App::isLocale('zh'))
                            探索 PT. Pyramida Kimia Semesta 的历程，该公司是化学原材料和石化产品的领导者。我们服务于太阳能、半导体和电池行业，凭借 20
                            多年的物流、出口和分销专业知识，在印度尼西亚和全球市场上提供卓越的服务。
                        @endif
                    </p>
                </div>

                <div class="clear"></div>
                <div class="gallery-lists gallery-project-lists filter-menu text-center">
                    <ul class="list">
                        <li class="active" data-filter="all">{{ trans('index.all') }}</li>
                        @foreach ($galleryCategories as $key => $galleryCategory)
                            <li data-filter="{{ $galleryCategory->id }}" wire:key="{{ $key }}">
                                {{ $galleryCategory->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div
                    class="gallery gallery-filter gallery-project gallery-filled project-morden with-caption hover-fade">
                    <ul class="photos-list col-x4">
                        @foreach ($galleries as $key => $gallery)
                            <li class="filtr-item" data-category="1">
                                <div class="photo">
                                    <img src="images/work-sm-a.jpg" alt="">
                                    <div class="photo-link">
                                        <span class="links">
                                            <a class="btn more-link" href="project-single.html">View Projects</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="photo-caption">
                                    <a href="project-single.html">
                                        <h4>Altria Warehouse Complex</h4>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
