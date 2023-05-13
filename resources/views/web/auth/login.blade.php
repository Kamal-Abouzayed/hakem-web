@extends('web.auth.layouts.app')

@section('content')
    <section class="login-page">
        <div class="main-container">
            <div class="logo-login">
                <a href="{{ route('web.home') }}">
                    <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                </a>
            </div>
            <h2> {{ $pageTitle }} </h2>

            <div class="form-login-page">
                <form action="{{ route('web.login-submit') }}" method="POST">
                    @csrf
                    <div class="form-input">
                        <input type="email" placeholder="{{ __('Email') }}" class="form-control" name="email">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="form-input">
                        <input type="password" placeholder="{{ __('Password') }}" class="form-control" name="password">
                        <i class="bi bi-lock"></i>
                    </div>

                    <div class="forget-password">
                        <a href="{{ route('web.forget-password') }}"> {{ __('Forgot your password ?') }}</a>
                    </div>

                    <div class="btn-login">
                        <button>{{ __('Login') }}</button>
                    </div>

                    {{-- <div class="or-se">
                        <hr> <span>او </span>
                        <hr>
                    </div>
                    <div class="sinin-media">
                        <h3>الدخول عن طريق شبكات التواصل الاجتماعي</h3>
                        <ul>
                            <li><a href=""><img src="images/1200px-Facebook_circle_pictogram.svg.png"
                                        alt=""></a></li>
                            <li><a href=""><img src="images/twitter.png" alt=""></a></li>
                            <li><a href=""><img src="images/google.png" alt=""></a></li>
                        </ul>
                    </div> --}}

                    {{-- <div class="googel-now">
                        <a href="{{ url('auth/redirect') }}">{{ __('Login with google') }}</a>
                    </div> --}}
{{-- 
                    <div class="col-md-12">
                        <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline"
                            href="{{ url('auth/redirect') }}"><img
                                src="https://img.icons8.com/color/16/000000/google-logo.png">
                            {{ __('SignIn With Google') }} </a>
                    </div> --}}

                    <div class="regiester-now">
                        <p>{{ __("I don't have an account") }} <a
                                href="{{ route('web.register') }}">{{ __('New user registration') }}</a></p>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection
