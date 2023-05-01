<div class="stages-pregnancy mr-section">
    <div class="title-start">
        <h2>{{ __('Pregnancy Stages') }} </h2>
        <span></span>
    </div>

    <div class="main-stages-pregnancy">
        <div class="row">

            {{-- {{ dd($pregnancyStages) }} --}}

            @foreach ($pregnancyStages as $stage)
                <div class="col-lg-4">
                    <a
                        href="{{ route('web.pregnancy-stage', ['sectionSlug' => request()->sectionSlug, 'slug' => $stage->slug]) }}">
                        <div class="sub-stages-pregnancy">
                            <img src="{{ asset('storage/' . $stage->img) }}" alt="{{ $stage->name }}">
                            <h2>{{ $stage->name }}</h2>
                        </div>
                    </a>
                    <div class="month-stages-pregnancy">
                        <ul>
                            @foreach ($stage->children as $child)
                                <li> <a
                                        href="{{ route('web.pregnancy-stage', ['sectionSlug' => request()->sectionSlug, 'slug' => $stage->slug]) }}">
                                        {{ $child->name }} </a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
