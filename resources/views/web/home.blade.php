@extends('web.layouts.app')

@section('content')
    <!-- start main-slider
                                             ================ -->
    <section class="main-slider">
        <div class="container">
            <div class="row">
                <div class="col-12" data-scroll>
                    <div class="first-company">
                        <img src="{{ url('web') }}/images/main/first.svg" alt="first">

                    </div>
                    <div class="main-slider-content">

                        @foreach ($products as $product)
                            <!--start item-->
                            <div class="main-item">
                                <div class="slider-caption bold-text">
                                    {{-- <h3 class="dark-text">خزانات مياه</h3> --}}
                                    <p class="first_color">
                                        {{ $product->title }}
                                    </p>
                                </div>
                                <div class="main-slider-img">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" />
                                </div>
                            </div>
                            <!--end item-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end main slider-->

    {{-- <!-- start about-sec
                                         ================ -->
    <section class="about-sec margin-div has_border_top">
        <div class="pattern" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-50"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="about-desc-grid col-lg-6 col-md-9 order-md-1 order-2" data-scroll data-scroll-speed="1">
                    <div class="about-desc" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-1">
                        <h2 class="first_color bold-text">من نحن</h2>
                        <div>
                            يُعد مصنع إبراهيم الحسيني أول مصنع خزانات مياه فايبرجلاس وبولي إيثيلين في
                            المملكة، والذي كان له دور فعّال في تغيير مفهوم الخزانات آنذاك من الخزانات
                            الخرسانية إلى الخزانات الصحيّة والتي تتميز بسهولة تركيبها ونقلها.
                            <br>
                            كما تتميز خزانات الحسيني بقوتها وصلابتها حيث تنفرد بأعلى سماكة في المملكة، مما
                            يمنحها عمر افتراضي أطول مقارنة بمثيلاتها في الأسواق، قارن بنفسك قبل الشراء
                            فالفرق واضح.
                            كما ينتج مصنع الحسيني للبلاستيك حواجز الطرق البلاستيكية وهي البديل الآمن للحواجز
                            الخرسانية بالإضافة إلى أغطية غرف التفتيش والمصنعة من الفايبرجلاس.
                        </div>
                    </div>
                </div>
                <div class="about-desc-logo col-lg-6 col-md-3 text-left-dir  order-md-1 order-1" data-scroll
                    data-scroll-speed="1">
                    <div class="about-logo text-right-dir">
                        <div class="first-company big-first" data-scroll data-scroll-direction="horizontal"
                            data-scroll-speed="3">

                            <img src="images/main/first.svg" alt="first">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end about-sec-->
    <!-- start products
                                         ================ -->
    <section class="products  has_border_top  sm-center" id="products-scroll">
        <div class="pattern" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-50"></div>
        <div class="container">
            <div class="col-12 text-center">
                <h2 class="section-title first_color bold-text" data-scroll>منتجاتنا</h2>
            </div>
            <div class="row">

                <!--start products-grid-->
                <div class="products-grid col-6">
                    <a href="product-details.html">
                        <div class="products-div" data-scroll>
                            <h3 class="first_color bold-text" data-scroll data-scroll-speed="-1.2">
                                خزانات مياه
                                <br>
                                بولي إيثيلين
                            </h3>
                            <div data-scroll data-scroll-speed="-2"><img src="images/products/1.png" alt="product">
                            </div>
                        </div>
                    </a>
                </div>
                <!--end products-grid-->

                <!--start products-grid-->
                <div class="products-grid col-6">
                    <a href="product-details.html">
                        <div class="products-div" data-scroll>
                            <h3 class="first_color  bold-text" data-scroll data-scroll-speed="-1.2">
                                خزانات مياه
                                <br>
                                فايبر جلاس
                            </h3>
                            <div data-scroll data-scroll-speed="-2"><img src="images/products/2.png" alt="product">
                            </div>
                        </div>
                    </a>
                </div>
                <!--end products-grid-->

                <!--start products-grid-->
                <div class="products-grid col-6">
                    <a href="product-details.html">
                        <div class="products-div" data-scroll>
                            <h3 class="first_color bold-text" data-scroll data-scroll-speed="-1.2">
                                حواجز الطرق البلاستيكية
                            </h3>
                            <div data-scroll data-scroll-speed="-2"><img src="images/products/3.png" alt="product">
                            </div>
                        </div>
                    </a>
                </div>
                <!--end products-grid-->

                <!--start products-grid-->
                <div class="products-grid col-6">
                    <a href="product-details.html">
                        <div class="products-div" data-scroll>
                            <h3 class="first_color bold-text" data-scroll data-scroll-speed="-1.2">
                                أغطية الفايبر جلاس

                            </h3>
                            <div data-scroll data-scroll-speed="-2"><img src="images/products/4.png" alt="product">
                            </div>
                        </div>
                    </a>
                </div>
                <!--end products-grid-->
            </div>
        </div>
    </section>
    <!--end products--> --}}
@endsection
