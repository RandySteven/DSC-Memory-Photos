<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'albumName',
        'albumThumbnail',
        'albumDescription',
        'slug',
        'user_id',
        'category_id'
    ];

    /**
     * Get the user that owns the Album
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that owns the Album
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catagory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
