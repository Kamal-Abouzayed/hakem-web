<!-- start diseases  ===== -->
<section class="diseases">
    <div class="main-container">
        <div class="title-start">
            <h2>{{ $category->name }}</h2>
            <span></span>
        </div>

        @include('web.includes.diseases-search-field')

        <div class="main-diseases">
            <div class="row">

                <div class="col-lg-12">
                    <p class="category-desc">
                        {!! $category->desc !!}
                    </p>
                </div>

                @foreach ($category->articles as $article)
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
                @endforeach

                {{--
                <div class="col-lg-12">
                    <div class="btn-health-beauty">
                        <a href="" class="ctm-link"> المزيد <i class="bi-arrow-left"></i></a>
                    </div>
                </div> --}}

                @include('web.includes.advices')

            </div>
        </div>

    </div>
</section>

<!-- end diseases  ===== -->
