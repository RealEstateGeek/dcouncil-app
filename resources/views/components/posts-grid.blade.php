@props(['posts'])
<div class="lg:grid lg:grid-cols-6">
    @foreach ($posts->skip(1) as $post)
        <x-post-tile :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
    @endforeach
</div>
