@props(['name', 'type' => 'text'])

<div class="mb-6">
    <x-form-label name="{{ $name }}"></x-form-label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="border border-gray-400 p-2 w-full" value="{{ old('name') }}" required>
    @error('{{ $name }}')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
