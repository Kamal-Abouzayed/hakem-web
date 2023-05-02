<!-- start footer ==============================
        ============================== -->
<footer class="footer" style="background-image: url({{ url('web') }}/images/bg3.png);">
    <div class="main-container">
        <div class="row">
            <div class="col-lg-5">
                <div class="sub-footer">
                    <div class="logo-footer">
                        <a href="{{ route('web.home') }}">
                            <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                        </a>
                    </div>
                    <p>{!! strip_tags(Str::limit(getSetting('about', app()->getLocale()), 300)) !!}</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="element-footer">
                    <h2> {{ __('Quick Links') }} : </h2>
                    <ul>
                        <li><a href="{{ route('web.about') }}">{{ __('About Us') }} </a></li>
                        <li><a href="contactus.html">{{ __('Contact Us') }}</a></li>
                        {{-- <li><a href="contactus.html">أعلن معنا</a></li> --}}
                        <li><a href="{{ route('web.terms') }}">{{ __('Terms of Use') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="element-footer el-f2">
                    <h2> {{ __('Contact Us') }}: </h2>
                    <ul>
                        <li><a href="tel:{{ getSetting('phone') }}"> <i class="bi bi-phone"></i>
                                {{ getSetting('phone') }} </a></li>
                        <li><a href="mailTo:{{ getSetting('email') }}"> <i class="bi bi-envelope"></i>
                                {{ getSetting('email') }}</a></li>

                        <li><a href="#"><i class="bi bi-geo-alt"></i> {{ getSetting('address') }}</a></li>
                    </ul>
                </div>
            </div>


        </div>

        <div class="end-page">
            <p> {{ __('All rights reserved') }} &copy; {{ Date('Y') }} {{ __('for Hakem Web Website') }} </p>
            <div class="media-footer">
                <ul>
                    <li><a href="{{ getSetting('facebook') }}"><i class="bi bi-facebook"></i> </a></li>
                    <li><a href="{{ getSetting('telegram') }}"><i class="bi bi-telegram"></i></a></li>
                    <li><a href="{{ getSetting('instagram') }}"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="{{ getSetting('twitter') }}"><i class="bi bi-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer=========================
        ===========================  -->







<!-- start menu  ===
        ======== -->
<div class="bg_menu1">
</div>
<div class="menu" id="menu-div1">
    <div class="logo-menu">
        <img src="images/logo.png" alt="">
    </div>
    <div class="element_menu">
        <ul>

            @foreach ($sections->take(3) as $section)
                <li>
                    <a class="click-element-mune" href="{{ route('web.section-categories', $section->slug) }}"> <img
                            src="{{ asset('storage/' . $section->img) }}" alt="{{ $section->name }}">
                        {{ $section->name }}
                    </a>
                    <div class="dropdowm-element-mune">
                        <ul>
                            @foreach ($section->categories as $category)
                                <li><a
                                        href="{{ route('web.category-details', ['sectionSlug' => $section->slug, 'slug' => $category->slug]) }}">{{ $category->name }}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>

                </li>
            @endforeach


            <li>
                <a class="click-element-mune" href=""> <img src="{{ url('web') }}/images/m04.png" alt=""> {{ __('Tools and Media') }}
                </a>
                <div class="dropdowm-element-mune">
                    <ul>
                        <li><a href="{{ route('web.videos') }}">فيديو</a></li>
                        <li><a href="all-calculators.html">حاسبات</a></li>

                    </ul>
                </div>
            </li>

            <li>
                <a class="click-element-mune" href=""> <img src="images/m05.png" alt=""> عام </a>
                <div class="dropdowm-element-mune">
                    <ul>
                        <li><a href="index.html">الرئيسية</a></li>
                        <li><a href="diseases.html">الأمراض</a></li>
                        <li><a href="medications.html">الأدوية</a></li>
                        <li><a href="aboutsus.html">من نحن </a></li>
                        <li><a href="q&a.html">أسئلة وأجوبة</a></li>
                        <li><a href="contactus.html">اتصل بنا</a></li>
                    </ul>
                </div>

            </li>

        </ul>

    </div>


    <div class="remove-mune1">
        <span></span>
    </div>

</div>




<!-- start menu responsive ===
        ======== -->
<div class="bg_menu">
</div>
<div class="menu_responsive" id="menu-div">

    <div class="element_menu_responsive">
        <ul>
            <li><a href="medicine-health.html"> <img src="images/e1.png" alt=""> الطب والصحة </a></li>
            <li><a href="health-beauty.html"><img src="images/e2.png" alt=""> الصحة والجمال</a></li>
            <li><a href="pregnancy-childbirth.html"> <img src="images/e3.png" alt="">الحمل والولادة</a></li>
            <li><a href="diseases.html"><img src="images/e4.png" alt=""> الأمراض </a></li>
            <li><a href="calories.html"><img src="images/e5.png" alt=""> السعرات الحرارية </a></li>
            <li><a href="medications.html"><img src="images/e5.png" alt=""> الأدوية </a></li>
            <li><a href="register.html"><img src="images/e6.png" alt=""> تسجيل </a></li>

            <li><a href="login.html"><img src="images/e6.png" alt=""> دخول </a></li>

            <li>
                <a class="click-element-mune" href=""> <img src="images/e6.png" alt=""> جميع الأقسام
                </a>
                <div class="dropdowm-element-mune">
                    <ul>
                        <li>
                            <a href="index.html">الرئيسية</a>
                        </li>
                        <li>
                            <a href="diseases.html">الأمراض</a>
                        </li>
                        <li>
                            <a href="medications.html">الأدوية</a>
                        </li>
                        {{-- <li>
                            <a href="index.html">تطعيمات</a>
                        </li> --}}

                        <li>
                            <a href="q&a.html">أسئلة وأجوبة</a>
                        </li>
                        {{-- <li>
                            <a href="index.html">فحوصات</a>
                        </li> --}}
                    </ul>
                </div>

            </li>


            <li>
                <a class="click-dropdown-mune" href=""><img src="images/e7.png" alt=""> اللغة</a>
                <div class="dropdowm-language-mune">
                    <ul>
                        <li><a href="">عربي</a> </li>
                        <li><a href=""> English</a> </li>
                    </ul>
                </div>

            </li>
        </ul>
    </div>


    <div class="remove-mune">
        <span></span>
    </div>

</div>

<!-- end menu responsive ===
        ======== -->

</div>


@include('web.layouts.script')



</body>
<!-- end-body
=================== -->

</html>
