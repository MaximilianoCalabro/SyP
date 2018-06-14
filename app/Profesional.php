<?php

namespace SyP;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table='prefesional';

	protected $primaryKey='id_prefesional';

	public $timestamps=false;

	protected $fillable =[
		'imagen',
		'titulo',
		'presentacion',
		'nombre',		 
		'puesto'
	];

	protected $guarded =[

	];
}
