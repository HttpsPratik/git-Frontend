<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
{{--# {{ $greeting }}--}}
    @lang("Hetauda Submetropolitan City")
@else
@if ($level === 'error')
# @lang('Whoops !')
@else
# @lang('Hello !')
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
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br> @lang("Hetauda Submetropolitan City")
{{--{{ config('app.name') }}--}}
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browsers:',
    /*"यदि तपाइँलाई \":actionText\" क्लिक गर्न समस्या भइरहेको छ भने, तलको URL लाई तपाइँको वेब ब्राउजरहरूमा प्रतिलिपि गरेर टाँस्नुहोस्।",*/
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
