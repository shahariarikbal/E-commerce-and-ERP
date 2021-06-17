@extends('version-1.fontend.master')

@section('content')
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb block-header--has-title"><div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a></li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Softwares</span></li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Softwares</h1>
                </div>
            </div>
        </div>

        <div class="block-split">
            <div class="container">
                <div class="row">


                    <div class="block-split__item block-split__item-content col-auto">
                        <div class="block">
                            <div class="products-view">
                                <div class="products-view__options view-options view-options--offcanvas--always">
                                </div>

                                <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                                    <div class="products-list__content custom-software">
                                        @foreach($webSoftwareProducts as $webBrandsProduct)
                                            <div class="products-list__item">
                                                <div class="product-card">
                                                    <div class="product-card__actions-list">

                                                        
                                                        <!-- Modal -->
                                                        <a href="{{ url('/featureproduct/view/') }}" class="product-card__action" type="button" data-id="{!! $webBrandsProduct->id !!}" id="view">
                                                            <svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                            </svg>
                                                        </a>
                                                        
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
{{--                                         @foreach($webSoftwareProducts as $webSoftwareProduct)
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <div class="product-card__image">
                                                    <a href="#">
                                                        <img src="{{ asset('/product/'.$webSoftwareProduct->image) }}" alt="">
                                                    </a>
                                                </div>

                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <div>
                                                            <a href="#" style="text-transform: capitalize">{{ $webSoftwareProduct->name }}</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-card__footer">
                                                    <div class="product-card__prices">
                                                        <div class="product-card__price product-card__price--current">${{ $webSoftwareProduct->sale_price }}</div>
                                                        <div class="product-card__price product-card__price--old">${{ $webSoftwareProduct->pre_price }}</div>
                                                    </div>
                                                    <button class="product-card__addtocart-icon addCart" data-id="{{ $webSoftwareProduct->id }}" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                    </button>

                                                    <button class="product-card__addtocart-full" type="button">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach --}}
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

    <script>
        loadCurrency();
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
                            //console.log(data.totalItems)
                            //console.log(JSON.parse(data))
                            $('#totalItems').html(data.totalItems)
                            toastr.success(data.success);
                            location.reload()
                        }
                    })
                }
            });
        });
    </script>
@endsection
