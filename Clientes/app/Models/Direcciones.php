<?php

namespace Clientes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = "clientes_direcciones";

    public $timestamps = false;

    protected $fillable = [

        'Id',
        'Identificacion',
        'Direccion',
        'Tipo_Direccion'
    ];

    protected $guarded = [
    ];
}
