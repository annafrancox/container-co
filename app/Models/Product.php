<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'price',
        'container_id',
        'category_id',
    ];

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
