@extends('version-1.fontend.master')

@section('content')
    <div>
        <div class="site__body">
            <div class="block-header block-header--has-breadcrumb block-header--has-title"><div class="container">
                    <div class="block-header__body">
                        <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb__list">
                                <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                                <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a></li>

                                <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Free Shipping Products</span></li>

                                <li class="breadcrumb__title-safe-area" role="presentation"></li>
                            </ol>
                        </nav>

                        <h1 class="block-header__title">Free Shipping Products</h1>
                    </div>
                </div>
            </div>

            <div class="block-split block-split--has-sidebar" id="filters">
                <div class="container">
                    <div class="block-split__row row no-gutters">
                        <div class="block-split__item block-split__item-sidebar col-auto">
                            <div class="sidebar sidebar--offcanvas--mobile">
                                <div class="sidebar__backdrop"></div>
                                <div class="sidebar__body">
                                    <div class="sidebar__header">
                                        <div class="sidebar__title">Filters</div>
                                        <button class="sidebar__close" type="button"><svg width="12" height="12"><path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z"/></svg>
                                        </button>
                                    </div>

                                    <div class="sidebar__content">
                                        <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                            <div class="widget__header widget-filters__header"><h4>Filters</h4>
                                            </div>
                                            <div class="widget-filters__list">
                                                <div class="widget-filters__item">
                                                    <div class="filter filter--opened" data-collapse-item>
                                                        <button type="button" class="filter__title" data-collapse-trigger>Categories <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                        </button>
                                                        <div class="filter__body" data-collapse-content>
                                                            <div class="filter__container">
                                                                <div class="filter-categories">
                                                                    <ul class="filter-categories__list">
                                                                        @foreach($webCategory as $category)
                                                                            <li class="filter-categories__item filter-categories__item--parent">
                                                                                <span class="filter-categories__arrow"></span>
                                                                                <a href="{{ url('/category/wish/product/'.$category->id) }}">{{ $category->name }}</a>
                                                                                <div class="filter-categories__counter">{{ $category->product_count }}</div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget-filters__item">
                                                    <div class="filter filter--opened" data-collapse-item>
                                                        <button type="button" class="filter__title" data-collapse-trigger>Price <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span></button>
                                                        <div class="filter__body" data-collapse-content onclick="myFunction()">
                                                            <div class="filter__container">
                                                                <div class="filter-price" data-min="{{ round($minPrice) }}" data-max="{{ round($maxPrice) }}" data-from="{{ round($minPrice) }}" data-to="{{ round($maxPrice) }}">
                                                                    <div class="filter-price__slider"></div>
                                                                    <div class="filter-price__title-button">
                                                                        <div class="filter-price__title">$<span class="filter-price__min-value" id="min"></span> – $<span class="filter-price__max-value" id="max"></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget-filters__item">
                                                    <div class="filter filter--opened" data-collapse-item>
                                                        <button type="button" class="filter__title" data-collapse-trigger>Sub Categories <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                        </button>
                                                        <div class="filter__body" data-collapse-content>
                                                            <div class="filter__container">
                                                                <div class="filter-list">
                                                                    <div class="filter-list__list">
                                                                        @foreach($subcategoriesCount as $subcategories)
                                                                            <label class="filter-list__item">
                                                                            <span class="input-check filter-list__input">
                                                                                <span class="input-check__body">
                                                                                    <input class="input-check__input" {{ isset($isSelected) && $isSelected == $subcategories->id ? 'checked' : '' }} type="checkbox" onclick="
                                                                                        document.getElementById('product'+{{$subcategories->id }}).submit();" value="{{ $subcategories->name }}">
                                                                                    <span class="input-check__box"></span>
                                                                                    <span class="input-check__icon">
                                                                                        <svg width="9px" height="7px">
                                                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                                <span class="filter-list__title">{{ $subcategories->name }} </span>
                                                                                <span class="filter-list__counter">{{ $subcategories->product_count }}</span>
                                                                                <form action="{{ url('/show/all/subcategory/filter/product/'.$subcategories->id) }}" method="get" id="product{{ $subcategories->id }}">
                                                                                    @csrf
                                                                                </form>
                                                                            </label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>Condition <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                    </button>
                                                    <div class="filter__body" data-collapse-content>
                                                        <div class="filter__container">
                                                            <div class="filter-list">
                                                                <div class="filter-list__list">
                                                                    @foreach($conditions as $condition)
                                                                        <label class="filter-list__item">
                                                                            <span class="input-check filter-list__input">
                                                                                <span class="input-check__body">
                                                                                    <input class="input-check__input" {{ isset($isSelected) && $isSelected == $condition->id ? 'checked' : '' }} type="checkbox" onclick="
                                                                                        document.getElementById('condition'+{{$condition->id }}).submit();" value="{{ $condition->name }}">
                                                                                    <span class="input-check__box"></span>
                                                                                    <span class="input-check__icon">
                                                                                        <svg width="9px" height="7px">
                                                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="filter-list__title">{{ $condition->name }} </span>
                                                                            <span class="filter-list__counter">{{ $condition->products_count }}</span>
                                                                            <form action="{{ url('/show/all/condition/filter/product/'.$condition->id) }}" method="get" id="condition{{ $condition->id }}">
                                                                                @csrf
                                                                            </form>
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                                <div class="widget-filters__item">
                                                    <div class="filter filter--opened" data-collapse-item>
                                                        <button type="button" class="filter__title" data-collapse-trigger>Manufactures  <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                        </button>
                                                        <div class="filter__body" data-collapse-content>
                                                            <div class="filter__container">
                                                                <div class="filter-list">
                                                                    <div class="filter-list__list"><label class="filter-list__item"></label>
                                                                        @foreach($webManufacturers as $webManufacturer)
                                                                            <label class="filter-list__item">
                                                                            <span class="input-check filter-list__input">
                                                                                <span class="input-check__body">
                                                                                    <input class="input-check__input" {{ isset($isManufactureSelected) && $isManufactureSelected == $webManufacturer->id ? 'checked' : '' }} type="checkbox" onclick="
                                                                                        document.getElementById('manufacture'+{{$webManufacturer->id }}).submit();" value="{{ $webManufacturer->name }}">
                                                                                    <span class="input-check__box"></span>
                                                                                    <span class="input-check__icon">
                                                                                        <svg width="9px" height="7px">
                                                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                                <span class="filter-list__title">{{ $webManufacturer->name }} </span>
                                                                                <span class="filter-list__counter">{{ $webManufacturer->product_count }}</span>
                                                                                <form action="{{ url('/show/all/filter/product/'.$webManufacturer->id) }}" method="get" id="manufacture{{ $webManufacturer->id }}">
                                                                                    @csrf
                                                                                </form>
                                                                            </label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="widget-filters__item">
                                                    <div class="filter filter--opened" data-collapse-item>
                                                        <button type="button" class="filter__title" data-collapse-trigger>Car Companies   <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                        </button>
                                                        <div class="filter__body" data-collapse-content>
                                                            <div class="filter__container">
                                                                <div class="filter-list">
                                                                    <div class="filter-list__list">
                                                                        @foreach($webBrands as $webBrand)
                                                                            <label class="filter-list__item">
                                                                            <span class="input-check filter-list__input">
                                                                                <span class="input-check__body">
                                                                                    <input class="input-check__input" {{ isset($isBrandSelected) && $isManufactureSelected == $webBrand->id ? 'checked' : '' }} type="checkbox" onclick="
                                                                                        document.getElementById('brand'+{{$webBrand->id }}).submit();" value="{{ $webBrand->name }}">
                                                                                    <span class="input-check__box"></span>
                                                                                    <span class="input-check__icon">
                                                                                        <svg width="9px" height="7px">
                                                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                                <span class="filter-list__title">{{ $webBrand->name }} </span>
                                                                                <span class="filter-list__counter">{{ $webBrand->product_count }}</span>
                                                                                <form action="{{ url('/show/car/brand/filter/product/'.$webBrand->id) }}" method="get" id="brand{{ $webBrand->id }}">
                                                                                    @csrf
                                                                                </form>
                                                                            </label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block-split__item block-split__item-content col-auto">
                            <div class="block">
                                <div class="products-view">
                                    <div class="products-view__options view-options view-options--offcanvas--mobile">
                                        <div class="view-options__body">
                                            <button type="button" class="view-options__filters-button filters-button"><span class="filters-button__icon"><svg width="16" height="16"><path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z"/></svg> </span><span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span>
                                            </button>

                                            <div class="view-options__layout layout-switcher">
                                                <div class="layout-switcher__list">
                                                    <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false"><svg width="16" height="16"><path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z"/></svg></button>
                                                    <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true"><svg width="16" height="16"><path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z"/></svg></button>
                                                </div>
                                            </div>

                                            <div class="view-options__legend">Showing <span id="productCount">Free Shipping</span> products</div>
                                        </div>
                                    </div>

                                    <div class="products-view__list products-list products-list--grid--3" data-layout="grid" data-with-features="false">
                                        <div class="products-list__head">
                                            <div class="products-list__column products-list__column--image">Image</div>

                                            <div class="products-list__column products-list__column--meta">SKU</div>

                                            <div class="products-list__column products-list__column--product">Product</div>

                                            <div class="products-list__column products-list__column--rating">Rating</div>

                                            <div class="products-list__column products-list__column--price">Price</div>
                                        </div>

                                        <div class="products-list__content" id="addHere"></div>
                                        <div class="products-list__content" id="initialProducts">
                                            @if(!empty($webUpcomingProducts))
                                                @foreach($webUpcomingProducts as $webBrandsProduct)
                                                    <div class="products-list__item">
                                                        <div class="product-card">
                                                            <div class="product-card__actions-list">
                                                                <button class="product-card__action product-card__action--wishlist addWiseList" data-id="{{ $webBrandsProduct->id }}" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg>
                                                                </button>
                                                            </div>

                                                            <div class="product-card__image">
                                                                <a href="{{ url('/upcoming/product/details/'.$webBrandsProduct->id) }}">
                                                                    <img src="{{ asset('/product/'.$webBrandsProduct->image) }}" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="product-card__info">
                                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> {{ $webBrandsProduct->sku }}</div>

                                                                <div class="product-card__name">
                                                                    <div>
                                                                        <div class="product-card__badges">
                                                                            @if($webBrandsProduct->new)
                                                                                <div class="tag-badge tag-badge--new">{{ $webBrandsProduct->new }}</div>
                                                                            @endif
                                                                            @if($webBrandsProduct->sale)
                                                                                <div class="tag-badge tag-badge--sale">{{ $webBrandsProduct->sale }}</div>
                                                                            @endif
                                                                            @if($webBrandsProduct->hot)
                                                                                <div class="tag-badge tag-badge--hot">{{ $webBrandsProduct->hot }}</div>
                                                                            @endif
                                                                        </div>
                                                                        <a href="#">{{ $webBrandsProduct->name }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="product-card__footer">
                                                                <div class="product-card__prices">
                                                                    <div class="product-card__price product-card__price--current">${{ number_format($webBrandsProduct->sale_price,2) }}</div>
                                                                    <div class="product-card__price product-card__price--old">${{ number_format($webBrandsProduct->pre_price,2) }}</div>
                                                                </div>
                                                                <button class="product-card__addtocart-icon addCart" type="button" data-id="{{ $webBrandsProduct->id }}" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                                </button>

                                                                <button class="product-card__addtocart-full" type="button">Add to cart</button>

                                                                <button class="product-card__wishlist addWiseList" data-id="{{ $webBrandsProduct->id }}" type="button"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg> <span>Add to wishlist</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div style="margin-top: 40px;">
                                        <img src="{{ asset('/fontend/') }}/images/Image 31.png" class="img-fluid">
                                    </div>

                                    <div>
                                        <img src="{{ asset('/fontend/') }}/images/Image 39.png" class="img-fluid">
                                    </div>

                                    <div class="custom-section-top-space our-clients-section"></div>

                                    <div class="block-space"></div>
                                    <div class="block block-brands block-brands--layout--columns-5-full">
                                        <div class="container">
                                            <ul class="block-brands__list">
                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-1.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-2.png" alt="">
                                                    </a>
                                                </li>
                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-3.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-4.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link"><img src="{{ asset('/fontend/') }}/images/brand/brand-5.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-8.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-9.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-10.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-11.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-12.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-2.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>

                                                <li class="block-brands__item">
                                                    <a href="#" class="block-brands__item-link">
                                                        <img src="{{ asset('/fontend/') }}/images/brand/brand-9.png" alt="">
                                                    </a>
                                                </li>

                                                <li class="block-brands__divider" role="presentation"></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-space block-space--layout--before-footer"></div>
                </div>
            </div>
        </div>
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
                            alert(data.success);
                        }
                    })
                }
            });
        });
    </script>
    <script>
        var baseUrl = '{{ asset('/') }}';
        var filterProductCount = document.getElementById('productCount').innerHTML;
        var min = document.getElementById('min');
        var max = document.getElementById('max');
        function myFunction() {
            //console.log(min.innerHTML)
            $.ajax({
                url: "{{ url('/product/filtering/') }}/"+min.innerHTML + '/' + max.innerHTML,
                type: "GET",
                success: function (data) {
                    if (data.length > 0) {
                        $('#initialProducts').hide()
                    }

                    if (data.length > 0) {
                        document.getElementById('productCount').innerHTML = data.length
                    }else {
                        document.getElementById('productCount').innerHTML = 0
                    }

                    $('.remove').closest('.remove').remove();
                    var html = ''
                    for (var i = 0; i < data.length; i++) {
                        html+='<div class="products-list__item remove">'
                        html+='<div class="product-card">'
                        html+='<div class="product-card__actions-list">'
                        html+='<button class="product-card__action product-card__action--wishlist addWiseList" onclick="addToWishList('+data[i].id+')" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>'
                        html+='</div>'

                        html+='<div class="product-card__image">'
                        html+='<a href="">'
                        html+='<img src="'+baseUrl+'product/'+data[i].image+'">'
                        html+='</a>'
                        html+='</div>'

                        html+='<div class="product-card__info">'
                        html+='<div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>'
                        html+=data[i].sku
                        html+='</div>'

                        html+='<div class="product-card__name">'
                        html+='<div>'
                        html+='<div class="product-card__badges">'

                        if (data[i].sale != null) {
                            html+='<div class="tag-badge tag-badge--sale">'
                            html+=data[i].sale
                            html+='</div>'
                        }

                        if (data[i].hot != null) {
                            html += '<div class="tag-badge tag-badge--hot">'
                            html += data[i].hot
                            html += '</div>'
                        }

                        if (data[i].new != null) {
                            html += '<div class="tag-badge tag-badge--new">'
                            html += data[i].new
                            html += '</div>'
                        }

                        html+='</div>'
                        html+='<a href="#">'
                        html+=data[i].name
                        html+='</a>'
                        html+='</div>'
                        html+='</div>'

                        html+='<div class="product-card__features"><ul><li>Speed: 750 RPM</li><li>Power Source: Cordless-Electric</li><li>Battery Cell Type: Lithium</li><li>Voltage: 20 Volts</li><li>Battery Capacity: 2 Ah</li></ul></div>'
                        html+='</div>'

                        html+='<div class="product-card__footer">'
                        html+='<div class="product-card__prices">'
                        html+='<div class="product-card__price product-card__price--current">$'
                        html+=data[i].sale_price
                        html+='</div>'
                        html+='<div class="product-card__price product-card__price--old">$'
                        html+=data[i].pre_price
                        html+='</div>'
                        html+='</div>'
                        html+='<button class="product-card__addtocart-icon" onclick="addToCart('+data[i].id+')" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg></button>'
                        html+='<button class="product-card__addtocart-full" type="button">Add to cart</button>'

                        html+='<button class="product-card__wishlist" type="button"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg> <span>Add to wishlist</span></button>'

                        html+='</div>'
                        html+='</div>'
                        html+='</div>'
                    }
                    $('#addHere').append(html);

                }

            });
        }

        function addToCart(id)
        {
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
        }

        function addToWishList(id)
        {
            if (id){
                $.ajax({
                    url:"{{ url('/add-to-wise-list/') }}/"+id,
                    type: 'GET',
                    dataType: 'json',
                    success:function (data){
                        //console.log(data.totalItems)
                        //console.log(JSON.parse(data))
                        alert(data.success);
                    }
                })
            }
        }
    </script>
@endsection
