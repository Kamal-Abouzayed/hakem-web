@extends('dashboard.layouts.app')

@section('content')
    <form class="card shadow mb-4" action="{{ route('dashboard.employees.update', $user->id) }}" method="POST"
        enctype="multipart/form-data" id="updateEmployeeForm">
        @csrf
        @method('PATCH')
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $user->full_name }}</h6>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="form-group col-6">
                    <label for="fname">الاسم الأول</label>
                    <input type="text" class="form-control" name="fname" autocomplete="fname"
                        value="{{ old('fname', $user->fname) }}" required>
                    @error('fname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="lname">الاسم الأخير</label>
                    <input type="text" class="form-control" name="lname" autocomplete="lname"
                        value="{{ old('lname', $user->lname) }}" required>
                    @error('lname')
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

                    <input type="checkbox" id="select-all"> تحديد الكل

                    <select class="select2-multiple form-control" id="permissions" name="permissions[]" multiple required>
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
            $(document).ready(function() {

                var $select = $('.select2-multiple').select2();

                $('#select-all').on('change', function() {
                    if ($(this).is(':checked')) {
                        $select.find('option').prop('selected', true);
                        $select.trigger('change');
                    } else {
                        $select.find('option').prop('selected', false);
                        $select.trigger('change');
                    }
                });

                $select.on('change', function() {
                    var allSelected = $select.find('option').length === $select.find('option:selected').length;
                    $('#select-all').prop('checked', allSelected);
                });

                if ($select.find('option').length === $select.find('option:selected').length) {
                    $('#select-all').prop('checked', true);
                } else {
                    $('#select-all').prop('checked', false);
                }
            });
        </script>
    @endpush
@endsection
