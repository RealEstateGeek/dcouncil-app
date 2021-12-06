<x-layout>
    <x-setting heading="Manage Posts">
        <div class="bg-blue-50 p-5">
            <table id="postsTable" class="display">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Excerpt</th>
                        <th>Category</th>
                        <th>Date Posted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->user->name }}</td>
                            <td><a href="/posts/{{ $post->id }}">{{ $post->excerpt }}</a></td>
                            <td>{{ $post->category->name }}</td>
                            <td><time>{{ $post->created_at->format('Y-m-d h:i') }}</time></td>
                            <td><a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @push('scripts')
            <script>
                $(function () {
                    $('#postsTable').DataTable();
                });
            </script>
        @endpush
    </x-setting>
</x-layout>
