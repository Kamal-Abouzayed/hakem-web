@extends('web.layouts.app')

@section('paging')
    <div class="navigation-header">
        <a href="{{ route('web.home') }}"> <i class="bi bi-house-door"></i> {{ __('Home') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <a href="{{ route('web.videos') }}"> {{ __('Videos') }} </a>
        <i class="bi bi-chevron-double-left"></i>
        <span>{{ $video->name }} </span>
    </div>
@endsection

@section('content')
    @php
        $url = $video->url;
        $url_components = parse_url($url);
        if (array_key_exists('query', $url_components)) {
            parse_str($url_components['query'], $params);
            $key = $params['v'];
        } else {
            $key = str_replace('/', '', $url_components['path']);
        }
    @endphp
    <section class="video-details">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-video-details">
                        <div class="video-text">
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $key }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="text-video-text">
                            {!! $video->desc !!}
                        </div>

                        <div class="share-article">
                            <h3><i class="bi bi-share"></i> {{ __('Share') }} : </h3>

                            {!! $share !!}

                            {{-- <ul>
                                <li><a href=""><img src="images/facebook-logo.png" alt=""></a></li>
                                <li><a href=""><img src="images/twitter.png" alt=""></a></li>
                                <li><a href=""><img src="images/instagram.png" alt=""></a></li>
                                <li><a href=""><img src="images/Snapchat.png" alt=""></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>


                @include('web.includes.article-side-content')
            </div>
        </div>
    </section>

    @push('js')
        {{-- <script src="{{ asset('admin/js/custom/custom-toc.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/share.js') }}"></script>
    @endpush
@endsection
