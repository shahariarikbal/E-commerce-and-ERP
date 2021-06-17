@extends('version-1.fontend.master')

@section('content')
    <div>
        <div class="about">
            <div class="about__body">
                <div class="about__image">
                    <div class="about__image-bg" style="background-image: url('{{ asset('/fontend/') }}/images/about-banner.jpg');"></div>

                    <div class="decor about__image-decor decor--type--bottom">
                        <div class="decor__body">
                            <div class="decor__start"></div>
                            <div class="decor__end"></div>
                            <div class="decor__center"></div>
                        </div>
                    </div>
                </div>

                <div class="about__card">
                    <div class="about__card-title">About Us</div>
                    <div class="about__card-text">
                        <span>{!! $abouts->note !!}</span>
                    </div>
                    <div class="about__card-author">Diplomacy Key, CEO Diplomacy Key</div>
                    <div class="about__card-signature">
                        <img src="{{ asset('/fontend/') }}/images/signature.jpg" width="160" height="55" alt="">
                    </div>
                </div>
                <div class="about__indicators">
                    <div class="about__indicators-body">
                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">350</div>
                            <div class="about__indicators-item-title">Stores around the world</div>
                        </div>

                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">80 000</div>
                            <div class="about__indicators-item-title">Original auto parts</div>
                        </div>

                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">5 000</div>
                            <div class="about__indicators-item-title">Satisfied customers</div>
                        </div>
                    </div>
                    <div class="about__indicators-body">
                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">350</div>
                            <div class="about__indicators-item-title">Stores around the world</div>
                        </div>

                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">80 000</div>
                            <div class="about__indicators-item-title">Original auto parts</div>
                        </div>

                        <div class="about__indicators-item">
                            <div class="about__indicators-item-value">5 000</div>
                            <div class="about__indicators-item-title">Satisfied customers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-space block-space--layout--divider-xl"></div>
        <div class="block block-teammates">
            <div class="container container--max--xl">
                <div class="block-teammates__title">Professional Team</div>
                <div class="block-teammates__subtitle">Meet this is our professional team.</div>
                <div class="block-teammates__list">
                    <div class="owl-carousel">
                        @foreach($teams as $team)
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="{{ asset('/team/'.$team->avatar) }}" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">{{ $team->name }}</div>
                                <div class="teammate__position">{{ $team->designation }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="block-space block-space--layout--divider-xl"></div>

        <div class="block block-reviews">
            <div class="container">
                <div class="block-reviews__title">Testimonials</div>
                <div class="block-reviews__subtitle">During our work we have accumulated<br>hundreds of positive reviews.</div>
                <div class="block-reviews__list">
                    <div class="owl-carousel">
                        @foreach($testimonials as $testimonial)
                        <div class="block-reviews__item">
                            <div class="block-reviews__item-avatar">
                                <img src="{{ asset('/testimonial/'.$testimonial->avatar) }}" alt="">
                            </div>

                            <div class="block-reviews__item-content">
                                <div class="block-reviews__item-text">{{ $testimonial->note }}</div>

                                <div class="block-reviews__item-meta">
                                    <div class="block-reviews__item-author">{{ $testimonial->designation }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
