@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (auth()->user()->hasRole('admin') ||
                    auth()->user()->hasPermissionTo('create_employees'))
                <a href="{{ route('dashboard.employees.create') }}" class="btn btn-primary">إضافة موظف</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكترونى</th>
                            <th>رقم الهاتف</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>
                                    <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                                </td>
                                <td>
                                    <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a>
                                </td>
                                <td><img src="{{ $employee->photo }}" alt="" width="100" height="100"></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">

                                        @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->hasPermissionTo('update_employees'))
                                            <a href="{{ route('dashboard.employees.edit', $employee->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if (auth()->user()->hasRole('admin') ||
                                                auth()->user()->hasPermissionTo('delete_employees'))
                                            <a href="{{ route('dashboard.employees.destroy', $employee->id) }}"
                                                data-id="{{ $employee->id }}" class="btn btn-sm btn-danger item-delete"><i
                                                    class="fas fa-trash"></i></a>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('js')
        <script src="{{ asset('admin/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
