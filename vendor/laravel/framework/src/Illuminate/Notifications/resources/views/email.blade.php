<<<<<<< HEAD
@component('mail::message')
=======
<x-mail::message>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
<<<<<<< HEAD
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
=======
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
<<<<<<< HEAD
@slot('subcopy')
=======
<x-slot:subcopy>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
<<<<<<< HEAD
@endslot
@endisset
@endcomponent
=======
</x-slot:subcopy>
@endisset
</x-mail::message>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
