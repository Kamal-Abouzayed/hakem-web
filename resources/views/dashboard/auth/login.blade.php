<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    @include('dashboard.layouts.styles')
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background: url({{ asset('storage/' . getSetting('logo')) }}) !important;
                                background-repeat: no-repeat !important;
                                background-position: center !important;
                                background-size: 80% !important;">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">تسجيل الدخول</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('dashboard.login_submit') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="البريد الإلكترونى" value="{{ old('email') }}" required
                                                autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="كلمة المرور" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="text-start pb-2">
                                            <a class="small" href="{{ route('dashboard.admin.reset') }}">نسيت كلمة
                                                المرور ؟</a>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary">
                                            دخول
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



    @include('dashboard.layouts.scripts')

</body>

</html>
