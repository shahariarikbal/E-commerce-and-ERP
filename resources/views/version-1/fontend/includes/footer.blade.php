<footer class="site__footer" style="margin-top: 50px;">
    <div class="site-footer">
        <div class="decor site-footer__decor decor--type--bottom">
            <div class="decor__body">
                <div class="decor__start"></div>
                <div class="decor__end"></div>
                <div class="decor__center"></div>
            </div>
        </div>

        <div class="site-footer__widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="site-footer__widget footer-contacts">
                            <h5 class="footer-contacts__title">Follow Us</h5>

                            <div class="footer-contacts__text">We make consolidating. Markating and tracking your ssocial media website easy</div>

                            <div class="footer-newsletter__social-links social-links">
                                <ul class="social-links__list">
                                    <li class="social-links__item social-links__item--facebook"><a href="https://www.facebook.com/diplomacykeys/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-links__item social-links__item--twitter"><a href="https://twitter.com/diplomacykey" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-links__item social-links__item--youtube"><a href="https://www.youtube.com/channel/UCEod3oRZLxhe5VJt4GBWboA" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    <li class="social-links__item social-links__item--instagram"><a href="https://www.instagram.com/diplomacykey/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="site-footer__widget footer-newsletter">
                            <h5 class="footer-newsletter__title">Newsletter Now</h5>

                            <div class="footer-newsletter__text">Enter your email address below to subscribe to our newsletter and keep up to date with discounts.</div>

                            <form action="#" class="footer-newsletter__form"><label class="sr-only" for="footer-newsletter-address">Email Address</label> <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Email Address..."> <button class="footer-newsletter__form-button">Subscribe</button></form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="site-footer__widgets footer-widget-devider">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="site-footer__widget footer-contacts">
                            <h5 class="footer-contacts__title">Contact Info</h5>
                            <div class="footer-contacts__text">Hi, we are always open for cooperation and suggestions, contact us in one of the ways below:</div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('/fontend/') }}/images/icon-phone2.png" class="img-fluid">
                                </div>
                                <div class="col-md-9 custom-link-color">
                                    <h6>Hotline Free 24/7:<br><a href="#"><span>+971566668084</span></a></h6>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-xl-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">Information</h5>

                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="{{ url('/about/us') }}" class="footer-links__link">About Us</a></li>
                                <li class="footer-links__item"><a href="{{ url('/software') }}" class="footer-links__link">Software</a></li>
                                <li class="footer-links__item"><a href="{{ url('/offers') }}" class="footer-links__link">Offers</a></li>
                                <li class="footer-links__item"><a href="{{ url('/supper/deals') }}" class="footer-links__link">Super Deals</a></li>
                                <li class="footer-links__item"><a href="{{ url('/software') }}" class="footer-links__link">Downloads</a></li>
                                <li class="footer-links__item"><a href="{{ url('/contact/us') }}" class="footer-links__link">Contact Us</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    @foreach($webCategories->chunk(10) as $webCategory)
                    <div class="col-6 col-md-3 col-xl-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">Categories</h5>
                                <div class="row">
                                    <ul class="footer-links__list">
                                        @foreach($webCategory as $data)
                                        <li class="footer-links__item" style="margin-left: 10px;"><a href="{{ url('/category/wish/product/'.$data->cat_id) }}" class="footer-links__link">{{ $data->category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-6 col-md-3 col-xl-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">Tags</h5>
                            <ul class="footer-links__list">
                                @foreach($countries as $tags)
                                <li class="footer-links__item">
                                    <a href="{{ url('/country/wise/products/'.$tags->id.'/'.$tags->name) }}" class="footer-links__link">{{ isset($tags->name) ? $tags->name : '' }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>




        <div class="site-footer__bottom"><div class="container"><div class="site-footer__bottom-row"><div class="site-footer__copyright"><!-- copyright --> All Right Reseved By Diplomacy Key. <a href="#" target="_blank"></a><!-- copyright / end --></div><div class="site-footer__payments"><img src="{{ asset('/fontend/') }}/images/payments.png" alt=""></div></div></div></div></div></footer>
