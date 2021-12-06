@props(['name', 'type' => 'text'])

<div class="mb-6 max-w-sm mx-auto">
    <x-form-label name="{{ $name }}"></x-form-label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="border border-gray-400 p-2 w-full" {{ $attributes(['value' => old($name)]) }}>
    @error('{{ $name }}')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
