@extends('version-1.fontend.master')

@section('content')
    <div>
        <div class="block-header block-header--has-breadcrumb block-header--has-title">
            <div class="container">
                <div class="block-header__body">
                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                                <a href="{{ url('/') }}" class="breadcrumb__item-link">Home</a>
                            </li>

                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                                <span class="breadcrumb__item-link">Contact Us</span>
                            </li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Contact Us</h1>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="container container--max--lg">
                <div class="card"><div class="card-body card-body--padding--2">
                        <div class="row">
                            <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                <div class="mr-1">
                                    <h4 class="contact-us__header card-title">Our Address</h4>
                                    <div class="contact-us__address">
                                        <p>{!! $contacts->note ? $contacts->note : '' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="ml-1">
                                    <h4 class="contact-us__header card-title">Leave us a Message</h4>
                                    <form method="POST" action="{{ url('/client/message') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">Your Name</label>
                                                <input type="text" id="form-name" name="name" class="form-control" placeholder="Your Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">Email</label>
                                                <input type="email" id="form-email" name="email" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">Subject</label>
                                            <input type="text" id="form-subject" name="subject" v-model="subject" class="form-control" placeholder="Subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">Message</label>
                                            <textarea id="form-message" name="message" v-model="message" class="form-control" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
            <div class="block-map block">
                <div class="block-map__body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28850.604784715342!2d55.406702!3d25.326853!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc5ea7ee9308f1032!2sDiplomacy%20keys%20%26%20Locks%20TR.LLC!5e0!3m2!1sen!2sae!4v1611738364846!5m2!1sen!2sae" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </div>
@endsection
