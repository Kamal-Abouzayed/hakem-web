@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.update_profile') }}" method="POST" enctype="multipart/form-data"
        id="profileForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">تعديل الملف الشخصى</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">الصورة</label>
                        <input class="form-control image" type="file" id="formFile" name="image">
                        @error('image')
                            <span class="alert alert-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group prev">
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('admin/png/user.png') }}"
                            style="width: 150px" class="img-thumbnail preview-formFile" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="name">الاسم</label>
                    <input type="text" class="form-control" name="name" autocomplete="name"
                        value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="email">البريد الإلكترونى</label>
                    <input type="text" class="form-control" name="email" autocomplete="email"
                        value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="password">كلمة المرور</label>
                    <input type="password" class="form-control" id="password" name="password" value="">
                </div>
                <div class="form-group col-6">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <input type="password" class="form-control" name="password_confirmation" value="">
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/profileForm.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
