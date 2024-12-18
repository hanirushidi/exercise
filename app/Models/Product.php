<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Add the fillable property to allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}