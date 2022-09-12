<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;
    
    protected $table = 'lib_sexo';
    protected $primaryKey = 'cod_sexo';
    protected $fillable = ['descripcion'];
    public $timestamps= false;
public function autores()
{//descripcion  derelacion de el lado de 1 a muchos, 1 sexo puede pertenecer a varios autores
    return $this->hasMany(Autor::class, 'cod_sexo','cod_sexo');
}
}
