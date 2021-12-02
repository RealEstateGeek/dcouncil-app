<x-layout>
    <div class="bg-blue-50 p-5">
        <table id="commentTable" class="display">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Date Posted</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->user->name }}</td>
                        <td><time>{{ $comment->created_at->format('Y-m-d h:i') }}</time></td>
                        <td>{{ $comment->body }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script>
            $(function () {
                $('#commentTable').DataTable();
            });
        </script>
    @endpush
</x-layout>
