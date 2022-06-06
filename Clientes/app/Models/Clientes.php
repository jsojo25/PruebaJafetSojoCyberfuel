<?php

namespace Clientes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes_datos";

    protected $primaryKey = 'Identificacion';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Apellido1',
        'Apellido2',
        'CorreoContacto',
        'Telefono'
    ];

    protected $guarded = [

    ];
}
