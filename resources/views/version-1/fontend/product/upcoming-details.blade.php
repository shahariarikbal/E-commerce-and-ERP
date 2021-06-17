@extends('version-1.fontend.master')

@section('content')
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb">
            <div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                <a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--parent">
                                <a href="#" class="breadcrumb__item-link">{{ isset($webProductDetails->category->name) ? $webProductDetails->category->name : '' }}</a>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                <span class="breadcrumb__item-link">Products</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="block-split">
            <div class="container">
                <div class="block-split__row row no-gutters">
                    <div class="block-split__item block-split__item-content col-auto">
                        <div class="product product--layout--full">
                            <div class="product__body">
                                <div class="product__card product__card--one"></div>
                                <div class="product__card product__card--two"></div>
                                <div class="product-gallery product-gallery--layout--product-full product__gallery" data-layout="product-full">
                                    <div class="product-gallery__featured">
                                        <button type="button" class="product-gallery__zoom"><svg width="24" height="24"><path d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z"/></svg>
                                        </button>
                                        <div class="owl-carousel">
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt=""> </a>
                                            @if(!empty($webProductDetails->bulkproducts))
                                                @foreach($webProductDetails->bulkproducts as $webProducts)
                                                    <a href="{{ asset('/products/'.$webProducts->photo) }}" target="_blank"><img src="{{ asset('/products/'.$webProducts->photo) }}" alt=""> </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-gallery__thumbnails">
                                        <div class="owl-carousel">
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" class="product-gallery__thumbnails-item" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt="">
                                            </a>
                                            @if(!empty($webProductDetails->bulkproducts))
                                                @foreach($webProductDetails->bulkproducts as $webProducts)
                                                    <a href="{{ asset('/products/'.$webProducts->photo) }}" target="_blank"><img src="{{ asset('/products/'.$webProducts->photo) }}" alt=""> </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="product__header">
                                    <h1 class="product__title" style="text-transform: capitalize">{{ $webProductDetails->name }}</h1>
                                </div>

                                <div class="product__main">
                                    <div class="product__excerpt">{{ $webProductDetails->short_description }}</div>
                                    {{-- @dd($webProductDetails->feature) --}}
                                    @if ( $webProductDetails->feature->count() > 0 && $webProductDetails->feature->first()->name != null)
                                        <div class="product__features">
                                            <div class="product__features-title">More Details:</div>
                                                <ul>
                                                    @foreach($webProductDetails->feature as $feature)
                                                        <li>{!! $feature->name !!}</li>
                                                    @endforeach
                                                </ul>

                                            <br/>
                                        </div>
                                    @endif
                                </div>

                                <div class="product__info">
                                    <div class="product__info-card">
                                        <div class="product__info-body">
                                            <div class="product__prices-stock">
                                                <div class="product__prices">
                                                    <div class="product__price product__price--current">${{ number_format($webProductDetails->sale_price,2) }}</div>
                                                </div>
                                                <div class="status-badge status-badge--style--success product__stock status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        @if(isset($webProductStock->available_qty)? $webProductStock->available_qty == 0 : '')
                                                            <div class="status-badge__text" style="background-color: red; color: white">Stock out</div>
                                                        @else
                                                            <div class="status-badge__text">In Stock</div>
                                                        @endif
                                                        <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="In&#x20;Stock"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Session::get('message'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ Session::get('message') }}!</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                            <div class="product__meta">
                                                <table>
                                                    <tr>
                                                        <th>SKU</th>
                                                        <td>{{ $webProductDetails->sku }}</td>
                                                    </tr>
                                                    @if(!empty($webProductDetails->productCategory))
                                                    <tr>
                                                        <th>Category</th>
                                                           <td>
                                                               @foreach($webProductDetails->productCategory as $category)
                                                               <a href="{{ url('/category/wish/product/'.$category->id) }}" style="color: blue"> {{ $category->category ? $category->category->name: '' }}</a><br/>
                                                               @endforeach
                                                           </td>
                                                    </tr>
                                                    @endif

                                                    @if(!empty($webProductDetails->productSubcategory))
                                                    <tr>
                                                        <th>Subcategory</th>
                                                            <td>
                                                                @foreach($webProductDetails->productSubcategory as $subcategory)
                                                                    {{ $subcategory->subcategory ? $subcategory->subcategory->name : '' }}<br/>
                                                                @endforeach
                                                            </td>
                                                    </tr>
                                                    @endif

                                                    @if(!empty($webProductDetails->productBrands))
                                                    <tr>
                                                        <th>Brand</th>
                                                            <td>
                                                                @foreach($webProductDetails->productBrands as $brand)
                                                                {{-- @dd($brand) --}}
                                                                    <a href="{{ url('/car/brand/'.$brand->brand_id) }}" style="color: blue">{{$brand->brand ? $brand->brand->name: '' }}</a><br/>
                                                                @endforeach
                                                            </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <th>Condition</th>
                                                        <td>
                                                            <span>{{ isset($webProductDetails->condition->name) ? $webProductDetails->condition->name : '' }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country</th>
                                                        <td>
                                                            @foreach($webProductDetails->countryProduct as $country)
                                                            {{ isset($country->name) ? $country->name : '' }}
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <form action="{{ url('/add-to-card/details/'.$webProductDetails->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="product__actions">
                                                <div class="product__actions-item product__actions-item--quantity">
                                                    <div class="input-number">
                                                        <input class="input-number__input form-control form-control-lg" type="number" name="qty" min="1" value="1" id="qty">
                                                        <input class="input-number__input form-control form-control-lg" type="hidden" name="av_qty" id="avQty" value="{{ isset($webProductStock->available_qty) ? $webProductStock->available_qty : 0 }}">
                                                        <input class="input-number__input form-control form-control-lg" type="hidden" name="out_qty" id="outQty">
                                                        <input class="input-number__input form-control form-control-lg" type="hidden" name="id" value="{{ $webProductDetails->id }}">
                                                        <div class="input-number__add"></div>
                                                        <div class="input-number__sub"></div>
                                                    </div>
                                                </div>

                                                <div class="product__actions-item product__actions-item--addtocart">
                                                    <button class="btn btn-primary btn-lg btn-block addCart" type="submit">Add to cart</button>
                                                </div>
                                                <div class="product__actions-divider"></div>
                                                <button class="product__actions-item product__actions-item--wishlist addWiseList" data-id="{{ $webProductDetails->id }}" type="button"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg> <span>Add to wishlist</span></button>
                                            </div>
                                        </form>
                                        <div class="product__tags-and-share-links">
                                            <div class="product__tags tags tags--sm">
                                                <div class="tags__list">
                                                    @foreach($countries as $tags)
                                                    <a href="{{ url('/country/wise/products/'.$tags->id.'/'.$tags->name) }}" style="text-transform: capitalize">{{ isset($tags->name) ? $tags->name : '' }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product__shop-features shop-features custom-product-card">
                                        <ul class="shop-features__list">
                                            <li class="shop-features__item">
                                                <div class="block-zone__card category-card category-card--layout--overlay">
                                                    <div class="category-card__body">
                                                        <div class="category-card__overlay-image">
                                                            <img srcset="{{ asset('/fontend/') }}/images/categories/Mask Group 38.png.jpg 530w, {{ asset('/fontend/') }}/images/categories/Mask Group 38.png 305w" src="{{ asset('/fontend/') }}/images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>
                                                        <div class="category-card__overlay-image category-card__overlay-image--blur"><img srcset="{{ asset('/fontend/') }}/images/categories/Mask Group 38.png 530w, {{ asset('/fontend/') }}/images/categories/Mask Group 38.png 305w" src="{{ asset('/fontend/') }}/images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>

                                                        <div class="category-card__content">
                                                            <div class="category-card__info">
                                                                <div class="category-card__name">
                                                                    <a href="#">Spacial Discount For First Three Orders</a>
                                                                </div>
                                                                <ul class="category-card__children"><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li></ul>

                                                                <div class="category-card__actions"><a href="#" class="btn btn-primary btn-sm">Call Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                            <li class="shop-features__item">
                                                <div class="block-zone__card category-card category-card--layout--overlay">
                                                    <div class="category-card__body">
                                                        <div class="category-card__overlay-image">
                                                            <img srcset="{{ asset('/fontend/') }}/images/categories/best-sellers.png 530w, {{ asset('/fontend/') }}/images/categories/Mask Group 38.png 305w" src="{{ asset('/fontend/') }}/images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>
                                                        <div class="category-card__overlay-image category-card__overlay-image--blur"><img srcset="{{ asset('/fontend/') }}/images/categories/best-sellers.png 530w, {{ asset('/fontend/') }}/images/categories/Mask Group 38.png 305w" src="{{ asset('/fontend/') }}/images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>

                                                        <div class="category-card__content">
                                                            <div class="category-card__info">
                                                                <div class="category-card__name">
                                                                    <a href="#">Spacial Discount For First Three Orders</a>
                                                                </div>
                                                                <ul class="category-card__children"><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li><li><a href="#"></a></li></ul>

                                                                <div class="category-card__actions"><a href="#" class="btn btn-primary btn-sm">Call Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="shop-features__divider" role="presentation"></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product__tabs product-tabs product-tabs--layout--full">
                                    <ul class="product-tabs__list">
                                        <li class="product-tabs__item product-tabs__item--active">
                                            <a href="#product-tab-description">Description</a>
                                        </li>
                                        <li class="product-tabs__item">
                                            <a href="#product-tab-specification">Specification</a>
                                        </li>
                                        <li class="product-tabs__item">
                                            <a href="#product-tab-measurement">Weight & Measurement</a>
                                        </li>
                                    </ul>

                                    <div class="product-tabs__content">
                                        <div class="product-tabs__pane product-tabs__pane--active" id="product-tab-description">
                                            <div class="typography">
                                                {!! $webProductDetails->long_description !!}
                                            </div>
                                        </div>

                                        <div class="product-tabs__pane" id="product-tab-specification">
                                            <div class="spec">
                                                <div class="spec__section">
                                                    {!! $webProductDetails->specification !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-tabs__pane" id="product-tab-measurement">
                                            <div class="spec">
                                                <div class="spec__section">
                                                    {!! $webProductDetails->product_measurement !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-space block-space--layout--divider-nl"></div>

                        <div class="block-space block-space--layout--divider-nl"></div>
                        @if(!empty($webProductDetails->accessoriesProduct))
                        <div class="block block-products-carousel" data-layout="grid-5">
                            <div class="container">
                                <div class="section-header">
                                    <div class="section-header__body">
                                        <h2 class="section-header__title">Accessories</h2>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        @foreach($webProductDetails->accessoriesProduct as $accessories)
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="product-card product-card--layout--grid" style="width: 300px;">
                                                        <div class="product-card__actions-list">
                                                            <button class="product-card__action product-card__action--wishlist addAccesoriesWiseList" data-id="{{ $accessories->products->id }}" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>
                                                        </div>

                                                        <div class="product-card__image">
                                                            @if(!empty($accessories->products))
                                                                <a href="{{ url('/upcoming/product/details/'.$accessories->products->id) }}"><img src="{{ $accessories->products ? asset('/product/'.$accessories->products->image) : '' }}" alt=""></a>
                                                            @endif
                                                            <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                            </div>
                                                        </div>

                                                        <div class="product-card__info">

                                                            <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> {{ $accessories->products ? $accessories->products->sku : '' }}</div>

                                                            <div class="product-card__name"><div>
                                                                    <div class="product-card__badges">

                                                                        @if(!empty($accessories->products->sale) == 'Sale')
                                                                            <div class="tag-badge tag-badge--sale">
                                                                                {{ $accessories->products->sale }}
                                                                            </div>
                                                                        @endif
                                                                        @if(!empty($accessories->products->new) == 'New')
                                                                            <div class="tag-badge tag-badge--new">
                                                                                {{ $accessories->products->new }}
                                                                            </div>
                                                                        @endif
                                                                        @if(!empty($accessories->products->hot) == 'Hot')
                                                                            <div class="tag-badge tag-badge--hot">
                                                                                {{ $accessories->products->hot }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @if(!empty($accessories->products))
                                                                        <a href="{{ url('/upcoming/product/details/'.$accessories->products->id) }}" style="text-transform: capitalize">{{ $accessories->products ? $accessories->products->name : '' }}</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="product-card__footer">
                                                            <div class="product-card__prices"><div class="product-card__price product-card__price--current">${{ $accessories->products ? $accessories->products->sale_price : '' }}</div></div>

                                                            <div class="product-card__price product-card__price--old">${{ $accessories->products ? $accessories->products->pre_price : '' }}</div>
                                                            @if(!empty($accessories->products))
                                                                <button class="product-card__addtocart-icon addCart" data-id="{{ $accessories->products->id }}" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="block block-products-carousel" data-layout="grid-5">
                            <div class="container">
                                <div class="section-header">
                                    <div class="section-header__body">
                                        <h2 class="section-header__title">Related Products</h2>
                                        <div class="section-header__spring"></div>
                                        <div class="section-header__arrows">
                                            <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                                <button class="arrow__button" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg>
                                                </button>
                                            </div>

                                            <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                                <button class="arrow__button" type="button"><svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="section-header__divider"></div>
                                    </div>
                                </div>

                                <div class="block-products-carousel__carousel">
                                    <div class="block-products-carousel__carousel-loader"></div>
                                    <div class="owl-carousel">
                                        @foreach($related as $relate)
                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list">
                                                        <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $relate->id }}" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="{{ url('/upcoming/product/details/'.$relate->id) }}"><img src="{{ asset('/product/'.$relate->image) }}" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> {{ $relate->sku }}</div>

                                                        <div class="product-card__name"><div>
                                                                <div class="product-card__badges">
                                                                    @if($relate->sale == 'Sale')
                                                                    <div class="tag-badge tag-badge--sale">
                                                                         {{ $relate->sale }}
                                                                    </div>
                                                                    @endif
                                                                    @if($relate->new == 'New')
                                                                    <div class="tag-badge tag-badge--new">
                                                                         {{ $relate->new }}
                                                                    </div>
                                                                    @endif
                                                                    @if($relate->hot == 'Hot')
                                                                    <div class="tag-badge tag-badge--hot">
                                                                         {{ $relate->hot }}
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <a href="{{ url('/upcoming/product/details/'.$relate->id) }}" style="text-transform: capitalize">{{ $relate->name }}</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">${{ number_format($relate->sale_price,2) }}</div></div>
                                                        <div class="product-card__price product-card__price--old">${{ number_format($relate->pre_price,2) }}</div>
                                                        <button class="product-card__addtocart-icon addCart" data-id="{{ $relate->id }}" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-space block-space--layout--before-footer"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        

        $(window).bind("load", function() {
            loadCurrency();
        });
        
        $(function(){
            $('#qty, #avQty').keyup(function(){
                var value1 = parseFloat($('#qty').val()) || 0;
                var value2 = parseFloat($('#avQty').val()) || 0;
                //alert(value1 - value1)
                $('#outQty').val(value2 - value1);
            });
        });
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
            $('.addCartAccessories').on('click', function (){
                let id = $(this).data('id');
                console.log(id)
                if (id){
                    $.ajax({
                        url:"{{ url('/accessories/add-to-card/') }}/"+id,
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
                            console.log(data.totalItems)
                            //console.log(JSON.parse(data))
                            alert(data.success);
                        }
                    })
                }
            });
        });

        $(document).ready(function (){
            $('.addAccesoriesWiseList').on('click', function (){
                let id = $(this).data('id');
                console.log(id)
                if (id){
                    $.ajax({
                        url:"{{ url('/accessories/add-to-wise-list/') }}/"+id,
                        type: 'GET',
                        dataType: 'json',
                        success:function (data){
                            console.log(data.totalItems)
                            //console.log(JSON.parse(data))
                            toastr.success(data.success);
                            location.reload()
                        }
                    })
                }
            });
        });
    </script>
@endsection
