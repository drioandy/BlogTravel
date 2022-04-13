<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = 'bookmarks';
    protected $fillable = ['name', 'description', 'post_id', 'user_id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
}
