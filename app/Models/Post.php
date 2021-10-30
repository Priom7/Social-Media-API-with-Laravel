<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'user_id', 'page_id', 'source_type_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function page()
    {
        return  $this->belongsTo(Page::class);
    }

    public function source_type()
    {
        return   $this->belongsTo(SourceType::class);
    }
}
