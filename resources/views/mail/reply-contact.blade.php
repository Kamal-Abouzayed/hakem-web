@component('mail::message')

@component('mail::panel')
{{ $data }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
