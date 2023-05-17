@component('mail::message')

Tytuł: {{ $data['title'] }}<br>
{{ $data['description'] }}

@component('mail::button', ['url' => $data['url']])
Powrót do strony.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
