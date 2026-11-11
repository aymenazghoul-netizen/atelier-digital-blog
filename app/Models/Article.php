<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'published'
    ];

    protected function casts(): array
    {
        return [
            'published' => 'boolean'
        ];
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
