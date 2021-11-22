<x-layout>
    @include('_header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if(count($posts))
            <x-post-featured-tile :post="$posts[0]"/>

            @if(count($posts) > 1)
                <div class="lg:grid lg:grid-cols-2">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-tile :post="$post"/>
                    @endforeach
                </div>
            @endif
        @endif

    </main>
</x-layout>
