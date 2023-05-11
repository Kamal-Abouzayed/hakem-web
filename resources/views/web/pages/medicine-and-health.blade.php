<section class="categories-medicine-health">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="text-categories-medicine-health">
                    <div class="title-categories-medicine">
                        <h2> {{ $category->name }} </h2>
                        <p>{!! $category->desc !!}</p>
                    </div>

                    <div class="silder-categories-medicine">
                        <div class="owl-carousel owl-theme maincarousel" id="slider-categories">

                            @foreach ($category->articles as $article)
                                <div class="item">
                                    <a
                                        href="{{ route('web.article-details', ['sectionSlug' => request()->sectionSlug, 'slug' => $article->slug]) }}">
                                        <div class="sub-silder-categories">
                                            <div class="img-silder-categories">
                                                <img src="{{ asset('storage/' . $article->img) }}" alt="">
                                            </div>
                                            <div class="text-silder-categories">
                                                <h2>{{ $article->name }}</h2>
                                                <p>{!! strip_tags(Str::limit($article->desc, 50)) !!}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- @foreach ($category->articles as $article)
                        <div class="col-lg-3" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                            <a
                                href="{{ route('web.article-details', ['sectionSlug' => request()->sectionSlug, 'slug' => $article->slug]) }}">
                                <div class="sub-health-beaut">
                                    <div class="img-health-beaut">
                                        <img src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->name }}">
                                    </div>
                                    <div class="text-health-beaut">
                                        <h2>{{ $article->name }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach --}}




                    @if ($section->advices->isNotEmpty())
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
                    @endif

                </div>
            </div>

            @include('web.includes.side-content')
        </div>
    </div>
</section>
