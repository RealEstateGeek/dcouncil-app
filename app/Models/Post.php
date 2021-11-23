<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    // Don't allow id column to be mass-assigned
    protected $guarded = [
        'id',
    ];

    // Each Post belongs to one Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Each Post belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Builder $query
     * @param string[] $filters
     *
     * @return Builder $query
     */
    public function scopeFilter(Builder $query, array $filters)
    {
        // If we have GET parameters from the URI, use them to search the title and body texts
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%');
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', '=', $category);
            });
        });
        $query->when($filters['user'] ?? false, function ($query, $user) {
            $query->whereHas('user', function ($query) use ($user) {
                $query->where('id', '=', $user);
            });
        });

        return $query;
    }
}
