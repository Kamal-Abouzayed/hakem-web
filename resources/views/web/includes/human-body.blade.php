<div class="human-body mr-section">
    <div class="title-start">
        <h2>{{ __('Organs of The Human Body') }}</h2>
        <span></span>
    </div>
    <div class="main-human-body">
        <div class="sub-human-body">
            <ul>
                @foreach ($bodySystemsChunks[0] as $chunk)
                    <li>
                        <a
                            href="{{ route('web.body-system', ['sectionSlug' => request()->sectionSlug, 'bodySystemSlug' => $chunk->slug]) }}">
                            <div class="img-sub-human-body">
                                <img src="{{ asset('storage/' . $chunk->img) }}" alt="{{ $chunk->name }}">
                            </div>
                            <h3> {{ $chunk->name }} </h3>
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="img-humen-body">
            <img src="{{ url('web') }}/images/body.png" alt="">
        </div>
        <div class="sub-human-body humun2">
            <ul>

                @foreach ($bodySystemsChunks[1] as $chunk)
                    <li>
                        <a
                            href="{{ route('web.body-system', ['sectionSlug' => request()->sectionSlug, 'bodySystemSlug' => $chunk->slug]) }}">
                            <div class="img-sub-human-body">
                                <img src="{{ asset('storage/' . $chunk->img) }}" alt="{{ $chunk->name }}">
                            </div>
                            <h3> {{ $chunk->name }} </h3>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
