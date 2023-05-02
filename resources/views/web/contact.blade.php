@extends('web.layouts.app')

@section('content')
    <section class="contactus">
        <div class="main-container">
            <div class="title-start">
                <h2>{{ $pageTitle }}</h2>
                <span></span>
            </div>

            <p>
                {{ __('This form is intended only for directing and contacting the management of the Hakeem Web site and company in administrative and commercial matters only. Please do not ask medical questions or advice here') }}
            </p>

            <div class="main-contactus">
                <h2> {{ __('Send us all your questions and suggestions') }} : </h2>

                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('web.send-contact') }}" method="POST" id="contactForm">
                            @csrf
                            <div class="input-form">
                                <input type="text" placeholder="{{ __('Full Name') }}" class="form-control"
                                    name="name" required>

                                @error('name')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="input-form">
                                <input type="email" placeholder="{{ __('Email') }}" class="form-control" name="email"
                                    required>


                                @error('email')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="input-form">
                                <input type="tel" placeholder="{{ __('Phone') }}" class="form-control" name="phone"
                                    required>


                                @error('phone')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="input-form">
                                <textarea name="msg" id="" cols="" rows="" placeholder="{{ __('Message') }}"
                                    class="form-control" required></textarea>


                                @error('msg')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="btn-main-contactus">
                                <button class="ctm-btn"> {{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <div class="info-contactus">
                            <div class="sub-info-contactus">
                                <a href="tel::{{ getSetting('phone') }}">
                                    <div class="img-info-contactus">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                    <div class="text-info-contactus">
                                        <h2> {{ __('Phone') }} :</h2>
                                        <p> {{ getSetting('phone') }} </p>
                                    </div>
                                </a>
                            </div>
                            <div class="sub-info-contactus">
                                <a href="mailto::{{ getSetting('email') }}">
                                    <div class="img-info-contactus">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="text-info-contactus">
                                        <h2> {{ __('Email') }} :</h2>
                                        <p> {{ getSetting('email') }} </p>
                                    </div>
                                </a>
                            </div>
                            <div class="sub-info-contactus">
                                <a href="">
                                    <div class="img-info-contactus">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="text-info-contactus">
                                        <h2> {{ __('Address') }} :</h2>
                                        <p>{{ getSetting('address') }} </p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script src="{{ asset('web/js/validation/contactForm.js') }}"></script>
    @endpush
@endsection
