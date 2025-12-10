<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany(Post::class);

    }

    public function category() {
        return $this->hasMany(Category::class);
    }

    //Relasi BelongsTo untuk User
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Tetep ada BG composibility
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
