@component('mail::message')

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
{{ __('Welcome') . ' ' . $data['name'] }}<br>
</div>

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
@component('mail::panel')
{{ $data['msg'] . ' : ' .  $data['code'] }}
@endcomponent
</div>

<div style="text-align: center" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
{{ __('Thank you for registering on Hakem Web platform') }},<br>
{{ __('Hakem Web') }}
</div>

@endcomponent
