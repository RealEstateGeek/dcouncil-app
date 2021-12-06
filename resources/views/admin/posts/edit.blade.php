<x-layout>
    <x-setting heading="Edit Post"></x-setting>
    <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form-input name="title" :value="old('title', $post->title)"></x-form-input>

        <div class="mb-6 max-w-sm mx-auto flex mt-6">
            <div class="flex-1">
                <x-form-input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"></x-form-input>
            </div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-4 " width="100">
        </div>

        <x-form-textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form-textarea>

        <x-form-textarea name="body">{{ old('body', $post->body) }}</x-form-textarea>

        <div class="mb-6 max-w-sm mx-auto">
            <x-form-label name="Category"></x-form-label>
            <select name="category_id" id="category_id">
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 max-w-sm mx-auto">
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 rounded-2xl hover:bg-blue-600 p-2">Edit Post</button>
        </div>

    </form>
</x-layout>
