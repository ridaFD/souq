<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'user_id',
        'description',
        'price',
        'image',
    ];

    public function getImageAttribute($value)
    {
        return asset($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
