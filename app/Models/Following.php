<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;

    protected $fillable = ['person_id', 'following_person_id', 'following_page_id', 'source_type_id'];

    public function source_type()
    {
        return  $this->belongsTo(SourceType::class);
    }

    public function user()
    {
        return  $this->hasMany(User::class, 'id', 'following_person_id');
    }

    public function page()
    {
        return  $this->hasMany(Page::class, 'id', 'following_page_id');
    }
}
