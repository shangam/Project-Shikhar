<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'short_description', 'status', 'long_description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

    public function price()
    {
        return $this->hasMany(Price::class);
    }
}
