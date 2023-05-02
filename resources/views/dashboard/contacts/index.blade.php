@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <p class="text-primary text-lg">رسائل التواصل</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم بالكامل</th>
                            <th>البريد الإلكترونى</th>
                            <th>الجوال</th>
                            <th>الرسالة</th>
                            <th>تم الرد</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                <td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                                <td>{{ $contact->msg }}</td>
                                <td>
                                    @if ($contact->isReply == 1)
                                        <span class="badge badge-success">نعم</span>
                                    @else
                                        <span class="badge badge-danger">لا</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('dashboard.contacts.show', $contact->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('dashboard.contacts.destroy', $contact->id) }}"
                                            data-id="{{ $contact->id }}" class="btn btn-sm btn-danger item-delete"><i
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
