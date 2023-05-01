@extends('web.layouts.app')

@section('content')
    <section class="human-organ-categories">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sub-human-organ-categories">
                        <div class="img-human-organ-categories">
                            <img src="{{ asset('storage/' . $bodySystem->img) }}" alt="">
                        </div>
                        <div class="text-human-organ-categories">
                            <h2>{{ $bodySystem->name }} </h2>
                            {!! $bodySystem->desc !!}
                        </div>

                        <div class="sections-human-organ-categories">
                            <h2> {{ __('Body System Organs') }} :</h2>
                            <ul>
                                @foreach ($bodySystem->organs as $organ)
                                    <li><a href=""> {{ $organ->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="video-text">
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/C0DPdy98e4c"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div> --}}
                    </div>
                </div>


                @include('web.includes.side-content')
            </div>
        </div>

    </section>
@endsection
