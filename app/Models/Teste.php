<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste extends Model{
    use HasFactory;
    protected $table = 'testes';
    protected $fillable = [
    'nome',
    'category',
    'seller',
    'published',
    'ratings',
    'reviewCount',
    'price',
    'orders',
    'stocks',
    'revenue',
    'sizes',
    'colors',
    'description',
    'features',
    'services',
    'images',
    'colorVariant',
    'manufacture_name',
    'manufacture_brand'
    ];

}
