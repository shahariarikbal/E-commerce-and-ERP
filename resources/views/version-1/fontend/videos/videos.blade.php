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
                                <span class="breadcrumb__item-link">Videos</span>
                            </li>

                            <li class="breadcrumb__title-safe-area" role="presentation"></li>
                        </ol>
                    </nav>

                    <h1 class="block-header__title">Videos</h1>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="container">
                <div class="row">
                    @foreach($videos as $video)
                    <div class="col-md-3">
                        <iframe width="280" height="160" src="https://www.youtube.com/embed/{{$video->code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>{{ $video->name }}</h6>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="category-card__actions custom-button-align"><a href="#" class="btn btn-primary btn-sm">Load More Videos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection
