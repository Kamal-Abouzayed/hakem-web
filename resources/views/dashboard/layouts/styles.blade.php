<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>{{ $pageTitle ? 'حكيم ويب | ' . $pageTitle : 'حكيم ويب | لوحة التحكم' }}</title>

<link rel="icon" type="image/x-icon" href="{{ asset('storage/' . getSetting('favicon')) }}">

<!-- Custom fonts for this template-->
{{-- <link href="{{ url('admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
{{-- <link href="{{ url('admin') }}/css/sb-admin-2.min.css" rel="stylesheet"> --}}
<link href="{{ url('admin') }}/css/admin-rtl.css" rel="stylesheet">

<link href="{{ url('admin') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet" />

@stack('css')
