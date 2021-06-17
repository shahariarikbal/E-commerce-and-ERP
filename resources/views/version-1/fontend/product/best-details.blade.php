@extends('fontend.master')

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
                                <a href="#" class="breadcrumb__item-link">Categories</a>
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
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt=""> </a>
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt=""> </a>
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="product-gallery__thumbnails">
                                        <div class="owl-carousel">
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" class="product-gallery__thumbnails-item" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt="">
                                            </a>
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" class="product-gallery__thumbnails-item" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt="">
                                            </a>
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" class="product-gallery__thumbnails-item" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt="">
                                            </a>
                                            <a href="{{ asset('/product/'.$webProductDetails->image) }}" class="product-gallery__thumbnails-item" target="_blank"><img src="{{ asset('/product/'.$webProductDetails->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product__header">
                                    <h1 class="product__title">{{ $webProductDetails->name }}</h1>
                                    <div class="product__subtitle">
                                        <div class="product__rating">
                                            <div class="product__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product__rating-label">
                                                <a href="#">3.5 on 7 reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product__main">
                                    <div class="product__excerpt">Many philosophical debates that began in ancient times are still debated today. In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge.</div>
                                    <div class="product__features">
                                        <div class="product__features-title">Key Features:</div>
                                        <ul>
                                            <li>Speed: <span>750 RPM</span></li>
                                            <li>Power Source: <span>Cordless-Electric</span></li>
                                            <li>Battery Cell Type: <span>Lithium</span></li>
                                            <li>Voltage: <span>20 Volts</span></li>
                                            <li>Battery Capacity: <span>2 Ah</span>
                                            </li>
                                        </ul>

                                        <div class="product__features-link">
                                            <a href="#">See Full Specification</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product__info">
                                    <div class="product__info-card">
                                        <div class="product__info-body">
                                            <div class="product__prices-stock">
                                                <div class="product__prices">
                                                    <div class="product__price product__price--current">${{ number_format($webProductDetails->price,2) }}</div>
                                                </div>
                                                <div class="status-badge status-badge--style--success product__stock status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__text">In Stock</div>
                                                        <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="In&#x20;Stock"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product__meta">
                                                <table>
                                                    <tr>
                                                        <th>SKU</th>
                                                        <td>{{ $webProductDetails->sku }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <td>
                                                            <a href="#">Brandix</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country</th>
                                                        <td>Japan</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vendor code</th>
                                                        <td>BDX-750Z370-S</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="product-form product__form">
                                            <div class="product-form__body">
                                                <div class="product-form__row">
                                                    <div class="product-form__title">Material</div>
                                                    <div class="product-form__control">
                                                        <div class="input-radio-label">
                                                            <div class="input-radio-label__list">
                                                                <label class="input-radio-label__item"><input type="radio" name="material" class="input-radio-label__input"> <span class="input-radio-label__title">Steel</span>
                                                                </label>
                                                                <label class="input-radio-label__item"><input type="radio" name="material" class="input-radio-label__input"> <span class="input-radio-label__title">Aluminium</span>
                                                                </label>
                                                                <label class="input-radio-label__item"><input type="radio" name="material" class="input-radio-label__input" disabled="disabled"> <span class="input-radio-label__title">Thorium</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-form__row">
                                                    <div class="product-form__title">Color</div>
                                                    <div class="product-form__control">
                                                        <div class="input-radio-color">
                                                            <div class="input-radio-color__list">
                                                                <label class="input-radio-color__item input-radio-color__item--white" style="color: #fff;" data-toggle="tooltip" title="White"><input type="radio" name="color"> <span></span>
                                                                </label>
                                                                <label class="input-radio-color__item" style="color: #ffd333;" data-toggle="tooltip" title="Yellow"><input type="radio" name="color"> <span></span>
                                                                </label>
                                                                <label class="input-radio-color__item" style="color: #ff4040;" data-toggle="tooltip" title="Red"><input type="radio" name="color"> <span></span>
                                                                </label>
                                                                <label class="input-radio-color__item input-radio-color__item--disabled" style="color: #4080ff;" data-toggle="tooltip" title="Blue"><input type="radio" name="color" disabled="disabled"> <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ url('/add-to-cart') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="product__actions">
                                                <div class="product__actions-item product__actions-item--quantity">
                                                    <div class="input-number">
                                                        <input class="input-number__input form-control form-control-lg" type="number" name="qty" min="1" value="1">
                                                        <input class="input-number__input form-control form-control-lg" type="hidden" name="id" value="{{ $webProductDetails->id }}">
                                                        <div class="input-number__add"></div>
                                                        <div class="input-number__sub"></div>
                                                    </div>
                                                </div>

                                                <div class="product__actions-item product__actions-item--addtocart">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add to cart</button>
                                                </div>
                                                <div class="product__actions-divider"></div>
                                                <button class="product__actions-item product__actions-item--wishlist" type="button"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg> <span>Add to wishlist</span>
                                                </button>
                                                <button class="product__actions-item product__actions-item--compare" type="button"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg> <span>Add to compare</span>
                                                </button>
                                            </div>
                                        </form>

                                        <div class="product__tags-and-share-links">
                                            <div class="product__tags tags tags--sm">
                                                <div class="tags__list">
                                                    <a href="#">Brake Kit</a>
                                                    <a href="#">Brandix</a>
                                                    <a href="#">Filter</a>
                                                    <a href="#">Bumper</a>
                                                    <a href="#">Transmission</a>
                                                    <a href="#">Hood</a>
                                                </div>
                                            </div>

                                            <div class="product__share-links share-links">
                                                <ul class="share-links__list">
                                                    <li class="share-links__item share-links__item--type--like"><a href="#">Like</a></li>
                                                    <li class="share-links__item share-links__item--type--tweet"><a href="#">Tweet</a></li>
                                                    <li class="share-links__item share-links__item--type--pin"><a href="#">Pin It</a></li>
                                                    <li class="share-links__item share-links__item--type--counter"><a href="#">4K</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product__shop-features shop-features custom-product-card">
                                        <ul class="shop-features__list">
                                            <li class="shop-features__item">
                                                <div class="block-zone__card category-card category-card--layout--overlay">
                                                    <div class="category-card__body">
                                                        <div class="category-card__overlay-image">
                                                            <img srcset="images/categories/Mask Group 38.png.jpg 530w, images/categories/Mask Group 38.png 305w" src="images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>
                                                        <div class="category-card__overlay-image category-card__overlay-image--blur"><img srcset="images/categories/Mask Group 38.png 530w, images/categories/Mask Group 38.png 305w" src="images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>

                                                        <div class="category-card__content">
                                                            <div class="category-card__info">
                                                                <div class="category-card__name">
                                                                    <a href="category-4-columns-sidebar.html">Spacial Discount For First Three Orders</a>
                                                                </div>
                                                                <ul class="category-card__children"><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li></ul>

                                                                <div class="category-card__actions"><a href="shop-grid-4-columns-sidebar.html" class="btn btn-primary btn-sm">Call Now</a>
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
                                                            <img srcset="images/categories/best-sellers.png 530w, images/categories/Mask Group 38.png 305w" src="images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>
                                                        <div class="category-card__overlay-image category-card__overlay-image--blur"><img srcset="images/categories/best-sellers.png 530w, images/categories/Mask Group 38.png 305w" src="images/categories/Mask Group 38.png" sizes="(max-width: 575px) 530px, 305px" alt="">
                                                        </div>

                                                        <div class="category-card__content">
                                                            <div class="category-card__info">
                                                                <div class="category-card__name">
                                                                    <a href="category-4-columns-sidebar.html">Spacial Discount For First Three Orders</a>
                                                                </div>
                                                                <ul class="category-card__children"><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li><li><a href="category-4-columns-sidebar.html"></a></li></ul>

                                                                <div class="category-card__actions"><a href="shop-grid-4-columns-sidebar.html" class="btn btn-primary btn-sm">Call Now</a>
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
                                            <a href="#product-tab-reviews">Reviews <span class="product-tabs__item-counter">3</span></a>
                                        </li>
                                        <li class="product-tabs__item">
                                            <a href="#product-tab-analogs">Analogs</a>
                                        </li>
                                    </ul>

                                    <div class="product-tabs__content">
                                        <div class="product-tabs__pane product-tabs__pane--active" id="product-tab-description">
                                            <div class="typography">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum, diam non iaculis finibus, ipsum arcu sollicitudin dolor, ut cursus sapien sem sed purus. Donec vitae fringilla tortor, sed fermentum nunc. Suspendisse sodales turpis dolor, at rutrum dolor tristique id. Quisque pellentesque ullamcorper felis, eget gravida mi elementum a. Maecenas consectetur volutpat ante, sit amet molestie urna luctus in. Nulla eget dolor semper urna malesuada dictum. Duis eleifend pellentesque dui et finibus. Pellentesque dapibus dignissim augue. Etiam odio est, sodales ac aliquam id, iaculis eget lacus. Aenean porta, ante vitae suscipit pulvinar, purus dui interdum tellus, sed dapibus mi mauris vitae tellus.</p>

                                                <h4>Etiam lacus lacus mollis in mattis</h4>

                                                <p>Praesent mattis eget augue ac elementum. Maecenas vel ante ut enim mollis accumsan. Vestibulum vel eros at mi suscipit feugiat. Sed tortor purus, vulputate et eros a, rhoncus laoreet orci. Proin sapien neque, commodo at porta in, vehicula eu elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur porta vulputate augue, at sollicitudin nisl molestie eget.</p>
                                                <p>Nunc sollicitudin, nunc id accumsan semper, libero nunc aliquet nulla, nec pretium ipsum risus ac neque. Morbi eu facilisis purus. Quisque mi tortor, cursus in nulla ut, laoreet commodo quam. Pellentesque et ornare sapien. In ac est tempus urna tincidunt finibus. Integer erat ipsum, tristique ac lobortis sit amet, dapibus sit amet purus. Nam sed lorem nisi. Vestibulum ultrices tincidunt turpis, sit amet fringilla odio scelerisque non.</p>
                                            </div>
                                        </div>

                                        <div class="product-tabs__pane" id="product-tab-specification">
                                            <div class="spec">
                                                <div class="spec__section">
                                                    <h4 class="spec__section-title">General</h4>
                                                    <div class="spec__row">
                                                        <div class="spec__name">Material</div>
                                                        <div class="spec__value">Aluminium, Plastic</div>
                                                    </div>

                                                    <div class="spec__row">
                                                        <div class="spec__name">Engine Type</div>
                                                        <div class="spec__value">Brushless</div>
                                                    </div>

                                                    <div class="spec__row">
                                                        <div class="spec__name">Battery Voltage</div>
                                                        <div class="spec__value">18 V</div>
                                                    </div>

                                                    <div class="spec__row">
                                                        <div class="spec__name">Battery Type</div>
                                                        <div class="spec__value">Li-lon</div>
                                                    </div>
                                                    <div class="spec__row">
                                                        <div class="spec__name">Number of Speeds</div>
                                                        <div class="spec__value">2</div>
                                                    </div>
                                                    <div class="spec__row">
                                                        <div class="spec__name">Charge Time</div>
                                                        <div class="spec__value">1.08 h</div>
                                                    </div>

                                                    <div class="spec__row">
                                                        <div class="spec__name">Weight</div>
                                                        <div class="spec__value">1.5 kg</div>
                                                    </div>
                                                </div>

                                                <div class="spec__section">
                                                    <h4 class="spec__section-title">Dimensions</h4>
                                                    <div class="spec__row">
                                                        <div class="spec__name">Length</div>
                                                        <div class="spec__value">99 mm</div>
                                                    </div>

                                                    <div class="spec__row">
                                                        <div class="spec__name">Width</div>
                                                        <div class="spec__value">207 mm</div>
                                                    </div>

                                                    <div class="spec__row">
                                                        <div class="spec__name">Height</div>
                                                        <div class="spec__value">208 mm</div>
                                                    </div>
                                                </div>

                                                <div class="spec__disclaimer">Information on technical characteristics, the delivery set, the country of manufacture and the appearance of the goods is for reference only and is based on the latest information available at the time of publication.</div>
                                            </div>
                                        </div>

                                        <div class="product-tabs__pane" id="product-tab-reviews">
                                            <div class="reviews-view">
                                                <div class="reviews-view__list">
                                                    <div class="reviews-list">
                                                        <ol class="reviews-list__content">
                                                            <li class="reviews-list__item">
                                                                <div class="review"><div class="review__body"><div class="review__avatar"><img src="images/avatars/avatar-1-42x42.jpg" alt=""></div><div class="review__meta"><div class="review__author">Samantha Smith</div><div class="review__date">27 May, 2018</div></div><div class="review__rating"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div></div><div class="review__content typography">Phasellus id mattis nulla. Mauris velit nisi, imperdiet vitae sodales in, maximus ut lectus. Vivamus commodo scelerisque lacus, at porttitor dui iaculis id. Curabitur imperdiet ultrices fermentum.</div></div></div>
                                                            </li>

                                                            <li class="reviews-list__item">
                                                                <div class="review"><div class="review__body"><div class="review__avatar"><img src="images/avatars/avatar-2-42x42.jpg" alt=""></div><div class="review__meta"><div class="review__author">Adam Taylor</div><div class="review__date">12 April, 2018</div></div><div class="review__rating"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div><div class="rating__star"></div></div></div></div><div class="review__content typography">Aenean non lorem nisl. Duis tempor sollicitudin orci, eget tincidunt ex semper sit amet. Nullam neque justo, sodales congue feugiat ac, facilisis a augue. Donec tempor sapien et fringilla facilisis. Nam maximus consectetur diam. Nulla ut ex mollis, volutpat tellus vitae, accumsan ligula.</div></div></div>
                                                            </li>

                                                            <li class="reviews-list__item">
                                                                <div class="review"><div class="review__body"><div class="review__avatar"><img src="images/avatars/avatar-3-42x42.jpg" alt=""></div><div class="review__meta"><div class="review__author">Helena Garcia</div><div class="review__date">2 January, 2018</div></div><div class="review__rating"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div></div></div></div><div class="review__content typography">Duis ac lectus scelerisque quam blandit egestas. Pellentesque hendrerit eros laoreet suscipit ultrices.</div></div></div>
                                                            </li>
                                                        </ol>

                                                        <div class="reviews-list__pagination">
                                                            <ul class="pagination">
                                                                <li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#" aria-label="Previous"><span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11"><path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/></svg></span></a></li>

                                                                <li class="page-item"><a class="page-link" href="#">1</a></li>

                                                                <li class="page-item active" aria-current="page"><span class="page-link">2 <span class="sr-only">(current)</span></span></li>

                                                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                                                <li class="page-item"><a class="page-link" href="#">4</a></li>

                                                                <li class="page-item page-item--dots"><div class="pagination__dots"></div></li>

                                                                <li class="page-item"><a class="page-link" href="#">9</a></li>

                                                                <li class="page-item"><a class="page-link page-link--with-arrow" href="#" aria-label="Next"><span class="page-link__arrow page-link__arrow--right" aria-hidden="true"><svg width="7" height="11"><path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/></svg></span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form class="reviews-view__form">
                                                    <h3 class="reviews-view__header">Write A Review</h3>
                                                    <div class="row">
                                                        <div class="col-xxl-8 col-xl-10 col-lg-9 col-12">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-4"><label for="review-stars">Review Stars</label> <select id="review-stars" class="form-control"><option>5 Stars Rating</option><option>4 Stars Rating</option><option>3 Stars Rating</option><option>2 Stars Rating</option><option>1 Stars Rating</option></select></div>

                                                                <div class="form-group col-md-4"><label for="review-author">Your Name</label> <input type="text" class="form-control" id="review-author" placeholder="Your Name"></div>

                                                                <div class="form-group col-md-4"><label for="review-email">Email Address</label> <input type="text" class="form-control" id="review-email" placeholder="Email Address"></div>
                                                            </div>

                                                            <div class="form-group"><label for="review-text">Your Review</label> <textarea class="form-control" id="review-text" rows="6"></textarea></div>

                                                            <div class="form-group mb-0 mt-4"><button type="submit" class="btn btn-primary">Post Your Review</button></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="product-tabs__pane" id="product-tab-analogs">
                                            <table class="analogs-table">
                                                <thead>
                                                <tr><th class="analogs-table__column analogs-table__column--name">Name</th><th class="analogs-table__column analogs-table__column--rating">Rating</th><th class="analogs-table__column analogs-table__column--vendor">Vendor</th><th class="analogs-table__column analogs-table__column--price">Price</th></tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="analogs-table__column analogs-table__column--name">
                                                        <a href="#" class="analogs-table__product-name">Sunset Brake Kit</a>
                                                        <br><div class="analogs-table__sku" data-title="SKU">SSX-780B390-S</div>
                                                    </td>

                                                    <td class="analogs-table__column analogs-table__column--rating">
                                                        <div class="analogs-table__rating"><div class="analogs-table__rating-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div></div><div class="analogs-table__rating-label">10 Reviews</div></div>
                                                    </td>

                                                    <td class="analogs-table__column analogs-table__column--vendor" data-title="Vendor">Sunset<div class="analogs-table__country">(Germany)</div></td>

                                                    <td class="analogs-table__column analogs-table__column--price">$1259.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="analogs-table__column analogs-table__column--name"><a href="#" class="analogs-table__product-name">Specter Brake Kit</a><br><div class="analogs-table__sku" data-title="SKU">SCT-123A380-S</div></td>

                                                    <td class="analogs-table__column analogs-table__column--rating">
                                                        <div class="analogs-table__rating"><div class="analogs-table__rating-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div></div></div></div><div class="analogs-table__rating-label">34 Reviews</div></div>
                                                    </td>

                                                    <td class="analogs-table__column analogs-table__column--vendor" data-title="Vendor">Specter<div class="analogs-table__country">(China)</div></td>

                                                    <td class="analogs-table__column analogs-table__column--price">$799.00</td>
                                                </tr>

                                                <tr>
                                                    <td class="analogs-table__column analogs-table__column--name"><a href="#" class="analogs-table__product-name">Brake Kit</a><br><div class="analogs-table__sku" data-title="SKU">NNO-120K643-S</div></td>

                                                    <td class="analogs-table__column analogs-table__column--rating">
                                                        <div class="analogs-table__rating"><div class="analogs-table__rating-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div><div class="rating__star"></div></div></div></div><div class="analogs-table__rating-label">7 Reviews</div></div>
                                                    </td>

                                                    <td class="analogs-table__column analogs-table__column--vendor" data-title="Vendor">No Name<div class="analogs-table__country">(China)</div></td>

                                                    <td class="analogs-table__column analogs-table__column--price">$569.00</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="block-space block-space--layout--divider-nl"></div>

                        <div class="block block-products-carousel" data-layout="grid-5">
                            <div class="container">
                                <div class="section-header">
                                    <div class="section-header__body">
                                        <h2 class="section-header__title">Accessories</h2>
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

                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-20-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><div class="product-card__badges"><div class="tag-badge tag-badge--new">new</div></div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$19.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-19-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$199.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-18-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><div class="product-card__badges"><div class="tag-badge tag-badge--sale">sale</div></div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$79.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-17-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$349.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-16-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$51.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-15-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$19.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-14-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$79.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-13-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$41.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-12-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><div class="product-card__badges"><div class="tag-badge tag-badge--sale">sale</div></div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$69.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="block-space block-space--layout--divider-nl"></div>

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

                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-10-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><div class="product-card__badges"><div class="tag-badge tag-badge--sale">sale</div><div class="tag-badge tag-badge--new">new</div><div class="tag-badge tag-badge--hot">hot</div></div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$19.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-6-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$199.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-5-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><div class="product-card__badges"><div class="tag-badge tag-badge--sale">sale</div></div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$79.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-4-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$349.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-3-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$51.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-2-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$19.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-1-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$79.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-8-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$41.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block-products-carousel__column">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--layout--grid">
                                                    <div class="product-card__actions-list"><button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16"><path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3zM3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/></svg>
                                                        </button>

                                                        <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list"><svg width="16" height="16"><path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/></svg></button>

                                                        <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"><svg width="16" height="16"><path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/><path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/><path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/></svg>
                                                        </button>
                                                    </div>

                                                    <div class="product-card__image">
                                                        <a href="product-full.html"><img src="images/products/product-11-245x245.jpg" alt=""></a>

                                                        <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        </div>
                                                    </div>

                                                    <div class="product-card__info">

                                                        <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 140-10440-B</div>

                                                        <div class="product-card__name"><div><div class="product-card__badges"><div class="tag-badge tag-badge--sale">sale</div></div><a href="product-full.html">Brandix Spark Plug Kit ASR-400</a></div></div>

                                                        <div class="product-card__rating">

                                                            <div class="rating product-card__rating-stars"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div>

                                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                                        </div>
                                                    </div>

                                                    <div class="product-card__footer">
                                                        <div class="product-card__prices"><div class="product-card__price product-card__price--current">$69.00</div></div>

                                                        <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart"><svg width="20" height="20"><circle cx="7" cy="17" r="2"/><circle cx="15" cy="17" r="2"/><path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/></svg>
                                                        </button>
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

        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
