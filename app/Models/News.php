<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
