<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
        'categoryDescription',
        'categoryThumbnail',
        'slug'
    ];

    /**
     * Get all of the albums for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
