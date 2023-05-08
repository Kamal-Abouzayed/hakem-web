@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.employees.store') }}" method="POST"
        enctype="multipart/form-data" id="createEmployeeForm">
        @csrf
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">إضافة موظف</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="form-group col-6">
                    <label for="fname">الاسم الأول</label>
                    <input type="text" class="form-control" name="fname" autocomplete="fname"
                        value="{{ old('fname') }}" required>
                    @error('fname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="lname">الاسم الأخير</label>
                    <input type="text" class="form-control" name="lname" autocomplete="lname"
                        value="{{ old('lname') }}" required>
                    @error('lname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="email">البريد الإلكترونى</label>
                    <input type="email" class="form-control" name="email" autocomplete="email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="password">كلمة المرور</label>
                    <input type="password" class="form-control" name="password" autocomplete="new-password"
                        value="{{ old('password') }}" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="permissions">الصلاحيات</label>
                    <select class="select2-multiple form-control" id="permissions" name="permissions[]" multiple required>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ __($permission->name) }}</option>
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