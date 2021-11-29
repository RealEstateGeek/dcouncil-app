@props(['comment'])

<article class="flex">
    <div>
        <img src="https://i.pravatar.cc/100?u={{ $comment->id }}" alt="Avatar">
    </div>
    <div>
        <header>
            <h3>
                {{ $comment->user->name }}
            </h3>
            <p class="text-xs">
                Posted <time>{{ $comment->created_at }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
