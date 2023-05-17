@component('mail::message')
{{-- Greeting --}}
@if (!empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Problem!')
@else
# @lang('Witaj!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
$color = match ($level) {
'success', 'error' => $level,
default => 'primary',
};
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}
@endforeach

{{-- Salutation --}}
@if (!empty($salutation))
{{ $salutation }}
@else
@lang('z pozdrowieniami'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang("Jeżeli masz problem z kliknieciem w guzik \":actionText\", skopiuj i wklej link poniżej do swojej przeglądarki internetowej\n", [
'actionText' => $actionText,
]) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
