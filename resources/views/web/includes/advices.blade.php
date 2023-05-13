@if ($section->advices->isNotEmpty())
    <div class="col-12">
        <div class="silder-advice">
            <div class="title-silder-advice">
                <h2> {{ __('Hakem Web Advice') }} :</h2>
            </div>
            <div class="owl-carousel owl-theme maincarousel" id="slider-advice">
                @foreach ($section->advices as $advice)
                    <div class="item">
                        <div class="sub-silder-advice">
                            <p>{!! $advice->desc !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
