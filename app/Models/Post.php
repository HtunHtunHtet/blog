<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // Post:Factory() access

    protected $guarded = [];

    //default include category and author
    protected $with = ['category', 'author'];

    //this is query scope,
    //the naming conversion is scope{naming-you-want}()
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query
            ->where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
