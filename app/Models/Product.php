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

    //building relationship between colour and product

    public function category() {

        return $this->belongsTo(Category::class);

    }

    public function colors() {

        return $this->belongsToMany(Color::class);

    }
}

