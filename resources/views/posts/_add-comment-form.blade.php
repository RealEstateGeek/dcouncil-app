@auth
    <form action="/posts/{{ $post->id }}/comment" method="post" class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">
                Add a comment
            </h2>
        </header>
        <div class="mt-6">
            <textarea class="w-full text-sm focus:outline-non focus:ring" name="body" id="" cols="30" rows="10" required placeholder="Enter your comment here"></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-sm uppercase text-white font-semibold rounded-xl hover:bg-blue-600 px-4">
                Publish Comment
            </button>
        </div>
    </form>
@else
    <p><a href="/register">Register</a> or <a href="/login">Login</a> to leave a comment</p>
@endauth
