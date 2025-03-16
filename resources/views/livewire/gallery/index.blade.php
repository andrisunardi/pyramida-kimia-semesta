@section('title', trans('index.gallery'))
@section('icon', 'fas fa-images')

<main>
    @livewire('banner')

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
                                {{ $galleryCategory->translate_name }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div
                    class="gallery gallery-filter gallery-project gallery-filled project-morden with-caption hover-fade">
                    <ul class="photos-list col-x4">
                        @foreach ($galleries as $key => $gallery)
                            <li class="filtr-item" data-category="{{ $gallery->gallery_category_id }}"
                                wire:key="{{ $key }}">
                                <div class="photo">
                                    <x-components::image :src="$gallery->assetImage()" :alt="$gallery->altImage()" />

                                    <div class="photo-link">
                                        <span class="links">
                                            <x-components::link.external-link :class="'btn more-link'" :href="$gallery->assetImage()"
                                                :text="trans('index.view') . ' ' . trans('index.gallery')" />
                                        </span>
                                    </div>
                                </div>

                                <div class="photo-caption">
                                    <a draggable="false" href="{{ $gallery->assetImage() }}" wire:navigate>
                                        <h4>{{ $gallery->translate_name }}</h4>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-photo-gallery section-pad bg-light">
        <div class="container">
            <div class="content row">
                <div class="gallery gallery-lightbox gallery-photos gallery-filled hover-zoom">
                    <ul class="photos-list col-x4">
                        @foreach ($galleries as $key => $gallery)
                            <li wire:key="{{ $key }}">
                                <a draggable="false" href="{{ $gallery->assetImage() }}">
                                    <div class="photo">
                                        <x-components::image :src="$gallery->assetImage()" :alt="$gallery->altImage()" />
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
