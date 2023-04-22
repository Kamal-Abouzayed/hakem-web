@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dashboard.articles.create') }}" class="btn btn-primary">إضافة مقال جديد</a>

            <h5 class="text-primary text-center font-weight-bold">{{ $pageTitle }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            {{-- <th>المحتوى</th> --}}
                            <th>القسم</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article->name }}</td>
                                {{-- <td>{!! $article->desc !!}</td> --}}
                                <td>{{ $article->section->name }}</td>
                                <td>
                                    @if ($article->img)
                                        <img src="{{ asset('storage/' . $article->img) }}" width="100" height="100">
                                    @else
                                        <img src="https://placehold.co/100">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('dashboard.articles.edit', $article->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('dashboard.articles.destroy', $article->id) }}"
                                            data-id="{{ $article->id }}" class="btn btn-sm btn-danger item-delete"><i
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
