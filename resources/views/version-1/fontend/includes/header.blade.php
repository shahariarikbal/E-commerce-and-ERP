<header class="site__mobile-header">
    <div class="mobile-header">
        <div class="container">
            <div class="mobile-header__body">
                <button class="mobile-header__menu-button" type="button">
                    <svg width="18px" height="14px">
                        <path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z"/>
                    </svg>
                </button> <a class="mobile-header__logo" href="{{ url('/') }}">
                    <!-- mobile-logo -->
                    <img src="{{ asset('/fontend/') }}/images/brand/logo.png" style="
						    width: 70%;
						">
                    <!-- mobile-logo / end -->
                </a>

                <div class="mobile-header__search mobile-search">
                    <form class="mobile-search__body">
                        <input type="text" class="mobile-search__input" name="search" id="mobileSearch" placeholder="Enter keyword or part number">
                        <button type="button" class="mobile-search__vehicle-picker" aria-label="Select Vehicle">
                            <svg width="20" height="20">
                                <path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
                                    c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
                                    C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
                                    c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
                                    c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
                                    C15.5,10.2,14,11.3,14,12z"/>
                            </svg>
                            <span class="mobile-search__vehicle-picker-label">Vehicle</span>
                        </button>
                        <button type="submit" class="mobile-search__button mobile-search__button--search"><svg width="20" height="20"><path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/></svg>
                        </button>
                        <button type="button" class="mobile-search__button mobile-search__button--close"><svg width="20" height="20"><path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3
	C17.1,15.7,17.1,16.3,16.7,16.7z"/></svg>
                        </button>
                        <div class="mobile-search__field"></div>
                        <div class="search__dropdown search__dropdown--suggestions suggestions">
                            <div class="suggestions__group">
                                <div class="suggestions__group-title">Products</div>
                                <div id="mobile_product_list"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mobile-header__indicators">
                    <div class="mobile-indicator mobile-indicator--search d-md-none">
                        <button type="button" class="mobile-indicator__button">
				<span class="mobile-indicator__icon">
					<svg width="20" height="20">
						<path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
					</svg>
				</span>
                        </button>
                    </div>
                    <div class="mobile-indicator d-none d-md-block">
                        <a href="#" class="mobile-indicator__button">
				<span class="mobile-indicator__icon">
					<svg width="20" height="20">
						<path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
	c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/>
					</svg>
				</span>
                        </a>
                    </div>
                    <div class="mobile-indicator d-none d-md-block">
                        <a href="" class="mobile-indicator__button">
				<span class="mobile-indicator__icon">
					<svg width="20" height="20">
						<path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
	c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"/>
					</svg>
				</span>
                        </a>
                    </div>
                    <div class="mobile-indicator">
                        <a href="{{ url('/show-cart-products') }}" class="mobile-indicator__button">
				<span class="mobile-indicator__icon">
					<svg width="20" height="20">
						<circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/>
						<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
					</svg>
					<span class="mobile-indicator__counter">{{ Cart::count() }}</span>
				</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- site__mobile-header / end -->

<!-- site__header -->
<header class="site__header">
    <div class="header">
        <div class="header__megamenu-area megamenu-area"></div>
        <div class="header__topbar-start-bg"></div>
        <div class="header__topbar-start">
            <div class="topbar topbar--spaceship-start">
                <div class="topbar__item-text">
                    <a href="{{ url('/about/us') }}" class="topbar__link">About Us</a>
                </div>
                <div class="topbar__item-text">
                    <a href="{{ url('/contact/us') }}" class="topbar__link">Contacts</a>
                </div>
                <div class="topbar__item-text">
                    <a class="topbar__link" href="#">Track Order</a>
                </div>
            </div>
        </div>

        <div class="header__topbar-end-bg"></div>
        <div class="header__topbar-end" style="
    z-index: 99999;
">
            <div class="topbar topbar--spaceship-end">

                <div class="topbar__item-button">
                    <a href="#" class="topbar__button">
                        <span class="topbar__button-label">
                            <i class="far fa-envelope"></i> admin@diplomacykey.com
                        </span>

                    </a>
                </div>

                <div class="topbar__menu">
                    <button class="topbar__button topbar__button--has-arrow topbar__menu-button" type="button">
                        <span class="topbar__button-label">Language:</span>
                        <span class="topbar__button-title">EN</span>
                        <span class="topbar__button-arrow">
								<svg width="7px" height="5px"><path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z"/>
								</svg>
							</span>
                    </button>
                    <div class="topbar__menu-body">
                        <a class="topbar__menu-item" href="#">
                            <img src="{{ asset('/fontend/') }}/images/languages/language-1.png" alt="">
                            <span>English</span>
                        </a>
                        {{--                        <a class="topbar__menu-item" href="#">--}}
                        {{--                            <img src="images/languages/language-2.png" alt="">--}}
                        {{--                            <span>French</span>--}}
                        {{--                        </a>--}}
                        {{--                        <a class="topbar__menu-item" href="#">--}}
                        {{--                            <img src="images/languages/language-3.png" alt="">--}}
                        {{--                            <span>German</span>--}}
                        {{--                        </a>--}}
                        {{--                        <a class="topbar__menu-item" href="#">--}}
                        {{--                            <img src="images/languages/language-4.png" alt="">--}}
                        {{--                            <span>Russian</span>--}}
                        {{--                        </a>--}}
                        {{--                        <a class="topbar__menu-item" href="#">--}}
                        {{--                            <img src="images/languages/language-5.png" alt="">--}}
                        {{--                            <span>Italian</span>--}}
                        {{--                        </a>--}}
                    </div>
                </div>
{{--                 <div class="topbar__menu">
                    <button class="topbar__button topbar__button--has-arrow topbar__menu-button" type="button">
                        <span class="topbar__button-label">Currency:</span>
                        <span class="topbar__button-title">USD</span>
                        <span class="topbar__button-arrow">
								<svg width="7px" height="5px"><path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z"/>
								</svg>
							</span>
                    </button>
                    <div class="topbar__menu-body">
                        <a class="topbar__menu-item" href="{{ url('/') }}">
                            <img src="{{ asset('/fontend/') }}/images/languages/language-1.png" alt="">
                            <span>USD</span>
                        </a>
                        <a class="topbar__menu-item" href="#">
                            <img src="" alt="">
                            <span></span>
                        </a>
                        <a class="topbar__menu-item" href="{{ url('/aed') }}">
                            <img src="{{ asset('/fontend/') }}/images/languages/language-2.png" alt="">
                            <span>AED</span>
                        </a>
                        <a class="topbar__menu-item" href="{{ url('/sar') }}">
                            <img src="{{ asset('/fontend/') }}/images/languages/language-3.png" alt="">
                            <span>SAR</span>
                        </a>
                        <a class="topbar__menu-item" href="{{ url('/euro') }}">
                            <img src="{{ asset('/fontend/') }}/images/languages/language-4.png" alt="">
                            <span>EURO</span>
                        </a>
                    </div>
                </div> --}}

            </div>
        </div>
        <div class="header__navbar">

            <div class="header__navbar-menu custom-navbar-menu custom-mega-menu">
                <div class="main-menu">
                    <ul class="main-menu__list">
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">

                            <div class="indicator indicator--trigger--click">
                                <a href="#" class="indicator__button main-menu__link custom-dropcart-btn">
                                    Car Brands
                                </a>

                                <div class="indicator__content custom-indi-content">
                                    <div class="dropcart custom-dropcart-1">
                                        <ul class="dropcart__list custom-cat-left custom-ul-gap">
                                            @foreach($webBrands as $webBrand)
                                                <li class="dropcart__item cust-drop-item-2">
                                                    <div class="dropcart__item-image cust-drop-img">
                                                        <a href="{{ url('/car/brand/'.$webBrand->id) }}">
                                                            <img src="{{ asset('/brand/'.$webBrand->image) }}" class="img-fluid" style="width: 800px; height: auto" alt="">
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">

                            <div class="indicator indicator--trigger--click">
                                <a href="#" class="indicator__button main-menu__link custom-dropcart-btn">
                                    Manufacturers
                                </a>

                                <div class="indicator__content custom-indi-content">
                                    <div class="dropcart custom-dropcart" style="height: 600px; background-color:#f0f0f0;">
                                        <ul class="dropcart__list custom-cat-left custom-ul-gap-1">
                                            @foreach($webManufacturers as $webManufacturer)
                                                <li class="dropcart__item cust-drop-item">
                                                    <div class="dropcart__item-image cust-drop-img">
                                                        <a href="{{ url('/cat/manufacture/'.$webManufacturer->id) }}">
                                                            <img src="{{ asset('/manufacture/'.$webManufacturer->image) }}" class="img-fluid" style="width: 900px; height: auto" alt="">
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">

                            <div class="indicator indicator--trigger--click">
                                <a href="#" class="indicator__button main-menu__link custom-dropcart-btn">
                                    Categories
                                </a>

                                <div class="indicator__content custom-indi-content-t-gap">
                                    <div class="dropcart" style="height: 600px; width: 3000%; background-color:#f0f0f0;">
                                        <ul class="dropcart__list custom-ul-gap-2">
                                            @foreach($webCategories as $webCategory)
                                            <li class="dropcart__item" style="height: 200px;">
                                                <div class="dropcart__item-image">
                                                    <a href="{{ url('/category/wish/product/'.$webCategory->cat_id) }}">
                                                        <img src="{{ asset('/category/'.$webCategory->image) }}" class="img-fluid" alt="">
                                                        <p>{{ $webCategory->category->name }}</p>
                                                    </a>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/software') }}" class="main-menu__link">Software</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header__logo"><a href="{{ url('/') }}" class="logo">
                <div class="logo__slogan"> Auto Electronic Keys Solution </div>
                <div class="logo__image">
                    <!-- logo -->
                    <img src="{{ asset('/fontend/') }}/images/logo.png" class="img-fluid">
                    <!-- logo / end -->
                </div></a>
        </div>

        <div class="header__indicators">
            <div class="header__navbar-menu custom-navbar-menu">
                <div class="main-menu">
                    <ul class="main-menu__list">
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/new/arrival') }}" class="main-menu__link">New Arrival</a>
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/best/seller') }}" class="main-menu__link">Best Sellers</a>
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/offers') }}" class="main-menu__link">Offers</a>
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/supper/deals') }}" class="main-menu__link">Super Deals</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<header class="site__header custom-header">
    <div class="header">
        <div class="header__megamenu-area megamenu-area"></div>
        <div class="header__topbar-start custom-bottom-bar">
            <div class="header__navbar-menu custom-mega-menu">
                <div class="main-menu custom-header-button-bg">
                    <ul class="main-menu__list">
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/videos') }}"><button _ngcontent-serverapp-c93="" type="button" class="section-header__groups-button"> Videos </button></a>
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="{{ url('/downloads') }}"><button _ngcontent-serverapp-c93="" type="button" class="section-header__groups-button"> Downloads </button></a>
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                <a href="{{ url('/top/rated') }}"><button _ngcontent-serverapp-c93="" type="button" class="section-header__groups-button"> Top Rated </button></a>   
                        </li>
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="#"><button _ngcontent-serverapp-c93="" type="button" class="section-header__groups-button"> Account </button></a>
                            <div class="main-menu__submenu">
                                <ul class="menu">
                                    <li class="menu__item">
                                        <a href="{{ url('/checkout') }}" class="menu__link">LOGIN</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header__topbar-end custom-bottom-bar custom-bottom-bar-btn">
            <div class="topbar topbar--spaceship-end">

                <div class="topbar__menu">
                    <div class="header__navbar-menu">
                        <div class="main-menu">
                            <ul class="main-menu__list">
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="{{ url('/free/shipping') }}"><button _ngcontent-serverapp-c93="" type="button" class="section-header__groups-button"> Free Express Shipping </button></a>
                                </li>
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                        <div class="topbar__menu">
                                            <button class="topbar__button topbar__button--has-arrow topbar__menu-button section-header__groups-button" type="button">
                                                <span class="topbar__button-label">Currency:</span> 
                                                <span class="topbar__button-title" style="text-transform: uppercase;">@php
                                                    if (Request::filled('currency')) {
                                                        echo Request::get('currency');
                                                    } else {
                                                        echo "USD";
                                                    }
                                                @endphp</span> 
                                                <span class="topbar__button-arrow">
                                                    <svg width="7px" height="5px"><path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z"/>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div class="topbar__menu-body">
                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('usd').submit()">
                                                    <img src="{{ asset('fontend/images/languages/language-1.png') }}" alt="">
                                                    <span>USD</span> 
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="usd">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                </form>
                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('aed').submit()">
                                                    <img src="{{ asset('fontend/images/languages/language-2.png') }}" alt="">
                                                    <span>AED</span> 
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="aed">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <input type="hidden" name="currency" value="aed">
                                                </form>
                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('sar').submit()">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <img src="{{ asset('fontend/images/languages/language-3.png') }}" alt="">
                                                    <span>SAR</span> 
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="sar">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <input type="hidden" name="currency" value="sar">
                                                </form>
                                                <a class="topbar__menu-item" href="#" onclick="event.preventDefault();document.getElementById('euro').submit()">
                                                    <img src="{{ asset('fontend/images/languages/language-4.png') }}" alt="">
                                                    <span>EURO</span> 
                                                </a>
                                                <form action="{{ Request::url() }}" class="d-none" id="euro">
                                                    @if (Request::has('search'))
                                                        <input type="hidden" name="search" value="{{ Request::get('search') }}">
                                                    @endif
                                                    <input type="hidden" name="currency" value="euro">
                                                </form>
                                            </div>
                                        </div>  
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu custom-cart-icon">
                                    <div class="indicator indicator--trigger--click custom-hov-col">
                                        <a href="#" class="indicator__button">
											<span class="indicator__icon">
												<svg width="32" height="32"><circle cx="10.5" cy="27.5" r="2.5"/><circle cx="23.5" cy="27.5" r="2.5"/><path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z"/>
												</svg>
												<span class="indicator__counter" id="totalItems">{{ Cart::count() }}</span>
											</span>
                                        </a>

                                        <div class="indicator__content">
                                            <div class="dropcart">
                                                <ul class="dropcart__list">
                                                    @php($total = 0)
                                                    @php($sum = 0)
                                                    @foreach($cartProducts as $data)
                                                        <li class="dropcart__item">
                                                            <div class="dropcart__item-image">
                                                                <a href="#">
                                                                    @if($data->options->image)
                                                                    <img src="{{ asset('/product/'.$data->options->image) }}" style="height: 50px; width: 50px;" alt="">
                                                                    @endif
                                                                </a>
                                                            </div>

                                                            <div class="dropcart__item-info">
                                                                <div class="dropcart__item-name">
                                                                    <a href="#" style="text-transform: capitalize">{{ $data->name }}</a>
                                                                </div>

                                                                <div class="dropcart__item-meta">
                                                                    <div class="dropcart__item-price">${{$total = $data->qty * $data->price }}</div>
                                                                </div>
                                                            </div>

                                                            <a href="{{ url('/cart/product/delete/'.$data->rowId) }}" type="button" class="dropcart__item-remove">
                                                                <svg width="10" height="10"><path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4C9.2,7.8,9.2,8.4,8.8,8.8z"/>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <?php $sum = $sum+$total; ?>
                                                    @endforeach
                                                    <li class="dropcart__divider" role="presentation"></li>
                                                </ul>
                                                <div class="dropcart__totals">
                                                    <table>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>${{ number_format($sum, 2) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Total</th>
                                                            <td>${{ number_format($sum, 2) }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="dropcart__actions">
                                                    <a href="{{ url('/show-cart-products') }}" class="btn btn-secondary">View Cart</a>
                                                    <a href="{{ url('/show-cart-products') }}" class="btn btn-primary">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="header__search">
            <div class="search">

                <form action="{{ url('/search') }}" class="search__body" method="GET">
                    <div class="search__shadow"></div>
                    @if (Request::has('currency'))
                        <input type="hidden" name="currency" value="{{ Request::get('currency') }}">
                    @endif
                    <input class="search__input" type="text" name="search" id="product" placeholder="Enter Keyword or Part Number">
                    <button class="search__button search__button--start" type="submit">

                <span class="search__button-icon">
                    <svg width="20" height="20"><path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0C15.5,10.2,14,11.3,14,12z"/>
                    </svg>
                </span>
                        <span class="search__button-title">Select Vehicle</span>
                    </button>
                    <button class="search__button search__button--end" type="submit">
                <span class="search__button-icon">
                    <svg width="20" height="20"><path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                    </svg>
                </span>
                    </button>
                    <div class="search__box"></div>
                    <div class="search__decor">
                        <div class="search__decor-start"></div>
                        <div class="search__decor-end"></div>
                    </div>
                    <div class="search__dropdown search__dropdown--suggestions suggestions" style="height: 650px; overflow-y: hidden">
                        <div class="suggestions__group">
                            <div class="suggestions__group-title">Products</div>
                                <div id="product_list"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#product').on('keyup',function() {
                var query = $(this).val();
                $.ajax({

                    url:"{{ url('product/search') }}",

                    type:"GET",

                    data:{'search':query},

                    success:function (data) {
                        //console.log(data);
                        $('#product_list').html(data);
                    }
                })
                // end of ajax call
            });

            $('#mobileSearch').on('keyup',function() {
                var query = $(this).val();
                $.ajax({

                    url:"{{ url('product/mobile/search') }}",

                    type:"GET",

                    data:{'search':query},

                    success:function (data) {
                        //console.log(data);
                        $('#mobile_product_list').html(data);
                    }
                })
                // end of ajax call
            });


            // $(document).on('click', 'li', function(){
            //
            //     var value = $(this).text();
            //     $('#country').val(value);
            //     $('#country_list').html("");
            // });
        });
    </script>
</header><!-- site__header / end -->
