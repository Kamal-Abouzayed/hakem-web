@extends('web.layouts.app')

@section('content')
    <section class="calorie-calculator">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-pregnancy-calculator">
                        <div class="img-article-details">
                            <img src="{{ url('web') }}/images/a01.png" alt="">
                        </div>

                        <div class="title-pregnancy-calculator">
                            <h2>{{ $pageTitle }}</h2>
                            <p>{{ __('Use the calorie calculator to estimate how many daily calories your body needs to maintain your current weight. !') }}
                            </p>
                        </div>


                        <div class="sub-pregnancy-calculator">
                            <h2>{{ $pageTitle }} :</h2>

                            <form id="calorie-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="{{ __('age (year)') }}" id="age"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder=" {{ __('length (cm)') }}" id="height"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <input type="number" placeholder="{{ __('weight (kg)') }}" id="weight"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <select id="activity" class="form-control" required>
                                                <option value="1.2">{{ __('Sedentary (little or no exercise)') }}</option>
                                                <option value="1.375">{{ __('Lightly Active (light exercise or sports 1-3 days a week)') }}</option>
                                                <option value="1.55">{{ __('Moderately Active (moderate exercise or sports 3-5 days a week)') }}</option>
                                                <option value="1.725">{{ __('Very Active (hard exercise or sports 6-7 days a week)') }}</option>
                                                {{-- <option value="1.9">{{ __('Super Active (very hard exercise or sports, physical job or training twice a day)') }}</option> --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-calculator">
                                            <select id="gender" class="form-control" required>
                                                <option value=""> {{ __('gender') }} :</option>
                                                <option value="male">{{ __('Male') }} </option>
                                                <option value="female">{{ __('Female') }} </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="btn-pregnancy-calculator">
                                            <button type="submit" class="ctm-btn"> {{ __('Calculate') }} </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="result"></div>

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
        <script src="{{ asset('web/js/calcs/calorie.js') }}"></script>
    @endpush
@endsection
