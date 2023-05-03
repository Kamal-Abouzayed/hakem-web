@extends('web.auth.layouts.app')

@section('content')
    <section class="login-page">
        <div class="main-container">
            <div class="logo-login">
                <a href="{{ route('web.home') }}">
                    <img src="{{ asset('storage/' . getSetting('logo')) }}" alt="">
                </a>
            </div>
            <h2>{{ $pageTitle }}</h2>

            <div class="form-login-page  form-register-page">
                <form action="{{ route('web.change-password-submit') }}" method="POST" id="registerForm" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}"
                                    class="form-control" name="password" autocomplete="new-password" required>
                                <i class="bi bi-lock"></i>
                            </div>
                            @error('password')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="password" value="{{ old('password_confirmation') }}"
                                    placeholder="{{ __('Password Confirmation') }}" class="form-control"
                                    name="password_confirmation" required>
                                <i class="bi bi-lock"></i>
                            </div>
                            @error('password_confirmation')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="btn-login">
                            <button>{{ __('Send') }}</button>
                        </div>

                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection
