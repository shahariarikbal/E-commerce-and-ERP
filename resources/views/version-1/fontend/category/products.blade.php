@extends('version-1.fontend.master')
@section('content')
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb block-header--has-title"><div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a></li>

                            <li class="breadcrumb__item breadcrumb__item--parent"><a href="#" class="breadcrumb__item-link">Category</a></li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">{{ isset($data['name']) ? $data['name'] : '' }}</span></li>
                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>
                    <h1 class="block-header__title">{{ isset($data['name']) ? $data['name'] :'' }}</h1>
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
{{-- 
                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>Categories <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                    </button>
                                                    <div class="filter__body" data-collapse-content>
                                                        <div class="filter__container">
                                                            <div class="filter-categories">
                                                                <ul class="filter-categories__list">
                                                                    @foreach($data['categories'] as $category)
                                                                        <label class="filter-list__item">
                                                                        <span id="catId" class="input-check filter-list__input" onclick="myFunction()" >
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input sub_category" type="checkbox" name="cat" value="{{ $category->category_id }}">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon">
                                                                                    <svg width="9px" height="7px">
                                                                                        <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                            <span class="filter-list__title" for="{{ $category->category->id }}">{{ $category->category->name }} </span>
                                                                        </label>
                                                                        @php
                                                                            break;
                                                                        @endphp
                                                                    @endforeach
                                                                    <input type="hidden" id="category">
                                                                    <script>
                                                                        var categoryField =  document.getElementById('category');
                                                                        function setCategory(e){
                                                                            if(categoryField.value == e){
                                                                                categoryField.value = ''
                                                                            }else {
                                                                                categoryField.value = e;
                                                                            }
                                                                            myFunction();
                                                                        }
                                                                    </script>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>Price <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span></button>
                                                    <div class="filter__body" data-collapse-content onclick="myFunction()">
                                                        <div class="filter__container">
                                                            <div class="filter-price" data-min="{{ round($data['minPrice']) }}" data-max="{{ round($data['maxPrice']) }}" data-from="{{ round($data['minPrice']) }}" data-to="{{ round($data['maxPrice']) }}">
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
                                                                    @foreach($data['subCategories'] as $subCategory)
                                                                        <label id="{{ $subCategory->first()->subcategory_id }}" class="filter-list__item">
                                                                        <span id="subCatId" class="input-check filter-list__input"  onclick="myFunction()">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input sub_category" type="checkbox"  name="sub" value="{{ $subCategory->first()->subcategory_id }}">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon">
                                                                                    <svg width="9px" height="7px">
                                                                                        <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                            <span class="filter-list__title">{{ $subCategory->first()->subcategory->name }} </span>
{{--                                                                            <span class="filter-list__counter">{{ $subCategory->product->count() }}</span>--}}
                                                                        </label>
                                                                    @endforeach
                                                                    <input type="hidden" id="subCategory">
                                                                    <script>
                                                                        var subCategoryField =  document.getElementById('subCategory');
                                                                        function setsubCategory(e){
                                                                            if(subCategoryField.value == e){
                                                                                subCategoryField.value = ''
                                                                            }else {
                                                                                subCategoryField.value = e;
                                                                            }
                                                                            myFunction();
                                                                        }
                                                                    </script>
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
                                                                    @foreach($data['manufactures'] as $manufacture)

                                                                        <label onclick="myFunction()" class="filter-list__item">
                                                                        <span class="input-check filter-list__input">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input" type="checkbox"  name="man" value="{{ $manufacture->first()->manufacture->id }}">

                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon">
                                                                                    <svg width="9px" height="7px">
                                                                                        <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>

                                                                            <span class="filter-list__title">{{ $manufacture->first()->manufacture->name }} </span>
{{--                                                                            <span class="filter-list__counter">{{ $manufacture->product->count() }}</span>--}}

                                                                        </label>
                                                                    @endforeach
                                                                    <input type="hidden" id="manufacture">
                                                                    <script>
                                                                        var manufactureField =  document.getElementById('manufacture');
                                                                        function setManufacture(e){

                                                                            if(manufactureField.value == e){
                                                                                manufactureField.value = ''
                                                                            }else {
                                                                                manufactureField.value = e;
                                                                            }
                                                                            myFunction();
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>Condition  <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                    </button>
                                                    <div class="filter__body" data-collapse-content>
                                                        <div class="filter__container">
                                                            <div class="filter-list">
                                                                <div class="filter-list__list"><label class="filter-list__item"></label>
                                                                    @foreach($data['conditions'] as $condition)
                                                                        <label onclick="myFunction()" class="filter-list__item">
                                                                            <span class="input-check filter-list__input">
                                                                                <span class="input-check__body">
                                                                                    <input class="input-check__input" type="checkbox" name="cond" value="{{ $condition->id }}">
                                                                                    <span class="input-check__box"></span>
                                                                                    <span class="input-check__icon">
                                                                                        <svg width="9px" height="7px">
                                                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="filter-list__title">{{ $condition->name }} </span>
{{--                                                                            <span class="filter-list__counter">{{ $condition->products->count() }}</span>--}}
                                                                        </label>
                                                                    @endforeach
                                                                    <input type="hidden" id="condition">
                                                                    <script>
                                                                        var conditionField =  document.getElementById('condition');
                                                                        function setCondition(e){

                                                                            if(conditionField.value == e){
                                                                                conditionField.value = ''
                                                                            }else {
                                                                                conditionField.value = e;
                                                                            }
                                                                            myFunction();
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>Brands   <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
                                                    </button>
                                                    <div class="filter__body" data-collapse-content>
                                                        <div class="filter__container">
                                                            <div class="filter-list">
                                                                <div class="filter-list__list">
                                                                    @foreach($data['brands'] as $brand)
                                                                    {{-- @dd($brand) --}}
                                                                        <label onclick="myFunction()" class="filter-list__item">
                                                                            <span class="input-check filter-list__input">
                                                                                <span class="input-check__body">

                                                                                    <input class="input-check__input" type="checkbox" name="br" value="{{ $brand->first()->brand->id }}">

                                                                                    <span class="input-check__box"></span>
                                                                                    <span class="input-check__icon">
                                                                                        <svg width="9px" height="7px">
                                                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                            <span class="filter-list__title">{{ $brand->first()->brand->name }} </span>
{{--                                                                            <span class="filter-list__counter">{{ $brand->first()->product->count() }}</span>--}}

                                                                        </label>
                                                                    @endforeach
                                                                    <input type="hidden" id="brand">
                                                                    <script>
                                                                        var brandField =  document.getElementById('brand');
                                                                        function setBrand(e){
                                                                            brand.value = e;
                                                                            myFunction();
                                                                        }
                                                                    </script>
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
                                            <button type="button" class="view-options__filters-button filters-button">
                                                <span class="filters-button__icon">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z"
                                                        />
                                                    </svg>
                                                </span>
                                                <span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span>
                                            </button>

                                            <div class="view-options__layout layout-switcher">
                                                <div class="layout-switcher__list">
                                                    <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false" disabled="disabled">
                                                        <svg width="16" height="16">
                                                            <path
                                                                d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z"
                                                            ></path>
                                                        </svg>
                                                    </button>

{{--                                                     <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                                                        <svg width="16" height="16">
                                                            <path
                                                                d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z"
                                                            ></path>
                                                        </svg>
                                                    </button> --}}

                                                    <button type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                                                        <svg width="16" height="16">
                                                            <path
                                                                d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z"
                                                            ></path>
                                                        </svg>
                                                    </button>

                                                    <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                                                        <svg width="16" height="16">
                                                            <path
                                                                d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="view-options__legend">Showing <span id="productCount"></span> products</div>
                                        </div>
                                    </div>
                                <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                                    <div class="products-list__head">
                                        <div class="products-list__column products-list__column--image">Image</div>
                                        <div class="products-list__column products-list__column--meta">SKU</div>
                                        <div class="products-list__column products-list__column--product">Product</div>
                                        <div class="products-list__column products-list__column--rating">Rating</div>
                                        <div class="products-list__column products-list__column--price">Price</div>
                                    </div>

                                    <div class="products-list__content" id="addHere"></div>

                                    <div class="products-list__content" id="addHere2"></div>

                                </div>
                                <div style="margin-top: 60px;">
                                    <img src="{{ asset('/fontend/') }}/images/Image 31.png" class="img-fluid">
                                </div>
                                <div>
                                    <img src="{{ asset('/fontend/') }}/images/Image 39.png" class="img-fluid">
                                </div>
                                <div class="custom-section-top-space our-clients-section"></div>
                                <div class="block-space"></div>                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--before-footer"></div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script>
        var baseUrl = '{{ asset('/') }}';
        var filterProductCount = document.getElementById('productCount').innerHTML;
        var min         = document.getElementById('min');
        var max         = document.getElementById('max');
        var id     = '{{ $id }}';
        var slash       = '/';
        var optional    = '&';
        var details     = "{{ url('/upcoming/product/details/') }}/";
        var accessories     = "{{ url('/accessories/product/details/') }}/";




// fff

        function myFunction() {   

            var cat = [];
            $("input:checkbox[name=cat]:checked").each(function(){
                cat.push($(this).val());
            }); 

            var min         = Number(document.getElementById('min').innerHTML);
            var max         = Number(document.getElementById('max').innerHTML);

            // subcategory
            var sub = [];
            $("input:checkbox[name=sub]:checked").each(function(){
                sub.push($(this).val());
            }); 

            // manufacturer
            var man = [];
            $("input:checkbox[name=man]:checked").each(function(){
                man.push($(this).val());
            }); 

            // manufacturer
            var cond = [];
            $("input:checkbox[name=cond]:checked").each(function(){
                cond.push($(this).val());
            }); 

            // manufacturer
            var br = [];
            $("input:checkbox[name=br]:checked").each(function(){
                br.push($(this).val());
            }); 

            console.log(cat,min,max,sub,man,cond,br);

            console.log(id);
        
            $.ajax({
                url: "{{ url('/category/product/filtering/') }}/"+id,
                data:{category:cat, minimum:min, maximum:max, subCategory:sub, manufacturer:man, condition:cond, brand:br},
                type: "GET",
                success: function (data) {
                    console.log(data);
                     document.getElementById('productCount').innerHTML = data.products.length;

                    $('.remove').closest('.remove').remove();

                    var html = '';
                    // console.log(Number(data.msg) == 0);
                    if (data.msg == 0) {                        
                        $('#addHere').empty();
                        for (var i = 0; i < data.products.length; i++) {
                            var current_product = data.products[i];
                            // console.log(current_product);
                            html+='<div class="products-list__item remove">'
                            html+='<div class="product-card">'
                            html+='<div class="product-card__actions-list">'


                            html+='<a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="'
                            html+=current_product.id
                            html+='" id="view">'
                            html+='<svg width="16" height="16">'
                            html+='<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>'
                            html+='</svg>'
                            html+='</a>'



                            html+='<button class="product-card__action product-card__action--wishlist addWiseList" onclick="addToWishList('+current_product.id+')" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>'
                            html+='</div>'

                            html+='<div class="product-card__image">'
                            html+='<a href="'+details+current_product.id+'">'
                            html+='<img src="'+baseUrl+'product/'+current_product.image+'">'
                            html+='</a>'
                            html+='</div>'

                            html+='<div class="product-card__info">'
                            html+='<div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>'
                            html+=current_product.sku
                            html+='</div>'

                            html+='<div class="product-card__name">'
                            html+='<div>'
                            html+='<div class="product-card__badges">'

                            if (current_product.sale != null) {
                                html+='<div class="tag-badge tag-badge--sale">'
                                html+=current_product.sale
                                html+='</div>'
                            }

                            if (current_product.hot != null) {
                                html += '<div class="tag-badge tag-badge--hot">'
                                html += current_product.hot
                                html += '</div>'
                            }

                            if (current_product.new != null) {
                                html += '<div class="tag-badge tag-badge--new">'
                                html += current_product.new
                                html += '</div>'
                            }

                            html+='</div>'
                            html+='<a href="'+details+current_product.id+'">'
                            html+=current_product.name
                            html+='</a>'
                            html+='</div>'
                            html+='</div>'


                            html+='</div>'

                            html+='<div class="product-card__footer">'
                            html+='<div class="product-card__prices">'
                            html+='<div class="product-card__price product-card__price--current">$'
                            html+=current_product.sale_price
                            html+='</div>'
                            html+='<div class="product-card__price product-card__price--old">$'
                            html+=current_product.pre_price
                            html+='</div>'
                            html+='</div>'
                            html+='<button class="product-card__addtocart-icon" onclick="addToCart('+current_product.id+')" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg></button>'
                            html+='<button class="product-card__addtocart-full" type="button">Add to cart</button>'

                            html+='<button class="product-card__wishlist" type="button"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg> <span>Add to wishlist</span></button>'

                            html+='</div>'
                            html+='</div>'
                            html+='</div>'
                            
                        }
                    }else{
                        $('#addHere').empty();
                        html='<div class="alert alert-danger mt-1 text-center" style="width:100%">No product found</div>';
                    }
                    $('#addHere').append(html);
                    loadCurrency();
                }
            });
        }
        $(window).bind("load", function() {
            myFunction();
        });
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
                        toastr.success(data.success);
                        location.reload()
                    }
                })
            }
        }
    </script>
@endsection
