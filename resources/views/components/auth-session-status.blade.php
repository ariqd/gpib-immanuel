@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-bold text-red-600 text-lg']) }}>
        {{ $status }}
    </div>
@endif
