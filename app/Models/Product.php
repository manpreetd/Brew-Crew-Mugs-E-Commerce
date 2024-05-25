<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define a relationship between the Product and Category models
    public function category() {

        return $this->belongsTo(Category::class);

    }

    // Define a many-to-many relationship between the Product and Color models
    public function colors() {

        return $this->belongsToMany(Color::class);

    }
}

