@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-1 font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
