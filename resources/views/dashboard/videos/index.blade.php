@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dashboard.videos.create') }}" class="btn btn-primary">إضافة فيديو جديد</a>

            <h5 class="text-primary text-center font-weight-bold">{{ $pageTitle }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>المحتوى</th>
                            <th>صورة الفيديو</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $video->name }}</td>
                                <td>{!! Str::limit($video->desc, 70) !!}</td>
                                @php
                                    $url = $video->url;
                                    $url_components = parse_url($url);
                                    if (array_key_exists('query', $url_components)) {
                                        parse_str($url_components['query'], $params);
                                        $key = $params['v'];
                                    } else {
                                        $key = str_replace('/', '', $url_components['path']);
                                    }
                                @endphp

                                <td>
                                    <img src="http://img.youtube.com/vi/{{ $key }}/mqdefault.jpg" width="100px"
                                        alt="{{ $video->name }}">
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('dashboard.videos.edit', $video->slug) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('dashboard.videos.destroy', $video->slug) }}"
                                            data-id="{{ $video->id }}" class="btn btn-sm btn-danger item-delete"><i
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
