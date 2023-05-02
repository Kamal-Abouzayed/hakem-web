@extends('web.auth.layouts.app')

@section('content')
    <section class="login-page">
        <div class="main-container">
            <div class="logo-login">
                <a href="index.html">
                    <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                </a>
            </div>
            <h2>{{ $pageTitle }}</h2>

            <div class="form-login-page  form-register-page">
                <form action="{{ route('web.verify-submit') }}" method="POST" id="verifyForm" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-input">
                                <input type="text" placeholder="{{ __('Verification Code') }}" class="form-control"
                                    name="code" required>
                                <i class="bi bi-braces-asterisk"></i>

                                @error('code')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="btn-login">
                        <button>{{ __('Send') }}</button>
                    </div>




                </form>
            </div>

        </div>
    </section>
@endsection
