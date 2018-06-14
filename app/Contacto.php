<?php

namespace SyP;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table='contacto';

	protected $primaryKey='id_contacto';

	public $timestamps=false;

	protected $fillable =[
		'direccion',
		'ubicacion',
		'telefono', 
		'correo'
	];

	protected $guarded =[

	];
}
