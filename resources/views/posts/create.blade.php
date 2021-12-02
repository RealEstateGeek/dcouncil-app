<x-layout>
    <section class="px-6 py-8">
        <form action="/admin/posts" method="POST">
        @csrf
        <div class="mb-6 max-width-sm mx-auto">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="border border-gray-400 p-2 w-full" required>
            @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 max-width-sm mx-auto">
            <label for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" class="border border-gray-400 p-2 w-full" required></textarea>
            @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 max-width-sm mx-auto">
            <label for="body">Body</label>
            <textarea id="body" name="body" class="border border-gray-400 p-2 w-full" required></textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 max-width-sm mx-auto">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                @php
                    $categories = \App\Models\Category::all();
                @endphp
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
