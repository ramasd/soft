@component('mail::message')
# Hello,

All goods are discounted up to 50%!

@component('mail::button', ['url' => 'https://laravel.com/'])
Visit Us!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
