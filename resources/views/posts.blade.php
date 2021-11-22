<x-layout>
    @include('_header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if(count($posts))
            <x-post-featured-tile :post="$posts[0]"/>

            @if(count($posts) > 1)
                <x-posts-grid :posts="$posts"/>
            @else
                <div>
                    No posts exist yet! Come back later
                </div>
            @endif
        @endif

    </main>
</x-layout>
