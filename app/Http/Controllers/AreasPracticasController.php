<?php

namespace SyP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SyP\AreasPracticas;
use SyP\Http\Requests\AreasPracticasFormRequest;
use DB;

class AreasPracticasController extends Controller
{
	public function __construct()
    {
    	// $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$areas_practicas=DB::table('areas_practicas')->get();
    		return view('areas_practicas.configurar_areas_practicas.index',["areas_practicas"=>$areas_practicas,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view ("areas_practicas.configurar_areas_practicas.create");
    }
	public function store(AreasPracticasFormRequest $request)
	{
		$areas_practicas=new AreasPracticas;

		$areas_practicas->titulo=$request->get('titulo');
		$areas_practicas->texto=$request->get('texto');
		$areas_practicas->practica=$request->get('practica');
		$areas_practicas->texto_practica=$request->get('texto_practica');
		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$areas_practicas->imagen=$file->getClientOriginalName();
		}
		$areas_practicas->save();
		return Redirect::to('areas_practicas/configurar_areas_practicas');
	}
	public function show($id)
	{
		return view("areas_practicas.configurar_areas_practicas.show",["areas_practicas"=>AreasPracticas::findOrFail($id)]);
	}
	public function edit($id)
	{
		return view("areas_practicas.configurar_areas_practicas.edit",["areas_practicas"=>AreasPracticas::findOrFail($id)]);	
	}
	public function update(AreasPracticasFormRequest $request, $id)
	{
		$areas_practicas=AreasPracticas::findOrFail($id);
		
		$areas_practicas->titulo=$request->get('titulo');
		$areas_practicas->texto=$request->get('texto');
		$areas_practicas->practica=$request->get('practica');
		$areas_practicas->texto_practica=$request->get('texto_practica');
		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$areas_practicas->imagen=$file->getClientOriginalName();
		}
		$areas_practicas->update();
		return Redirect::to('areas_practicas/configurar_areas_practicas');
	}
	public function destroy($id)
	{
		$areas_practicas=AreasPracticas::findOrFail($id);
		$areas_practicas->delete();
		return Redirect::to('areas_practicas/configurar_areas_practicas');
	}
}
