<?php
//ARCHIVO MODIFICADO, SE AGREGA LA LINEA QUE RELACIONA EL MODELO 
//CON LA TABLA, ESTO ES PORQUE EL MODELO NO SE LLAMA IGUAL QUE LA TABLA
//ESTO PUEDE MEJORARSE USANDO LAS CONVENCIONES ASI NO SE TENDRÍA QUE ESTABLECER
//MANUALMENTE
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    //----LINEA AGREGADA
    protected $table='computers';
    //----LINEA AGREGADA

    //linea agregada de Mutador SET Y GET
    protected function model(): Attribute
    {
        return Attribute::make(
            set: function (string $value){
                return strtolower($value);
            },
            //AQUI PUEDE IR EL GET
            get: function (string $value){
                return strtoupper($value);
            }
        );
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime', //se establece que devolverá DATETIME
            'is_active' => 'boolean' //se establece que devolverá BOOLEAN
        ];
    }
}
