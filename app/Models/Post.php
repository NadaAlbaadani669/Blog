<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    // protected $guarded =['id'];   // all allowed exept id.
    protected $fillable = ['title', 'excerpt','body','slug','category_id','user_id'];  //just the writen ones.

    public function scopeFilter($query,array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where(fn($query)=>
                $query->where('title','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%')
            )
        );
        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query)=>
                $query->where('slug',$category)
            )

        );
        $query->when($filters['auther'] ?? false, fn($query, $user)=>
            $query->whereHas('user', fn($query)=>
                $query->where('name',$user)
            )

        );

        return $query;

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
