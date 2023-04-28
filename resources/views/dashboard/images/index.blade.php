@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dashboard.images.create') }}" class="btn btn-primary">إضافة صور</a>

            <h5 class="text-primary text-center font-weight-bold">{{ $pageTitle }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>الرابط</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('storage/' . $image->img) }}" alt="" width="100px"></td>
                                <td><a href="{{ url('storage/' . $image->img) }}" target="_blank">رابط الصورة</a>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('dashboard.images.destroy', $image->id) }}"
                                            data-id="{{ $image->id }}" class="btn btn-sm btn-danger item-delete"><i
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
