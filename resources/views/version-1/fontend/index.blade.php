@extends('version-1.fontend.master')

@section('slider')

    <div class="block block-slideshow custom-slider-all">
        <div class="container-fluid">
            <div class="block-slideshow__carousel">
                <div class="owl-carousel">
                    @foreach($sliders as $slider)
                    <a class="block-slideshow__item" href="{{ url('/supper/deals') }}" style="height: 600px;">
                        <span class="block-slideshow__item-image block-slideshow__item-image--desktop" style="background-image: url('{{ $slider->image }}')"></span>
                        <span class="block-slideshow__item-image block-slideshow__item-image--mobile" style="background-image: url('{{ $slider->image }}')"></span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="block-features block block-features--layout--top-strip">
        <div class="container">
            <ul class="block-features__list">

                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <img src="{{ asset('/fontend/') }}/images/shipped.png" class="img-fluid">
                    </div>

                    <div class="block-features__item-info">
                        <div class="block-features__item-title">Free Shipping</div>
                        <div class="block-features__item-subtitle">For orders from $50</div>
                    </div>
                </li>

                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <img src="{{ asset('/fontend/') }}/images/hours.png" class="img-fluid">
                    </div>

                    <div class="block-features__item-info">
                        <div class="block-features__item-title">Support 24/7</div>
                        <div class="block-features__item-subtitle">Call us anytime</div>
                    </div>
                </li>

                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <img src="{{ asset('/fontend/') }}/images/security.png" class="img-fluid">
                    </div>

                    <div class="block-features__item-info">
                        <div class="block-features__item-title">100% Safety</div>
                        <div class="block-features__item-subtitle">Only secure payments</div>
                    </div>
                </li>

                <li class="block-features__item">
                    <div class="block-features__item-icon">
                        <img src="{{ asset('/fontend/') }}/images/price-tag.png" class="img-fluid">
                    </div>

                    <div class="block-features__item-info">
                        <div class="block-features__item-title">Hot Offers</div>
                        <div class="block-features__item-subtitle">Discounts up to 90%</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="site__body">
    <div class="custom-section-top-space">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <a href="{{ url('/supper/deals') }}"><img src="{{ $b2->image }}" class="img-fluid"></a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/supper/deals') }}"><img src="{{ $b3->image }}" class="img-fluid"></a>
                </div>
            </div>

        </div>
    </div>



    <div class="block-space block-space--layout--divider-nl"></div>
    <div class="block block-sale">
        <div class="block-sale__content">
            <div class="block-sale__header">
                <div class="block-sale__title">Attention!  Best Deal Zone!</div>
                <div class="block-sale__subtitle">Hurry up! Discounts up to 70%</div>
                <div class="block-sale__timer">
                    <div class="timer">
                        <div class="timer__part">
                            <div class="timer__part-value timer__part-value--days">02</div><div class="timer__part-label">Days</div>
                        </div>
                        <div class="timer__dots"></div>
                        <div class="timer__part"><div class="timer__part-value timer__part-value--hours">23</div><div class="timer__part-label">Hrs</div></div>
                        <div class="timer__dots"></div>
                        <div class="timer__part"><div class="timer__part-value timer__part-value--minutes">07</div><div class="timer__part-label">Mins</div></div>
                        <div class="timer__dots"></div>
                        <div class="timer__part"><div class="timer__part-value timer__part-value--seconds">54</div><div class="timer__part-label">Secs
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-sale__controls">
                    <div class="arrow block-sale__arrow block-sale__arrow--prev arrow--prev"><button class="arrow__button" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg></button>
                    </div>

                    <div class="block-sale__link"><a href="#"></a></div>
                    <div class="arrow block-sale__arrow block-sale__arrow--next arrow--next"><button class="arrow__button" type="button"><svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg></button>
                    </div>

                    <div class="decor block-sale__header-decor decor--type--center"><div class="decor__body"><div class="decor__start"></div><div class="decor__end"></div><div class="decor__center"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="block-sale__body">
                <div class="decor block-sale__body-decor decor--type--bottom">
                    <div class="decor__body">
                        <div class="decor__start"></div>
                        <div class="decor__end"></div>
                        <div class="decor__center"></div>
                    </div>
                </div>

                <div class="block-sale__image" style="background-image: url('{{ $b4->image }}');"></div>

                <div class="container">
                    <div class="block-sale__carousel">
                        <div class="owl-carousel">
                            @foreach($webAttentionProducts as $webAttentionProduct)
                            <div class="block-sale__item">
                                <div class="product-card">
                                    <div class="product-card__actions-list">

                                        <!-- Modal -->
                                        <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webAttentionProduct->id !!}" id="view">
                                            <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </a>

                                        <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webAttentionProduct->id }}" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <a href="{{ url('/upcoming/product/details/'.$webAttentionProduct->id) }}">
                                            <img src="{{ asset('/product/'.$webAttentionProduct->image) }}" alt="">
                                        </a>
                                    </div>

                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> {{ $webAttentionProduct->sku }}</div>

                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    @if($webAttentionProduct->sale)
                                                        <div class="tag-badge tag-badge--sale">{{ $webAttentionProduct->sale }}</div>
                                                    @endif
                                                    @if($webAttentionProduct->new)
                                                        <div class="tag-badge tag-badge--new">{{ $webAttentionProduct->new }}</div>
                                                    @endif
                                                    @if($webAttentionProduct->hot)
                                                        <div class="tag-badge tag-badge--hot">{{ $webAttentionProduct->hot }}</div>
                                                    @endif
                                                </div>
                                                <a href="{{ url('/upcoming/product/details/'.$webAttentionProduct->id) }}" style="text-transform: capitalize">{{ $webAttentionProduct->name }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">${{ number_format($webAttentionProduct->sale_price,2) }}</div>
                                            <div class="product-card__price product-card__price--old">${{ number_format($webAttentionProduct->pre_price,2) }}</div>
                                        </div>
                                        <button class="product-card__addtocart-icon addCart" data-id="{{ $webAttentionProduct->id }}" type="button" aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="category-card__actions custom-button-align"><a href="{{ url('/attention/products') }}" class="btn btn-primary btn-sm">View All Products</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-space block-space--layout--divider-nl"></div>
    <div class="block block-products-carousel" data-layout="grid-5">
        <div class="container">
            <div class="section-header">
                <div class="section-header__body">
                    <h2 class="section-header__title">Upcoming Products</h2>
                    <div class="section-header__spring"></div>

                    <div class="section-header__arrows">
                        <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="section-header__divider"></div>
                </div>
            </div>
            <div class="block-products-carousel__carousel">
                <div class="block-products-carousel__carousel-loader"></div>
                <div class="owl-carousel">
                    @foreach($webUpcomingProducts as $webUpcomingProduct)
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card product-card--layout--grid">
                                <div class="product-card__actions-list">
                                    <!-- Modal -->
                                    <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webUpcomingProduct->id !!}" id="view">
                                        <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                        </svg>
                                    </a>
                                    <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webUpcomingProduct->id }}" type="button" aria-label="Add to wish list" data-toggle="modal" data-target="#quick-view" title="Quick View" tabindex="0">
                                        <svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="product-card__image">
                                    <a href="{{ url('/upcoming/product/details/'.$webUpcomingProduct->id) }}">
                                        <img src="{{ asset('/product/'.$webUpcomingProduct->image) }}" alt="">
                                    </a>
                                    <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">

                                    </div>
                                </div>

                                <div class="product-card__info">
                                    <div class="product-card__meta">
                                        <span class="product-card__meta-title">SKU:</span> {{ $webUpcomingProduct->sku }}
                                    </div>
                                    <div class="product-card__name">
                                        <div>
                                            <div class="product-card__badges">
                                                @if($webUpcomingProduct->sale)
                                                <div class="tag-badge tag-badge--sale">{{ $webUpcomingProduct->sale }}</div>
                                                @endif
                                                @if($webUpcomingProduct->new)
                                                <div class="tag-badge tag-badge--new">{{ $webUpcomingProduct->new }}</div>
                                                @endif
                                                @if($webUpcomingProduct->hot)
                                                <div class="tag-badge tag-badge--hot">{{ $webUpcomingProduct->hot }}</div>
                                                @endif
                                            </div>
                                            <a href="{{ url('/upcoming/product/details/'.$webUpcomingProduct->id) }}" style="text-transform: capitalize">{{ $webUpcomingProduct->name }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card__footer">
                                    <div class="product-card__prices">
                                        <div class="product-card__price product-card__price--current">${{ number_format($webUpcomingProduct->sale_price,2) }}</div>
                                        <div class="product-card__price product-card__price--old">${{ number_format($webUpcomingProduct->pre_price,2) }}</div>
                                    </div>
                                    <button class="product-card__addtocart-icon addCart" data-id="{{ $webUpcomingProduct->id }}" type="button" aria-label="Add to cart">
                                        <svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="category-card__actions custom-button-align"><a href="{{ url('/upcoming/products') }}" class="btn btn-primary btn-sm">View All Products</a></div>
    </div>

    <div class="custom-section-top-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#"><img src="{{ $b4->image }}" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="block-space block-space--layout--divider-lg"></div>
    <div class="block block-zone">
        <div class="container">
            <div class="block-zone__body">
                <div class="block-zone__card category-card category-card--layout--overlay ">
                    <div class="category-card__body">
                        <div class="category-card__overlay-image">
                            <img srcset="{{ $b5->image }}, {{ $b5->image }}" src="{{ $b5->image }}" sizes="(max-width: 575px) 530px, 305px" alt="">
                        </div>
{{--                         <div class=""><img srcset="{{ $b5->image }}" src="{{ $b5->image }}" sizes="(max-width: 575px) 530px, 305px" alt="">
                        </div> --}}

{{--                         <div class="category-card__content">
                            <div class="category-card__info">
                                <div class="category-card__name">
                                    <a href="#">Spacial Discount For First Three Orders</a>
                                </div>
                                <ul class="category-card__children"><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li></ul>

                                <div class="category-card__actions"><a href="https://wa.me/+971569763008" class="btn btn-primary btn-sm">Call Now</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="block-zone__widget">
                    <div class="block-zone__widget-header">
                        <div class="block-zone__tabs">
                            <button class="block-zone__tabs-button block-zone__tabs-button--active" type="button">Featured</button>
                        </div>

                        <div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>


                        <div class="arrow block-zone__arrow block-zone__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="block-zone__widget-body">
                        <div class="block-zone__carousel">
                            <div class="block-zone__carousel-loader"></div>
                            <div class="owl-carousel">
                                @foreach($webFeatureProducts as $webFeatureProduct)
                                <div class="block-zone__carousel-item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <!-- Modal -->
                                            <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webFeatureProduct->id !!}" id="view">
                                                <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </a>

                                            <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webFeatureProduct->id }}" type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="product-card__image">
                                            <a href="{{ url('/upcoming/product/details/'.$webFeatureProduct->id) }}">
                                                <img src="{{ asset('/product/'.$webFeatureProduct->image) }}" alt="">
                                            </a>
                                        </div>

                                        <div class="product-card__info">
                                            <div class="product-card__meta">
                                                <span class="product-card__meta-title">SKU:</span> {{ $webFeatureProduct->sku }}
                                            </div>

                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        @if($webFeatureProduct->sale)
                                                            <div class="tag-badge tag-badge--sale">{{ $webFeatureProduct->sale }}</div>
                                                        @endif
                                                        @if($webFeatureProduct->new)
                                                            <div class="tag-badge tag-badge--new">{{ $webFeatureProduct->new }}</div>
                                                        @endif
                                                        @if($webFeatureProduct->hot)
                                                            <div class="tag-badge tag-badge--hot">{{ $webFeatureProduct->hot }}</div>
                                                        @endif
                                                    </div>
                                                    <a href="{{ url('/upcoming/product/details/'.$webFeatureProduct->id) }}" style="text-transform: capitalize">{{ $webFeatureProduct->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                @php
                                                    // dd(isset($currency))
                                                @endphp
                                                @if(isset($currency))
                                                    <div class="product-card__price product-card__price--current"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webFeatureProduct->sale_price * $currency->price, 2) }}</div>
                                                    <div class="product-card__price product-card__price--old"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webFeatureProduct->pre_price * $currency->price, 2) }}</div>
                                                @else
                                                    <div class="product-card__price product-card__price--current">${{ number_format($webFeatureProduct->sale_price,2) }}</div>
                                                    <div class="product-card__price product-card__price--old">${{ number_format($webFeatureProduct->pre_price,2) }}</div>
                                                @endif

                                            </div>
                                            <button class="product-card__addtocart-icon addCart" data-id="{{ $webFeatureProduct->id }}" type="button" aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="category-card__actions custom-button-align"><a href="{{ url('/feature/products') }}" class="btn btn-primary btn-sm">View All Products</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-space block-space--layout--divider-lg"></div>
    <div class="block block-zone">
        <div class="container">
            <div class="block-zone__body">
                <div class="block-zone__card category-card category-card--layout--overlay">
                    <div class="category-card__body">
                        <div class="category-card__overlay-image">
                            <img srcset="{{ $b6->image }}, {{ $b6->image }}" src="{{ $b6->image }}" sizes="(max-width: 575px) 530px, 305px" alt="">
                        </div>
{{--                         <div class="category-card__overlay-image category-card__overlay-image--blur"><img srcset="{{ asset('/fontend/') }}/images/categories/best-sellers.png 530w, images/categories/best-sellers.png 305w" src="{{ asset('/fontend/') }}/images/categories/best-sellers.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                        </div>

                        <div class="category-card__content">
                            <div class="category-card__info">
                                <div class="category-card__name">
                                    <a href="#">Spacial Discount For First Three Orders</a>
                                </div>
                                <ul class="category-card__children"><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li></ul>

                                <div class="category-card__actions"><a href="https://wa.me/+971569763008" class="btn btn-primary btn-sm">Call Now</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="block-zone__widget">
                    <div class="block-zone__widget-header">
                        <div class="block-zone__tabs">
                            <button class="block-zone__tabs-button block-zone__tabs-button--active" type="button">Best Sellers</button>
                        </div>

                        <div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="arrow block-zone__arrow block-zone__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="block-zone__widget-body">
                        <div class="block-zone__carousel">
                            <div class="block-zone__carousel-loader"></div>
                            <div class="owl-carousel">
                                @foreach($webBestSellerProducts as $webBestSellerProduct)
                                <div class="block-zone__carousel-item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">

                                            <!-- Modal -->
                                            <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webBestSellerProduct->id !!}" id="view">
                                                <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </a>

                                            <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webBestSellerProduct->id }}" type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="product-card__image">
                                            <a href="{{ url('/upcoming/product/details/'.$webBestSellerProduct->id) }}">
                                                <img src="{{ asset('/product/'.$webBestSellerProduct->image) }}" alt="">
                                            </a>
                                        </div>

                                        <div class="product-card__info">
                                            <div class="product-card__meta">
                                                <span class="product-card__meta-title">SKU:</span> {{ $webBestSellerProduct->sku }}
                                            </div>

                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        @if($webBestSellerProduct->sale)
                                                            <div class="tag-badge tag-badge--sale">{{ $webBestSellerProduct->sale }}</div>
                                                        @endif
                                                        @if($webBestSellerProduct->new)
                                                            <div class="tag-badge tag-badge--new">{{ $webBestSellerProduct->new }}</div>
                                                        @endif
                                                        @if($webBestSellerProduct->hot)
                                                            <div class="tag-badge tag-badge--hot">{{ $webBestSellerProduct->hot }}</div>
                                                        @endif
                                                    </div>
                                                    <a href="{{ url('/upcoming/product/details/'.$webBestSellerProduct->id) }}" style="text-transform: capitalize">{{ $webBestSellerProduct->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-card__footer">

                                            @if(isset($currency))
                                                <div class="product-card__price product-card__price--current"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webBestSellerProduct->sale_price * $currency->price, 2) }}</div>
                                                <div class="product-card__price product-card__price--old"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webBestSellerProduct->pre_price * $currency->price, 2) }}</div>
                                            @else
                                                <div class="product-card__price product-card__price--current">${{ number_format($webBestSellerProduct->sale_price,2) }}</div>
                                                <div class="product-card__price product-card__price--old">${{ number_format($webBestSellerProduct->pre_price,2) }}</div>
                                            @endif

                                            <button class="product-card__addtocart-icon addCart" data-id="{{ $webBestSellerProduct->id }}" type="button" aria-label="Add to cart">
                                                <svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="category-card__actions custom-button-align"><a href="{{ url('/best/seller') }}" class="btn btn-primary btn-sm">View All Products</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="block-space block-space--layout--divider-lg"></div>
    <div class="block block-zone">
        <div class="container">
            <div class="block-zone__body">
                <div class="block-zone__card category-card category-card--layout--overlay">
                    <div class="category-card__body">
                        <div class="category-card__overlay-image">
                            <img srcset="{{ $b7->image }}, {{ $b7->image }}" src="{{ $b7->image }}" sizes="(max-width: 575px) 530px, 305px" alt="">
                        </div>
{{--                         <div class="category-card__overlay-image category-card__overlay-image--blur"><img srcset="{{ $b7->image }}, {{ $b7->image }}" src="{{ $b7->image }}" sizes="(max-width: 575px) 530px, 305px" alt="">
                        </div>

                        <div class="category-card__content">
                            <div class="category-card__info">
                                <div class="category-card__name">
                                    <a href="#">Spacial Discount For First Three Orders</a>
                                </div>
                                <ul class="category-card__children"><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li></ul>

                                <div class="category-card__actions"><a href="https://wa.me/+971569763008" class="btn btn-primary btn-sm">Call Now</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="block-zone__widget">
                    <div class="block-zone__widget-header">
                        <div class="block-zone__tabs">
                            <button class="block-zone__tabs-button block-zone__tabs-button--active" type="button">Top Rated</button>
                        </div>

                        <div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="arrow block-zone__arrow block-zone__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="block-zone__widget-body">
                        <div class="block-zone__carousel">
                            <div class="block-zone__carousel-loader"></div>
                            <div class="owl-carousel">
                                @foreach($webTopRatedProducts as $webTopRatedProduct)
                                <div class="block-zone__carousel-item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">

                                            <!-- Modal -->
                                            <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webTopRatedProduct->id !!}" id="view">
                                                <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </a>

                                            <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webTopRatedProduct->id }}" type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="product-card__image">
                                            <a href="{{ url('/upcoming/product/details/'.$webTopRatedProduct->id) }}">
                                                <img src="{{ asset('/product/'.$webTopRatedProduct->image) }}" alt="">
                                            </a>
                                        </div>

                                        <div class="product-card__info">
                                            <div class="product-card__meta">
                                                <span class="product-card__meta-title">SKU:</span> {{ $webTopRatedProduct->sku }}
                                            </div>

                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        @if($webTopRatedProduct->sale)
                                                            <div class="tag-badge tag-badge--sale">{{ $webTopRatedProduct->sale }}</div>
                                                        @endif
                                                        @if($webTopRatedProduct->new)
                                                            <div class="tag-badge tag-badge--new">{{ $webTopRatedProduct->new }}</div>
                                                        @endif
                                                        @if($webTopRatedProduct->hot)
                                                            <div class="tag-badge tag-badge--hot">{{ $webTopRatedProduct->hot }}</div>
                                                        @endif
                                                    </div>
                                                    <a href="{{ url('/upcoming/product/details/'.$webTopRatedProduct->id) }}" style="text-transform: capitalize">{{ $webTopRatedProduct->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-card__footer">
                                            <div class="product-card__prices">

                                                @if(isset($currency))
                                                    <div class="product-card__price product-card__price--current"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webTopRatedProduct->sale_price * $currency->price, 2) }}</div>
                                                    <div class="product-card__price product-card__price--old"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webTopRatedProduct->pre_price * $currency->price, 2) }}</div>
                                                @else
                                                    <div class="product-card__price product-card__price--current">${{ number_format($webTopRatedProduct->sale_price,2) }}</div>
                                                    <div class="product-card__price product-card__price--old">${{ number_format($webTopRatedProduct->pre_price,2) }}</div>
                                                @endif

                                            </div>

                                            <button class="product-card__addtocart-icon addCart" data-id="{{ $webTopRatedProduct->id }}" type="button" aria-label="Add to cart">
                                                <svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="category-card__actions custom-button-align"><a href="{{ url('/top/rated') }}" class="btn btn-primary btn-sm">View All Products</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="custom-section-top-space custom-slide-height">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#"><img src="{{ $b9->image }}" class="img-fluid"></a>
                </div>
                <div class="col-md-9">
                    <div class="block block-slideshow custom-slider-all">
                        <div class="container-fluid">
                            <div class="block-slideshow__carousel">
                                <div class="owl-carousel">
                                    @if (isset($all_b8[0]))
                                    <a class="block-slideshow__item" href="#">
                                        <span class="block-slideshow__item-image block-slideshow__item-image--desktop" style="background-image: url('{{ $all_b8[0]->image }}')"></span>
                                        <span class="block-slideshow__item-image block-slideshow__item-image--mobile" style="background-image: url('{{ $all_b8[0]->image }}')">
										</span>
                                    </a>
                                    @endif

                                    @if (isset($all_b8[1]))
                                    <a class="block-slideshow__item" href="#">
                                        <span class="block-slideshow__item-image block-slideshow__item-image--desktop" style="background-image: url('{{ $all_b8[1]->image }}')"></span>
                                        <span class="block-slideshow__item-image block-slideshow__item-image--mobile" style="background-image: url('{{ $all_b8[1]->image }}')">
										</span>
                                    </a>
                                    @endif

                                    @if (isset($all_b8[2]))
                                    <a class="block-slideshow__item" href="#">
                                        <span class="block-slideshow__item-image block-slideshow__item-image--desktop" style="background-image: url('{{ $all_b8[2]->image }}')"></span>
                                        <span class="block-slideshow__item-image block-slideshow__item-image--mobile" style="background-image: url('{{ $all_b8[2]->image }}')">
										</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-section-top-space custom-slide-height">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#"><img src="{{ $b10->image }}" class="img-fluid"></a>
                </div>
                <div class="col-md-6">
                    <a href="#"><img src="{{ $b11->image }}" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="block-space block-space--layout--divider-nl"></div>
    <div class="block block-products-carousel" data-layout="grid-5">
        <div class="container">
            <div class="section-header">
                <div class="section-header__body">
                    <h2 class="section-header__title">Our Products</h2>
                    <div class="section-header__spring"></div>

                    <div class="section-header__arrows">
                        <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="section-header__divider"></div>
                </div>
            </div>

            <div class="block-products-carousel__carousel">
                <div class="block-products-carousel__carousel-loader"></div>
                <div class="owl-carousel">
                    {{-- @dd($webOurProducts) --}}
                    @foreach($webOurProducts as $webOurProduct)
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card product-card--layout--grid">
                                <div class="product-card__actions-list">


                                    <!-- Modal -->
                                    <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webOurProduct->id !!}" id="view">
                                        <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                        </svg>
                                    </a>

                                    <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webOurProduct->id }}" type="button" aria-label="Add to wish list" data-toggle="modal" data-target="#quick-view" title="Quick View" tabindex="0">
                                        <svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="product-card__image">
                                    <a href="{{ url('/upcoming/product/details/'.$webOurProduct->id) }}">
                                        <img src="{{ asset('/product/'.$webOurProduct->image) }}" alt="">
                                    </a>
                                </div>

                                <div class="product-card__info">
                                    <div class="product-card__meta">
                                        <span class="product-card__meta-title">SKU:</span> {{ $webOurProduct->name }}
                                    </div>
                                    <div class="product-card__name">
                                        <div>
                                            <div class="product-card__badges">
                                                @if($webOurProduct->sale)
                                                    <div class="tag-badge tag-badge--sale">{{ $webOurProduct->sale }}</div>
                                                @endif
                                                @if($webOurProduct->new)
                                                    <div class="tag-badge tag-badge--new">{{ $webOurProduct->new }}</div>
                                                @endif
                                                @if($webOurProduct->hot)
                                                    <div class="tag-badge tag-badge--hot">{{ $webOurProduct->hot }}</div>
                                                @endif
                                            </div>
                                            <a href="{{ url('/upcoming/product/details/'.$webOurProduct->id) }}" style="text-transform: capitalize">{{ $webOurProduct->name }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card__footer">
                                    <div class="product-card__prices">

                                            <div class="product-card__price product-card__price--current">${{ $webOurProduct->sale_price }}</div>
                                            <div class="product-card__price product-card__price--old">${{ $webOurProduct->pre_price }}</div>


                                    </div>
                                    <button class="product-card__addtocart-icon addCart" data-id="{{ $webOurProduct->id }}" type="button" aria-label="Add to cart">
                                        <svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="category-card__actions custom-button-align"><a href="{{ url('/our/products') }}" class="btn btn-primary btn-sm">View All Products</a></div>
        </div>
    </div>
    <div class="custom-section-top-space">
        <div class="container">
            <div class="row">
                @foreach($shopByBrand as $data)
                <div class="col-md-4">
                    <a href="{{ url('/supper/deals') }}"><img src="{{ $data->image }}" class="img-fluid"></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

        <div class="block block-products-carousel" data-layout="grid-5" style="margin-top: 30px;">
            <div class="container">
                <div class="section-header">
                    <div class="section-header__body">
                        <h2 class="section-header__title">Discount Products</h2>
                        <div class="section-header__spring"></div>

                        <div class="section-header__arrows">
                            <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>

                            <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="section-header__divider"></div>
                    </div>
                </div>

                <div class="block-products-carousel__carousel">
                    <div class="block-products-carousel__carousel-loader"></div>
                    <div class="owl-carousel">
                        @foreach($webDiscountProducts as $webDiscountProduct)
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--layout--grid">
                                        <div class="product-card__actions-list">


                                            <!-- Modal -->
                                            <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webDiscountProduct->id !!}" id="view">
                                                <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </a>


                                            <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webDiscountProduct->id }}" type="button" aria-label="Add to wish list" data-toggle="modal" data-target="#quick-view" title="Quick View" tabindex="0">
                                                <svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="product-card__image">
                                            <a href="{{ url('/upcoming/product/details/'.$webDiscountProduct->id) }}">
                                                <img src="{{ asset('/product/'.$webDiscountProduct->image) }}" alt="">
                                            </a>
                                            <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">

                                            </div>
                                        </div>

                                        <div class="product-card__info">
                                            <div class="product-card__meta">
                                                <span class="product-card__meta-title">SKU:</span> {{ $webDiscountProduct->sku }}
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        @if($webDiscountProduct->sale)
                                                            <div class="tag-badge tag-badge--sale">{{ $webDiscountProduct->sale }}</div>
                                                        @endif
                                                        @if($webDiscountProduct->new)
                                                            <div class="tag-badge tag-badge--new">{{ $webDiscountProduct->new }}</div>
                                                        @endif
                                                        @if($webDiscountProduct->hot)
                                                            <div class="tag-badge tag-badge--hot">{{ $webDiscountProduct->hot }}</div>
                                                        @endif
                                                    </div>
                                                    <a href="{{ url('/upcoming/product/details/'.$webDiscountProduct->id) }}" style="text-transform: capitalize">{{ $webDiscountProduct->name }}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-card__footer">
                                            <div class="product-card__prices">

                                                @if(isset($currency))
                                                    <div class="product-card__price product-card__price--current"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webDiscountProduct->sale_price * $currency->price, 2) }}</div>
                                                    <div class="product-card__price product-card__price--old"><span style="text-transform: uppercase; font-size: 13px;">{{ $currency->name }}</span> {{ number_format($webDiscountProduct->pre_price * $currency->price, 2) }}</div>
                                                @else
                                                    <div class="product-card__price product-card__price--current">${{ number_format($webDiscountProduct->sale_price,2) }}</div>
                                                    <div class="product-card__price product-card__price--old">${{ number_format($webDiscountProduct->pre_price,2) }}</div>
                                                @endif

                                            </div>
                                            <button class="product-card__addtocart-icon addCart" data-id="{{ $webDiscountProduct->id }}" type="button" aria-label="Add to cart">
                                                <svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="category-card__actions custom-button-align"><a href="{{ url('/discount/products') }}" class="btn btn-primary btn-sm">View All Products</a></div>
        </div>

        <div class="block-space"></div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>

    <div class="block-space block-space--layout--before-footer"></div>
    </div>



    <script>
        $(document).ready(function (){
            $('.addCart').on('click', function (){
                let id = $(this).data('id');
                console.log(id)
                if (id){
                    $.ajax({
                        url:"{{ url('/add-to-card/') }}/"+id,
                        type: 'GET',
                        dataType: 'json',
                        success:function (data){
                            console.log(data.totalItems)
                            //console.log(JSON.parse(data))
                            $('#totalItems').html(data.totalItems)
                            toastr.success(data.success);
                            location.reload()
                        }
                    })
                }
            });
        });

        $(document).ready(function (){
            $('.addWiseList').on('click', function (){
                let id = $(this).data('id');
                console.log(id)
                if (id){
                    $.ajax({
                        url:"{{ url('/add-to-wise-list/') }}/"+id,
                        type: 'GET',
                        dataType: 'json',
                        success:function (data){
                            //console.log(data.totalItems)
                            //console.log(JSON.parse(data))
                            toastr.success(data.success);
                        }
                    })
                }
            });
        });
    </script>
    <script>
        $(document).ready(function (){
            loadCurrency();
        });
    </script>
@endsection
