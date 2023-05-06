@component('mail::message')

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
{{ __('Welcome') . ' ' . $data['username'] }}<br>
</div>

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
@component('mail::panel')
{{ $data['msg'] }}
@endcomponent
</div>

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
@component('mail::button', ['url' => $data['link']])
{{ $data['article'] }}
@endcomponent
</div>

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
{{ __('Thank you for registering on Hakem Web platform') }},<br>
{{ __('Hakem Web') }}
</div>

@endcomponent
