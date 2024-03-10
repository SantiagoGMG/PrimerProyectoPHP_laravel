<?php

namespace App\Models;
#Estas líneas importan las clases necesarias para el modelo.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


#Aquí se define la clase Categoria, que extiende la clase Model de Laravel. 
#Esto significa que Categoria es un modelo de Eloquent, que es el ORM (Object-Relational Mapping) de Laravel.
class Categoria extends Model
{
    #Esta línea permite a tu modelo usar las fábricas de Laravel, 
    #que son una forma conveniente de generar nuevos datos de modelo para pruebas.
    use HasFactory;
    #Esta línea especifica que este modelo corresponde a la tabla categoria en tu base de datos.
    protected $table = 'categoria';
    #Aquí se establece que la clave primaria de la tabla es idcategoria.
    protected $primaryKey = 'idcategoria';
    #Esta línea indica que el modelo no debe gestionar automáticamente las columnas created_at y updated_at.
    public $timestamps = false;
    #Atributos de la tabla
    protected $fillable = [
        'nombre',
        'descripcion',
        'visibilidad'
    ];
    #Esta propiedad define los atributos que no se deben asignar en masa. 
    #Al dejarlo vacío, estás diciendo que todos los atributos del modelo pueden ser asignados en masa.

    protected $guarded = [];
}

