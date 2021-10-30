<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'body', 'user_id'
    ];

    public function post()
    {
        return  $this->hasMany(Post::class);
    }

    public function user()
    {
        return   $this->belongsTo(User::class);
    }

    public function followers()
    {
        return  $this->hasMany(Following::class);
    }
}
