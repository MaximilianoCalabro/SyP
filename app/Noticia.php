<?php

namespace SyP;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table='noticia';

	protected $primaryKey='id_noticia';

	public $timestamps=false;

	protected $fillable =[
		'titulo',
		'texto',
		'imagen'
	];

	protected $guarded =[

	];
}
