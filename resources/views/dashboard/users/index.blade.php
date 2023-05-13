@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">إضافة مستخدم جديد</a> --}}

            <h5 class="text-primary text-center font-weight-bold">{{ $pageTitle }}</h5>

            <button onclick="ExportToExcel('xlsx')">تصدير اكسيل</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المستخدم</th>
                            <th>البريد الإلكترونى</th>
                            <th>رقم الهاتف</th>
                            <th>الدولة</th>
                            <th>الجنس</th>
                            <th>تاريخ الميلاد</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ? $user->phone : '-' }}</td>
                                <td>{{ $user->country ? $user->country->name : '-' }}</td>
                                <td>{{ $user->gender ? ($user->gender == 'male' ? 'ذكر' : 'أنثى') : '-' }}</td>
                                <td>{{ $user->birthday ? $user->birthday->format('Y-m-d') : '-' }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        {{-- <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> --}}
                                        <a href="{{ route('dashboard.users.destroy', $user->id) }}"
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
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

        <script>
            function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('dataTable');
                var wb = XLSX.utils.table_to_book(elt, {
                    sheet: "sheet1"
                });
                return dl ?
                    XLSX.write(wb, {
                        bookType: type,
                        bookSST: true,
                        type: 'base64'
                    }) :
                    XLSX.writeFile(wb, fn || ('المستخدمين.' + (type || 'xlsx')));
            }
        </script>
    @endpush
@endsection
