@extends('web.layouts.app')

@section('content')
    <section class="calorie-calculator">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-pregnancy-calculator">
                        <div class="img-article-details">
                            <img src="{{ url('web') }}/images/baby_development.jpg" alt="">
                        </div>

                        <div class="title-pregnancy-calculator">
                            <h2>{{ $pageTitle }}</h2>
                            <p>{{ __("The baby development calculator estimates the fetal age of a developing baby based on the due date entered by the user, along with the baby's weight, height, age, and head circumference. It also calculates the mother's BMI based on her weight and height. This tool is useful for tracking the progress of a developing baby and can be used by expectant parents or healthcare professionals.") }}
                            </p>
                        </div>


                        <div class="sub-pregnancy-calculator">
                            <h2>{{ $pageTitle }} :</h2>

                            <form id="baby-development-form">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="date" placeholder="Due date" name="due-date" id="due-date"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="{{ __('weight (kg)') }}" name="weight"
                                                id="weight" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="{{ __('length (cm)') }}" name="height"
                                                id="height" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="{{ __('Age (year)') }}" name="age"
                                                id="age" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="{{ __('Head circumference (cm)') }}"
                                                name="head-circumference" id="head-circumference" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="btn-pregnancy-calculator">
                                            <button type="button" class="ctm-btn"
                                                onclick="calculateBabyDevelopment()">{{ __('Calculate') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <p>{{ __('Weeks remaining') }}: <span id="weeks-remaining"></span></p>
                            <p>{{ __('Days remaining') }}: <span id="days-remaining"></span></p>
                            <p>{{ __('Fetal age in total days') }}: <span id="fetal-age-in-total-days"></span></p>
                            <p>{{ __('BMI') }}: <span id="bmi"></span></p>
                            <p>{{ __('Adjusted age') }}: <span id="adjusted-age"></span></p>
                            <p>{{ __('Adjusted head circumference') }}: <span id="adjusted-head-circumference"></span></p>

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
        <script src="{{ asset('web/js/calcs/baby-development.js') }}"></script>
    @endpush
@endsection
