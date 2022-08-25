<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'destination', 'slug', 'category_id', 'code', 'is_active'
    ];

    public function statistics()
    {
        return $this->hasMany(Statistics::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
