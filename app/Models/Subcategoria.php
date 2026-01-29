<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
class Subcategoria extends Model{

    use HasFactory;

    protected $fillable  = ['categoria_id','categoria_nome'];


}
