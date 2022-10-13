<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use SoftDeletes;
    protected $table = 'provincias'; //este nombre de la tabla ,lo saco del archivo
                                    //de migraciones. El modelo Provincia esta MAPEANDO a la tabla
                                    //provincias que se creara en una variable.
    protected $primarykey = 'id';

    protected $connection = 'mysql';
    protected $fillable  =[     //Solo van los datos que no son la clave primaria
        'nombre'
    ];
}
