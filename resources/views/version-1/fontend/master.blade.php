<!DOCTYPE html><html lang="en" dir="ltr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>Diplomacy Key - All Car Remotes & Keys</title>
    <link rel="icon" type="image/png" href="{{ asset('/fontend/') }}/images/favicon.png">

    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/vendor/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/vendor/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/css/order-success.css">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/css/style.header-spaceship-variant-one.css" media="(min-width: 1200px)">
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/css/style.mobile-header-variant-one.css" media="(max-width: 1199px)">

    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('/fontend/') }}/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/backend/assets/') }}/toastr.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-97489509-8");</script>
    <style>

        /*custom css*/
        .modal_close button{
            margin: 0 auto;
            display: block;
            width: 100%;
            background: transparent;
        }

    </style>



    <script>
        function loadCurrency(){
            @if ( Request::filled('currency') && Request::get('currency') == "aed" )

                @php
                    if (!is_null(App\Model\Currency::where('slug', 'aed')->first())) {
                        $multiplier = App\Model\Currency::where('slug', 'aed')->first()->price;
                    }
                @endphp

                @if (isset($multiplier))

                    multiplier = {{ $multiplier }};

                    $(document).ready(function() {
                        // old_prices = document.getElementsByClassName("product-card__price product-card__price--old");
                        // new_prices = document.getElementsByClassName("product-card__price product-card__price--current");
                        card_price = document.getElementsByClassName("product-card__price");
                        product_price = document.getElementsByClassName("product__price");


                        // convert old price
                        for(i=0;i<card_price.length;i++){
                            price = (Number(card_price[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price) || price==0){
                                card_price[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            card_price[i].innerHTML = "AED" +" " + price;
                        }

                        // convert current price
                        for(i=0;i<product_price.length;i++){
                            console.log(product_price[i]);
                            price = (Number(product_price[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price) || price==0){
                                product_price[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            product_price[i].innerHTML = "AED" +" " + price;
                        }


                    });

                @endif


            @elseif ( Request::filled('currency') && Request::get('currency') == "sar" )

                @php

                    if (!is_null(App\Model\Currency::where('slug', 'sar')->first())) {
                        $multiplier = App\Model\Currency::where('slug', 'sar')->first()->price;
                    }

                @endphp

                console.log("multiplier = {{$multiplier}}}")

                @if (isset($multiplier))

                    multiplier = {{ $multiplier }};

                    $(document).ready(function() {
                        card_price = document.getElementsByClassName("product-card__price");
                        product_price = document.getElementsByClassName("product__price");

                        // console.log(multiplier);

                        // convert old price
                        for(i=0;i<card_price.length;i++){
                            price = (Number(card_price[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price) || price==0){
                                card_price[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            card_price[i].innerHTML = "SAR" +" " + price;
                        }

                        // convert current price
                        for(i=0;i<product_price.length;i++){
                            price = (Number(product_price[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price) || price==0){
                                product_price[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            product_price[i].innerHTML = "SAR" +" " + price;
                        }

                    });

                @endif
            @elseif ( Request::filled('currency') && Request::get('currency') == "euro" )

                @php

                    if (!is_null(App\Model\Currency::where('slug', 'euro')->first())) {
                        $multiplier = App\Model\Currency::where('slug', 'euro')->first()->price;
                    }

                @endphp

                @if (isset($multiplier))

                    multiplier = {{ $multiplier }};

                    $(document).ready(function() {
                        card_price = document.getElementsByClassName("product-card__price");
                        product_price = document.getElementsByClassName("product__price");

                        // convert old price
                        for(i=0;i<card_price.length;i++){
                            price = (Number(card_price[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price) || price==0){
                                card_price[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            card_price[i].innerHTML = "Euro" +" " + price;
                        }

                        // convert current price
                        for(i=0;i<product_price.length;i++){
                            price = (Number(product_price[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price) || price==0){
                                product_price[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            product_price[i].innerHTML = "Euro" +" " + price;
                        }

                    });

                @endif

            @else

                $(document).ready(function() {
                    card_price = document.getElementsByClassName("product-card__price");
                    product_price = document.getElementsByClassName("product__price");


                    // hide card price
                    for(i=0;i<card_price.length;i++){
                        price = ( Number(card_price[i].innerText.substring(1)) ).toFixed(2);

                        if(isNaN(price) || price==0){
                            card_price[i].style.display = "none";
                        }
                    }

                    // hide product price
                    for(i=0;i<product_price.length;i++){
                        console.log(product_price[i]);
                        price = ( Number(product_price[i].innerText.substring(1)) ).toFixed(2);

                        if(isNaN(price) || price==0){
                            product_price[i].style.display = "none";
                        }
                    }
                });

            @endif
            // consoleS.log("2");
        }

        function loadModalCurrency(){
            console.log('modal');
            @if ( Request::filled('currency') && Request::get('currency') == "aed" )

                @php
                    if (!is_null(App\Model\Currency::where('slug', 'aed')->first())) {
                        $multiplier = App\Model\Currency::where('slug', 'aed')->first()->price;
                    }
                @endphp

                @if (isset($multiplier))

                    multiplier = {{ $multiplier }};

                    $(document).ready(function() {
                        modal_price = document.getElementById('modal_price');

                        price = (Number(modal_price.innerText.substring(1)) * multiplier ).toFixed(2);
                        modal_price.innerHTML = "AED" +" " + price;


                    });

                @endif


            @elseif ( Request::filled('currency') && Request::get('currency') == "sar" )

                @php

                    if (!is_null(App\Model\Currency::where('slug', 'sar')->first())) {
                        $multiplier = App\Model\Currency::where('slug', 'sar')->first()->price;
                    }

                @endphp

                console.log("multiplier = {{$multiplier}}}")

                @if (isset($multiplier))

                    multiplier = {{ $multiplier }};

                    $(document).ready(function() {
                        old_prices = document.getElementsByClassName("product-card__price product-card__price--old");
                        new_prices = document.getElementsByClassName("product-card__price product-card__price--current");

                        // console.log(multiplier);

                        // convert old price
                        for(i=0;i<old_prices.length;i++){
                            price = (Number(old_prices[i].innerText.substring(1)) * multiplier ).toFixed(2);

                            if(isNaN(price)){
                                old_prices[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            old_prices[i].innerHTML = "SAR" +" " + price;
                        }

                        // convert current price
                        for(i=0;i<new_prices.length;i++){
                            price = (Number(new_prices[i].innerText.substring(1)) * multiplier ).toFixed(2);
                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            new_prices[i].innerHTML = "SAR" +" " + price;
                        }

                    });

                @endif
            @elseif ( Request::filled('currency') && Request::get('currency') == "euro" )

                @php

                    if (!is_null(App\Model\Currency::where('slug', 'euro')->first())) {
                        $multiplier = App\Model\Currency::where('slug', 'euro')->first()->price;
                    }

                @endphp

                @if (isset($multiplier))

                    multiplier = {{ $multiplier }};

                    $(document).ready(function() {
                        old_prices = document.getElementsByClassName("product-card__price product-card__price--old");
                        new_prices = document.getElementsByClassName("product-card__price product-card__price--current");

                            // console.log("old_price" + old_prices);
                        // convert old price
                        for(i=0;i<old_prices.length;i++){
                            price = (Number(old_prices[i].innerText.substring(1)) * multiplier ).toFixed(2);


                            if(isNaN(price)){
                                old_prices[i].style.display = "none";
                            }

                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            old_prices[i].innerHTML = "Euro" +" " + price;
                        }

                        // convert current price
                        for(i=0;i<new_prices.length;i++){
                            price = (Number(new_prices[i].innerText.substring(1)) * multiplier ).toFixed(2);
                            {{-- icon = '<img src={{ url('fontend/images/languages/language-2.png') }}>' --}}
                            new_prices[i].innerHTML = "Euro" +" " + price;
                        }

                    });

                @endif



            @endif

        }


    </script>


</head>

<body>
<!-- site -->
<div class="site" id="app">
    @include('version-1.fontend.includes.header')
    <!-- site__body -->
    <div class="site__body">
        <div class="layout--divider-xs"></div>

        @yield('slider')

        @yield('content')



        {{-- modal --}}
        <div class="modal fade" id="feature" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 65% !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id=""></h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="quickview__body">
                            <div class="product-gallery product-gallery--layout--quickview quickview__gallery" data-layout="quickview">

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators" id="modal_indicator_parent">
                                  </ol>
                                  <div class="carousel-inner" id="modal_img_parent">
                                  </div>
                                </div>
                            </div>


                            <div class="quickview__product">
                                <div class="quickview__product-name" id="modal_name"></div>
                                <div id="modal_short" class="quickview__product-description"></div>

                                <div class="quickview__product-meta">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>SKU</th>
                                                <td id="modal_sku"></td>
                                            </tr>
                                           {{--  <tr>
                                                <th>Brand</th>
                                                <td id="modal_brand"></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="quickview__product-description" id="modal_features_div">
                                    <div class="product__features">
                                        <div class="product__features-title">More Details:</div>
                                        <ul id="modal_features">
                                        </ul>
                                    </div>
                                </div>


                                <div class="quickview__product-prices-stock">
                                    <div class="quickview__product-prices"><div class="quickview__product-price" id="modal_price"></div></div>
                                    <div class="status-badge status-badge--style--success quickview__product-stock status-badge--has-text">
                                        <div class="status-badge__body">
                                            <div class="status-badge__text" id="modal_stock"></div></div>
                                    </div>
                                </div>

                                <div class="quickview__product-actions">
                                        <div class="quickview__product-actions-item quickview__product-actions-item--quantity">
                                            <div class="input-number">
                                            <form action="{{ url('add-to-cart-multiple') }}" id="modal_cart_form">
                                                <input type="hidden" name="product_id" id="modal_product_id" value="">
                                                <input name="amount" class="input-number__input form-control" type="number" min="1" value="1" />
                                            </form>
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </div>

                                        <div class="quickview__product-actions-item quickview__product-actions-item--addtocart">
                                            <button type="submit" class="btn btn-primary btn-block addCart" id="" data-id="" onclick="

                                            event.preventDefault();
                                            document.getElementById('modal_cart_form').submit();

                                            ">Add to cart</button>
                                        </div>

                                    <div class="quickview__product-actions-item quickview__product-actions-item--wishlist">
                                        <button class="btn btn-muted btn-icon addWiseList" id="modal_wishlist" data-id="" type="button">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal_close">
                        <button id="modal_details_link" type="button" class="btn btn-secondary">See full details</button>

                    </div>
                    <script>
                        // loadModalCurrency();
                    </script>
                </div>
            </div>
        </div>
    </div><!-- site__body / end -->

    <!-- site__footer -->
        @include('version-1.fontend.includes.footer')
    <!-- site__footer / end -->
</div><!-- site / end -->


<!-- mobile-menu -->
<div class="mobile-menu">
    <div class="mobile-menu__backdrop"></div>

    <div class="mobile-menu__body">
        <button class="mobile-menu__close" type="button"><svg width="12" height="12"><path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z"/></svg>
        </button>

        <div class="mobile-menu__panel">
            <div class="mobile-menu__panel-header"><div class="mobile-menu__panel-title">Menu</div></div>

            <div class="mobile-menu__panel-body">
                <div class="mobile-menu__settings-list">
                    <div class="mobile-menu__setting" data-mobile-menu-item>
                        <button class="mobile-menu__setting-button" title="Language" data-mobile-menu-trigger><span class="mobile-menu__setting-icon"><img src="{{ asset('/fontend/') }}/images/languages/language-5.png" alt=""> </span><span class="mobile-menu__setting-title">English</span> <span class="mobile-menu__setting-arrow"><svg width="6px" height="9px"><path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z"/></svg></span>
                        </button>

                        <div class="mobile-menu__setting-panel" data-mobile-menu-panel>
                            <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                <div class="mobile-menu__panel-header">
                                    <button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg>
                                    </button>

                                    <div class="mobile-menu__panel-title">Language</div>
                                </div>

                                <div class="mobile-menu__panel-body">
                                    <ul class="mobile-menu__links">
                                        <li data-mobile-menu-item>
                                            <button type="button" class="" data-mobile-menu-trigger><div class="mobile-menu__links-image"><img src="{{ asset('/fontend/') }}/images/languages/language-1.png" alt=""></div>English</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mobile-menu__setting" data-mobile-menu-item>
                        <button class="mobile-menu__setting-button" title="Currency" data-mobile-menu-trigger><span class="mobile-menu__setting-icon mobile-menu__setting-icon--currency">$ </span><span class="mobile-menu__setting-title" style="text-transform: uppercase;">@php
                                                    if (Request::filled('currency')) {
                                                        echo Request::get('currency');
                                                    } else {
                                                        echo "USD";
                                                    }
                        @endphp</span> <span class="mobile-menu__setting-arrow"><svg width="6px" height="9px"><path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z"/></svg></span>
                        </button>

                        <div class="mobile-menu__setting-panel" data-mobile-menu-panel>
                            <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                <div class="mobile-menu__panel-header">
                                    <button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg>
                                    </button>

                                    <div class="mobile-menu__panel-title">Currency</div>
                                </div>

                                <div class="mobile-menu__panel-body">
                                    <ul class="mobile-menu__links">
                                        <li data-mobile-menu-item>
                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('usd').submit()">
                                                    <img src="{{ asset('fontend/images/languages/language-1.png') }}" alt="">
                                                    <span class="ml-2">USD</span>
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="usd">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                </form>
                                        </li>
                                        <li data-mobile-menu-item>

                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('aed').submit()">
                                                    <img src="{{ asset('fontend/images/languages/language-2.png') }}" alt="">
                                                    <span class="ml-2">AED</span>
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="aed">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <input type="hidden" name="currency" value="aed">
                                                </form>
                                        </li>
                                        <li data-mobile-menu-item>

                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('sar').submit()">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <img src="{{ asset('fontend/images/languages/language-3.png') }}" alt="">
                                                    <span class="ml-2">SAR</span>
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="sar">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <input type="hidden" name="currency" value="sar">
                                                </form>
                                        </li>
                                        <li data-mobile-menu-item>

                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('euro').submit()">
                                                    <img src="{{ asset('fontend/images/languages/language-4.png') }}" alt="">
                                                    <span class="ml-2">EURO</span>
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="euro">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <input type="hidden" name="currency" value="euro">
                                                </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mobile-menu__divider"></div>

                <div class="mobile-menu__indicators">
                    <a class="mobile-menu__indicator" href="#"><span class="mobile-menu__indicator-icon"><svg width="20" height="20"><path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"/></svg> </span><span class="mobile-menu__indicator-title">Wishlist</span>
                    </a>

                    <a class="mobile-menu__indicator" href="#"><span class="mobile-menu__indicator-icon"><svg width="20" height="20"><path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/></svg> </span><span class="mobile-menu__indicator-title">Account</span>
                    </a>

                    <a class="mobile-menu__indicator" href="{{ url('/show-cart-products') }}"><span class="mobile-menu__indicator-icon"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg> <span class="mobile-menu__indicator-counter" id="totalItems">{{ Cart::count() }}</span> </span><span class="mobile-menu__indicator-title">Cart</span>
                    </a>

                    <a class="mobile-menu__indicator" href="#"><span class="mobile-menu__indicator-icon"><svg width="20" height="20"><path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0C15.5,10.2,14,11.3,14,12z"/></svg> </span><span class="mobile-menu__indicator-title">Track Order</span>
                </div>

                <div class="mobile-menu__divider"></div>
                <ul class="mobile-menu__links">
                    <li data-mobile-menu-item>
                        <a href="{{ url('/') }}" class="" data-mobile-menu-trigger>Home</a>
                    </li>

                    <li data-mobile-menu-item>
                        <a href="#" class="" data-mobile-menu-trigger>Shop <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg>
                        </a>

                        <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                            <div class="mobile-menu__panel mobile-menu__panel--hidden"><div class="mobile-menu__panel-header">
                                    <button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg></button>

                                    <div class="mobile-menu__panel-title">Shop</div></div>

                                <div class="mobile-menu__panel-body">
                                    <ul class="mobile-menu__links">
                                        <li data-mobile-menu-item>
                                            <a href="#" class="" data-mobile-menu-trigger>Category <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg>
                                            </a>

                                            <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                                                <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                                    <div class="mobile-menu__panel-header">
                                                        <button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg>
                                                        </button>

                                                        <div class="mobile-menu__panel-title">Category</div>
                                                    </div>
                                                    <div class="mobile-menu__panel-body">
                                                        <ul class="mobile-menu__links">
                                                            @foreach($webCategories as $webCategory)
                                                            <li data-mobile-menu-item><a href="{{ url('/category/wish/product/'.$webCategory->cat_id) }}" class="" data-mobile-menu-trigger>{{ $webCategory->category->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li data-mobile-menu-item>
                                            <a href="#" class="" data-mobile-menu-trigger>Car Brands<svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg>
                                            </a>

                                            <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                                                <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                                    <div class="mobile-menu__panel-header">
                                                        <button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg>
                                                        </button>

                                                        <div class="mobile-menu__panel-title">Car Brands</div>
                                                    </div>
                                                    <div class="mobile-menu__panel-body">
                                                        <ul class="mobile-menu__links">
                                                            @foreach($webBrands as $webBrand)
                                                            <li data-mobile-menu-item><a href="{{ url('/car/brand/'.$webBrand->id) }}" class="" data-mobile-menu-trigger>{{ $webBrand->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li data-mobile-menu-item>
                                            <a href="#" class="" data-mobile-menu-trigger>Manufacturers<svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg>
                                            </a>

                                            <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                                                <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                                    <div class="mobile-menu__panel-header">
                                                        <button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg>
                                                        </button>

                                                        <div class="mobile-menu__panel-title">Manufacturers</div>
                                                    </div>
                                                    <div class="mobile-menu__panel-body">
                                                        <ul class="mobile-menu__links">
                                                            @foreach($webManufacturers as $webManufacturer)
                                                            <li data-mobile-menu-item><a href="{{ url('/cat/manufacture/'.$webManufacturer->id) }}" class="" data-mobile-menu-trigger> {{ $webManufacturer->name }} </a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Cart</a></li><li data-mobile-menu-item><a href="{{ url('/checkout') }}" class="" data-mobile-menu-trigger>Checkout</a></li><li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Wishlist</a></li><li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Compare</a></li><li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Track Order</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li data-mobile-menu-item>
                        <a href="#" class="" data-mobile-menu-trigger>Account <svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg>
                        </a>

                        <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                            <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                <div class="mobile-menu__panel-header"><button class="mobile-menu__panel-back" type="button"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg></button><div class="mobile-menu__panel-title">Account</div></div>

                                <div class="mobile-menu__panel-body">
                                    <ul class="mobile-menu__links">
                                        <li data-mobile-menu-item><a href="{{ url('/checkout') }}" class="" data-mobile-menu-trigger>Login & Register</a></li><li data-mobile-menu-item><a href="account-dashboard.html" class="" data-mobile-menu-trigger>Dashboard</a></li><li data-mobile-menu-item><a href="account-profile.html" class="" data-mobile-menu-trigger>Edit Profile</a></li><li data-mobile-menu-item><a href="account-orders.html" class="" data-mobile-menu-trigger>Order History</a></li><li data-mobile-menu-item><a href="account-addresses.html" class="" data-mobile-menu-trigger>Address Book</a></li><li data-mobile-menu-item><a href="account-password.html" class="" data-mobile-menu-trigger>Change Password</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li data-mobile-menu-item>

                        <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                            <div class="mobile-menu__panel-body">
                                <ul class="mobile-menu__links">
                                    <li data-mobile-menu-item><a href="{{ url('/about/us') }}" class="" data-mobile-menu-trigger>About Us</a></li>

                                    <li data-mobile-menu-item><a href="{{ url('/contact/us') }}" class="" data-mobile-menu-trigger>Contact Us</a></li>

                                    <li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Track Order</a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/new/arrival') }}" class="" data-mobile-menu-trigger> New Arrival </a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/best/seller') }}" class="" data-mobile-menu-trigger>Best Sellers</a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/software') }}" class="" data-mobile-menu-trigger>Software</a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/offers') }}" class="" data-mobile-menu-trigger>Offers</a></li>

                                    <li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Productions</a></li>
                                    <li data-mobile-menu-item><a href="#" class="" data-mobile-menu-trigger>Downloads</a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/supper/deals') }}" class="" data-mobile-menu-trigger>Super Deals</a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/videos') }}" class="" data-mobile-menu-trigger> Videos </a></li>
                                    <li data-mobile-menu-item><a href="{{ url('/free/shipping') }}" class="" data-mobile-menu-trigger> Free Express Shipping </a></li>

                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="mobile-menu__spring"></div>
                <div class="mobile-menu__divider"></div>
                <a class="mobile-menu__contacts" href="#"><div class="mobile-menu__contacts-subtitle">Free call 24/7</div><div class="mobile-menu__contacts-title">800 060-0730</div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu / end -->

<!-- quickview-modal -->
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
<!-- quickview-modal / end -->

<!-- add-vehicle-modal -->
<div id="add-vehicle-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"><div class="vehicle-picker-modal modal-dialog modal-dialog-centered"><div class="modal-content"><button type="button" class="vehicle-picker-modal__close"><svg width="12" height="12"><path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z"/></svg></button><div class="vehicle-picker-modal__panel vehicle-picker-modal__panel--active"><div class="vehicle-picker-modal__title card-title">Add A Vehicle</div><div class="vehicle-form vehicle-form--layout--modal"><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Year"><option value="none">Select Year</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option></select></div><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Brand" disabled="disabled"><option value="none">Select Brand</option><option>Audi</option><option>BMW</option><option>Ferrari</option><option>Ford</option><option>KIA</option><option>Nissan</option><option>Tesla</option><option>Toyota</option></select></div><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Model" disabled="disabled"><option value="none">Select Model</option><option>Explorer</option><option>Focus S</option><option>Fusion SE</option><option>Mustang</option></select></div><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Engine" disabled="disabled"><option value="none">Select Engine</option><option>Gas 1.6L 125 hp AT/L4</option><option>Diesel 2.5L 200 hp AT/L5</option><option>Diesel 3.0L 250 hp MT/L5</option></select></div><div class="vehicle-form__divider">Or</div><div class="vehicle-form__item"><input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number"></div></div><div class="vehicle-picker-modal__actions"><button type="button" class="btn btn-sm btn-secondary vehicle-picker-modal__close-button">Cancel</button> <button type="button" class="btn btn-sm btn-primary">Add A Vehicle</button></div></div></div></div></div><!-- add-vehicle-modal / end -->

<!-- vehicle-picker-modal -->
<div id="vehicle-picker-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"><div class="vehicle-picker-modal modal-dialog modal-dialog-centered"><div class="modal-content"><button type="button" class="vehicle-picker-modal__close"><svg width="12" height="12"><path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z"/></svg></button><div class="vehicle-picker-modal__panel vehicle-picker-modal__panel--active" data-panel="list"><div class="vehicle-picker-modal__title card-title">Select Vehicle</div><div class="vehicle-picker-modal__text">Select a vehicle to find exact fit parts</div><div class="vehicles-list"><div class="vehicles-list__body"><label class="vehicles-list__item"><span class="vehicles-list__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="header-vehicle" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="vehicles-list__item-info"><span class="vehicles-list__item-name">2011 Ford Focus S</span> <span class="vehicles-list__item-details">Engine 2.0L 1742DA L4 FI Turbo</span> </span><button type="button" class="vehicles-list__item-remove"><svg width="16" height="16"><path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z"/></svg></button></label> <label class="vehicles-list__item"><span class="vehicles-list__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input" name="header-vehicle" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="vehicles-list__item-info"><span class="vehicles-list__item-name">2019 Audi Q7 Premium</span> <span class="vehicles-list__item-details">Engine 3.0L 5626CC L6 QK</span> </span><button type="button" class="vehicles-list__item-remove"><svg width="16" height="16"><path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z"/></svg></button></label></div></div><div class="vehicle-picker-modal__actions"><button type="button" class="btn btn-sm btn-secondary vehicle-picker-modal__close-button">Cancel</button> <button type="button" class="btn btn-sm btn-primary" data-to-panel="form">Add A Vehicle</button></div></div><div class="vehicle-picker-modal__panel" data-panel="form"><div class="vehicle-picker-modal__title card-title">Add A Vehicle</div><div class="vehicle-form vehicle-form--layout--modal"><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Year"><option value="none">Select Year</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option></select></div><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Brand" disabled="disabled"><option value="none">Select Brand</option><option>Audi</option><option>BMW</option><option>Ferrari</option><option>Ford</option><option>KIA</option><option>Nissan</option><option>Tesla</option><option>Toyota</option></select></div><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Model" disabled="disabled"><option value="none">Select Model</option><option>Explorer</option><option>Focus S</option><option>Fusion SE</option><option>Mustang</option></select></div><div class="vehicle-form__item vehicle-form__item--select"><select class="form-control form-control-select2" aria-label="Engine" disabled="disabled"><option value="none">Select Engine</option><option>Gas 1.6L 125 hp AT/L4</option><option>Diesel 2.5L 200 hp AT/L5</option><option>Diesel 3.0L 250 hp MT/L5</option></select></div><div class="vehicle-form__divider">Or</div><div class="vehicle-form__item"><input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number"></div></div><div class="vehicle-picker-modal__actions"><button type="button" class="btn btn-sm btn-secondary" data-to-panel="list">Back to list</button> <button type="button" class="btn btn-sm btn-primary">Add A Vehicle</button></div></div></div></div></div><!-- vehicle-picker-modal / end -->

<!-- photoswipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div><!-- photoswipe / end -->

<!-- scripts -->
<script src="{{ asset('/fontend/') }}/vendor/jquery/jquery.min.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
<script src="{{ asset('/fontend/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/fontend/') }}/vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="{{ asset('/fontend/') }}/vendor/nouislider/nouislider.min.js"></script>
<script src="{{ asset('/fontend/') }}/vendor/photoswipe/photoswipe.min.js"></script>
<script src="{{ asset('/fontend/') }}/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="{{ asset('/fontend/') }}/vendor/select2/js/select2.min.js"></script>
<script src="{{ asset('/fontend/') }}/js/number.js"></script>
<script src="{{ asset('/fontend/') }}/js/main.js"></script>
<!--Toastr Message Js-->
<script src="{{ asset('/backend/assets/') }}/toastr.js"></script>
{!! Toastr::message() !!}
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
    </script>
    <script>
        $(document).on("click", "#view", function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                var url = $(this).attr("href");
                // console.log( id + url );
                $.ajax({
                    url:url,
                    data:{id:id},
                    type:"GET",
                    dataType:"JSON",
                    success:function (response) {

                        console.log(response);

                        if ($.isEmptyObject(response) != null){
                            $("#feature").modal("show");


                            $("#modal_details_link").click(function(){
                                location.href = '{{ url("upcoming/product/details/") }}/' + response.id;
                            });

                            $("#featureModalLabel").text(response.name);
                            $("#modal_product_id").attr('value', response.id);
                            $("#modal_name").text(response.name);
                            $("#modal_sku").text(response.sku);
                            // $("#modal_brand").text(response.brand.name);
                            $("#modal_short").text(response.short_description);

                            if (response.sale_price != null ) {

                                @if ( Request::filled('currency') && Request::get('currency') == "aed" )
                                    @php
                                        if (!is_null(App\Model\Currency::where('slug', 'aed')->first())) {
                                            $multiplier = App\Model\Currency::where('slug', 'aed')->first()->price;
                                        }
                                    @endphp
                                    multiplier = {{ $multiplier }};
                                    $("#modal_price").text( "AED " + (response.sale_price * multiplier).toFixed(2) );


                                @elseif ( Request::filled('currency') && Request::get('currency') == "sar" )
                                    @php
                                        if (!is_null(App\Model\Currency::where('slug', 'sar')->first())) {
                                            $multiplier = App\Model\Currency::where('slug', 'sar')->first()->price;
                                        }
                                    @endphp
                                    multiplier = {{ $multiplier }};
                                    $("#modal_price").text( "SAR " + (response.sale_price * multiplier).toFixed(2) );


                                @elseif ( Request::filled('currency') && Request::get('currency') == "euro" )
                                    @php
                                        if (!is_null(App\Model\Currency::where('slug', 'euro')->first())) {
                                            $multiplier = App\Model\Currency::where('slug', 'euro')->first()->price;
                                        }
                                    @endphp
                                    multiplier = {{ $multiplier }};
                                    $("#modal_price").text( "EURO " + (response.sale_price * multiplier).toFixed(2) );

                                @else

                                    $("#modal_price").text( "$ " + response.sale_price );

                                @endif
                            }

                            $("#modal_cart").attr('data-id', response.id);
                            $("#modal_wishlist").attr('data-id', response.id);

                            // appending first image item 
                            $("#modal_img_parent").empty();  

                            first_img_item = '<div class="carousel-item active">';
                            first_img_item += '<img class="d-block w-100" src="';
                            first_img_item += '{{ asset("/product") }}/' + response.image;
                            first_img_item += '" alt="Image">';
                            first_img_item += '</div>';

                            $("#modal_img_parent").append(first_img_item);


                            // appending first indicator
                            $("#modal_indicator_parent").empty(); 
                            first_indicator_item = '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';           
                            $("#modal_indicator_parent").append(first_indicator_item);     


                            for (var i = 0; i < response.bulkproducts.length; i++) {

                                indicator_item = '<li data-target="#carouselExampleIndicators" data-slide-to="'+ (i+1) +'"></li>';
                                $("#modal_indicator_parent").append(indicator_item);

                                img_item = '<div class="carousel-item">';
                                img_item += '<img class="d-block w-100" src="{{ asset('/products') }}/'+ response.bulkproducts[i].photo +'"';
                                img_item += '</div>';
                                $("#modal_img_parent").append(img_item);
                            }

                            // key features
                            $("#modal_features").empty();
                            for (var i = 0; i < response.feature.length; i++) {
                                $("#modal_features").append('<li>'+ response.feature[i].name +'</li>');
                            } 
                            // console.log(response.feature[0].name);
                            if(response.feature.length == 0 ||response.feature[0].name == null){
                                $("#modal_features_div").css("display", "none");
                            }else{
                                $("#modal_features_div").css("display", "block");
                            }


                            // bugged 
                            console.log(response.stocks.length);                       
                            if(response.stocks.length == 0 || response.stocks[0].in_qty == response.stocks[0].out_qty || response.stocks[0].in_qty == 0 ){
                                $(".addCart").attr('disabled', true)
                            }else{
                                $(".addCart").removeAttr('disabled')
                            }

                            if(response.product_type == "Software"){
                                $(".status-badge").addClass('d-none');
                            }else{
                                 $(".status-badge").removeClass('d-none');
                            }

                            if (response.stocks.length == 0 || response.stocks[0].in_qty == response.stocks[0].out_qty || response.stocks[0].in_qty == 0) {

                                $(".status-badge__body").addClass("bg-danger text-white");
                                $("#modal_stock").html("<span>Out of stock</span>");
                            }else{
                                $(".status-badge__body").removeClass("bg-danger text-white");
                                $("#modal_stock").html("<span>In stock</span>");
                            }  
                        }
                    }
                });
            });
    </script>

    @if (Session::has('my_success'))
        <script>
            toastr.success( "{{ Session::get('my_success')}}" );
        </script>
    @endif

    <script>

    </script>
</body>

</html>
