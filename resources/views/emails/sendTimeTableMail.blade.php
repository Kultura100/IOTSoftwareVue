@component('mail::message')
Przygotowany został raport z danych urządzenia. <br>
Data raportu: {{ now(); }}

Nazwa urządzenia: {{ $data['devicename'] }}<br>
@isset($data['readtime']) Data odczytu z urządzenia: {{$data['readtime']}} <br>@endisset
@isset($data['devicebattery']) Procent naładowania baterii: {{$data['devicebattery']}} <br>@endisset
@isset($data['temperature1']) Ostatnio odnotowana temperatura: {{$data['temperature1']}} <br>@endisset
@isset($data['humidity']) Ostatnio odnotowana wilgotność: {{$data['humidity']}} <br>@endisset

Thanks,<br>
{{ config('app.name') }}
@endcomponent
