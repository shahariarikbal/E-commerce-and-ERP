@extends('version-1.fontend.master')

@section('content')
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb block-header--has-title"><div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a></li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Downloads</span></li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Downloads</h1>
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

                                <div class="products-view__list products-list products-list--grid--4" data-layout="list" data-with-features="false">
                                    <div class="products-list__content custom-software">
                                        @foreach(App\Model\Download::all() as $webBrandsProduct)
                                            <div class="products-list__item">
                                                <div class="product-card">

                                                    <div class="product-card__image">
                                                        <a href="{{ url('/upcoming/product/details/'.$webBrandsProduct->id) }}">
                                                            <img src="{{ asset('/fontend/downloads/'.$webBrandsProduct->image) }}" class="img-fluid"  alt="">
                                                        </a>
                                                    </div>

                                                    <div class="product-card__info">

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

                                                        <a href="{{ $webBrandsProduct->link }}" class="product-card__addtocart-full text-center" style="margin-top: 40px;padding-top: 5px;" target="_blank">Download</a>
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
