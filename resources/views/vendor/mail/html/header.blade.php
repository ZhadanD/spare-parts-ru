@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">--}}
        <img src="img/car-front.svg" alt="Логотип" width="125">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
