@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dashboard.ads.create') }}" class="btn btn-primary">إضافة إعلان جديد</a>

            <h5 class="text-primary text-center font-weight-bold">{{ $pageTitle }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المحتوى</th>
                            <th>نص الرابط</th>
                            <th>الرابط</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ads as $ad)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ad->desc }}</td>
                                <td>{{ $ad->btn_text }}</td>
                                <td><a href="{{ $ad->link }}" target="_blank">{{ $ad->link }}</a></td>
                                <td>
                                    @if ($ad->img)
                                        <img src="{{ asset('storage/' . $ad->img) }}" width="100" height="100">
                                    @else
                                        <img src="https://placehold.co/100">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('dashboard.ads.edit', $ad->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('dashboard.ads.destroy', $ad->id) }}"
                                            data-id="{{ $ad->id }}" class="btn btn-sm btn-danger item-delete"><i
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
