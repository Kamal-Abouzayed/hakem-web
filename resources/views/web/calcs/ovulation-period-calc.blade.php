@extends('web.layouts.app')

@section('content')
    <section class="calorie-calculator">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-pregnancy-calculator">
                        <div class="img-article-details">
                            <img src="{{ url('web') }}/images/OvulationTool.jpg" alt="">
                        </div>

                        <div class="title-pregnancy-calculator">
                            <h2>{{ $pageTitle }}</h2>
                            <p>{{ __('An ovulation period calculator is a tool that helps women determine their most fertile days of the month, which can be useful for those who are trying to conceive or who want to avoid pregnancy.') }}
                            </p>
                        </div>


                        <div class="sub-pregnancy-calculator">
                            <h2>{{ $pageTitle }} :</h2>
                            <form id="ovulation-period-form">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="Cycle length (in days)" name="cycle-length"
                                                id="cycle-length" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="Period length (in days)" name="period-length"
                                                id="period-length" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="date" placeholder="Date of last period" name="last-period-date"
                                                id="last-period-date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="btn-pregnancy-calculator">
                                            <button type="button" class="ctm-btn"
                                                onclick="calculateOvulationPeriod()">{{ __('Calculate') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <p>{{ __('Earliest ovulation day') }}: <span id="earliest-ovulation-day"></span></p>
                            <p>{{ __('Latest ovulation day') }}: <span id="latest-ovulation-day"></span></p>

                        </div>

                        {{-- <div class="text-details">
                            <h2> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم
                                توليد هذا النص من مولد النص العربى</h2>

                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                                إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر
                                من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو
                                مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                                الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم
                                الموقع.</p>
                            <p> ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل
                                كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا
                                علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.هذا النص يمكن أن
                                يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير
                                منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
                            <h2> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة :</h2>
                            <ul>
                                <li><a href=""> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة .</a>
                                </li>
                                <li><a href=""> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة .</a>
                                </li>
                                <li><a href=""> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة .</a>
                                </li>
                                <li><a href=""> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة .</a>
                                </li>
                                <li><a href=""> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة .</a>
                                </li>
                            </ul>
                        </div>


                        <div class="share-article">
                            <h3><i class="bi bi-share"></i> مشاركة : </h3>
                            <ul>
                                <li><a href=""><img src="images/facebook-logo.png" alt=""></a></li>
                                <li><a href=""><img src="images/twitter.png" alt=""></a></li>
                                <li><a href=""><img src="images/instagram.png" alt=""></a></li>
                                <li><a href=""><img src="images/Snapchat.png" alt=""></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>


                @include('web.includes.side-content')

            </div>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('web/js/calcs/period-length.js') }}"></script>
    @endpush
@endsection
