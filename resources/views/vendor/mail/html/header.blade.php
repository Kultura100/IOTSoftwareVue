<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'IOTSOFTWARE')
<img class="max-w-full h-24" src="/storage/images/logo.png" class="logo" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
