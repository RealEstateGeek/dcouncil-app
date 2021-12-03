<x-layout>
    <section class="max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish new post
        </h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form-input name="title"></x-form-input>
            <x-form-input name="thumbnail" type="file"></x-form-input>
            <x-form-textarea name="excerpt"></x-form-textarea>
            <x-form-textarea name="body"></x-form-textarea>
            <div class="mb-6 max-w-sm mx-auto">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 rounded-2xl hover:bg-blue-600">Create Post</button>
        </form>
    </section>
</x-layout>
