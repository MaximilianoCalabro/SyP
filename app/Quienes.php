<?php

namespace SyP;

use Illuminate\Database\Eloquent\Model;

class Quienes extends Model
{
    protected $table='quienes';

	protected $primaryKey='quienes';

	public $timestamps=false;

	protected $fillable =[
		'imagen',
		'titulo',
		'texto'
	];

	protected $guarded =[

	];
}
