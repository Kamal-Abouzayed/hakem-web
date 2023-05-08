@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.employees.update', $user->id) }}" method="POST"
        enctype="multipart/form-data" id="updateEmployeeForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $user->title_ar }}</h6>
        </div>
        <div class="card-body">

            <div class="col-md-6 mb-3">
                <label class="form-label" for="photo">الصورة</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="photo" data-preview="photo" class="btn btn-secondary text-white px-4"
                            style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 0;border-bottom-left-radius: 0;">
                            <i class="fa fa-picture-o"></i> اختر الصورة
                        </a>
                    </span>
                    <input type="text" class="form-control photo" name="photo" id="photo" placeholder="الرابط"
                        value="{{ $user->photo }}" required>

                </div>
                <div class="mb-3 mt-3 d-block slider-holder photo">
                    <img width="100" src="{{ $user->photo }}" alt="">
                </div>
                <small class="text-danger">{{ $errors->first('photo') }}</small>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="name">الاسم</label>
                    <input type="text" class="form-control" name="name" autocomplete="name"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="phone">رقم الجوال</label>
                    <input type="text" class="form-control" name="phone" autocomplete="phone"
                        value="{{ old('phone', $user->phone) }}" required>
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="email">البريد الإلكترونى</label>
                    <input type="email" class="form-control" name="email" autocomplete="email"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="password">كلمة المرور</label>
                    <input type="password" class="form-control" name="password" autocomplete="new-password"
                        value="{{ old('password') }}">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="permissions">الصلاحيات</label>
                    <select class="select2-multi-select form-control" id="permissions" name="permissions[]" multiple
                        required>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}"
                                {{ $user->permissions->contains($permission->id) ? 'selected' : '' }}>
                                {{ __($permission->name) }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

    @push('js')
        <script src="{{ asset('admin/js/validation/employeeValidation.js') }}"></script>
        <script src="{{ asset('admin/js/custom/preview-image.js') }}"></script>

        <script>
            $(".select2-multi-select").select2();
        </script>
    @endpush
@endsection
