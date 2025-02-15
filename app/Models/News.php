<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'author_id',
    ];

    protected static function booted(): void
    {
        static::updated(function (News $news) {
            if ($news->wasChanged("image")) {
                Storage::disk("public")->delete($news->getOriginal("image"));
            }
        });
        static::deleted(function (News $news) {
            Storage::disk("public")->delete($news->getOriginal("image"));
        });
    }

    public function getAuthorName(): string
    {
        return $this->author?->name ?? "Admin";
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
