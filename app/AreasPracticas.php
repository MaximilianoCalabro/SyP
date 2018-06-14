<?php

namespace SyP;

use Illuminate\Database\Eloquent\Model;

class AreasPracticas extends Model
{
    protected $table='areas_practicas';

	protected $primaryKey='id_areas_practicas';

	public $timestamps=false;

	protected $fillable =[
		'titulo',
		'texto',
		'imagen', 
		'practica', 
		'texto_practica',
		'icono'
	];

	protected $guarded =[

	];
}
