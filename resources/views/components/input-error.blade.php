@props(['messages'])

@if ($messages)
<p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>
    {{ $messages[0] }}
</p>
@endif
