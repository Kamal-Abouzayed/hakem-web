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
                <form action="{{ route('web.register-submit') }}" method="POST" id="registerForm" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="text" placeholder="{{ __('First Name') }}" class="form-control"
                                    name="fname" value="{{ old('fname') }}" required>
                                <i class="bi bi-person"></i>

                            </div>
                            @error('fname')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">

                            <div class="form-input">
                                <input type="text" placeholder="{{ __('Last Name') }}" class="form-control"
                                    name="lname" value="{{ old('lname') }}" required>
                                <i class="bi bi-person"></i>
                            </div>
                            @error('lname')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}"
                                    class="form-control" name="email" required>
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="text" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}"
                                    class="form-control" name="phone">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('phone')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="password" value="{{ old('password') }}" placeholder="{{ __('Password') }}"
                                    class="form-control" name="password" required>
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
                        <div class="col-lg-6">
                            <div class="form-input arrow-form">
                                <select class="form-select form-control " name="country_id" required>
                                    <option value="">{{ __('Choose Country') }} </option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="bi bi-geo-alt"></i>

                            </div>
                            @error('country_id')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-input">
                                <div class="form-input arrow-form">
                                    <select class="form-select form-control " name="gender">
                                        <option value=""> {{ __('Select gender (optional*)') }} </option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                            {{ __('Male') }} </option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                            {{ __('Female') }} </option>
                                    </select>
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('gender')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-input">
                                <input type="date" value="{{ old('birthday') }}"
                                    placeholder="{{ __('Birthdate (optional*)') }}" class="form-control" name="birthday">
                                <i class="bi bi-calendar-date"></i>
                            </div>
                            @error('birthday')
                                <small class="error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <div class="cleck-terms">
                                <input type="checkbox" id="check-1" name="check" required>
                                <label for="check-1"> {{ __('I agree to the Terms of Use') }} .</label>
                                @error('check')
                                    <small class="error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="btn-login">
                        <button>{{ __('Register') }}</button>
                    </div>




                </form>
            </div>

        </div>
    </section>
@endsection
