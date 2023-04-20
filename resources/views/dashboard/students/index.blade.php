@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{ route('dashboard.students.create') }}" class="btn btn-primary">إضافة طالب</a> --}}

            <h6 class="m-0 font-weight-bold text-primary">{{ $pageTitle }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>إسم الطالب</th>
                            <th>البريد الإلكترونى</th>
                            <th>الجوال</th>
                            <th>المرحلة الدراسية</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                                <td>{{ $user->education }}</td>
                                <td><img src="{{ $user->image ? asset('storage/' . $user->image) : asset('admin/png/user.png') }}"
                                        alt="" width="100" height="100"></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        {{-- <a href="{{ route('dashboard.students.edit', $user->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> --}}
                                        <a href="{{ route('dashboard.students.destroy', $user->id) }}"
                                            data-id="{{ $user->id }}" class="btn btn-sm btn-danger item-delete"><i
                                                class="fas fa-trash"></i></a>
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
