<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Collection;

class Post
{
    public string $title;

    public string $excerpt;

    public string $date;

    public string $id;

    public string $body;

    /**
     *
     */
    public function __construct(
        string $id,
        string $title,
        string $excerpt,
        string $body,
        string $date
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
    }

    /**
     * @return Collection
     */
    public static function all(): Collection
    {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path('posts')))
                ->map(function ($post) {
                    return YamlFrontMatter::parseFile($post);
                })->map(function ($postData) {
                    return new Post($postData->id, $postData->title, $postData->excerpt, $postData->body(), $postData->date);
                })->sortByDesc('date');
        });
    }

    /**
     * @param int $postId
     *
     * @return Post|null
     */
    public static function find(int $postId): ?Post
    {
        $post = static::all()->firstWhere('id', $postId);

        return $post;
    }

    /**
     * @param int $postId
     *
     * @return Post
     */
    public static function findOrFail(int $postId): Post
    {
        $post = static::find($postId);
        if ($post == null) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
