@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-ingido-500']) }}>
    {{ $value ?? $slot }}
</label>
