@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dashboard.organs.create') }}" class="btn btn-primary">إضافة عضو
                جديد</a>

            <h5 class="text-primary text-center font-weight-bold">{{ $pageTitle }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>المحتوى</th>
                            <th>الجهاز</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organs as $organ)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $organ->name }}</td>
                                <td>{!! Str::limit($organ->desc, 70) !!}</td>
                                <td>{{ $organ->bodySystem->name }}</td>
                                <td>
                                    @if ($organ->img)
                                        <img src="{{ asset('storage/' . $organ->img) }}" width="100" height="100">
                                    @else
                                        <img src="https://placehold.co/100">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('dashboard.organs.edit', $organ->slug) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('dashboard.organs.destroy', $organ->slug) }}"
                                            data-id="{{ $organ->id }}" class="btn btn-sm btn-danger item-delete"><i
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
