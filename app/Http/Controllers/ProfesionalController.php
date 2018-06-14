<?php

namespace SyP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SyP\Profesional;
use SyP\Http\Requests\ProfesionalFormRequest;
use DB;

class ProfesionalController extends Controller
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
    		$profesional=DB::table('profesional')->get();
    		return view('profesional.configurar_profesional.index',["profesional"=>$profesional,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view ("profesional.configurar_profesional.create");
    }
	public function store(ProfesionalRequest $request)
	{
		$profesional=new Profesional;

		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$profesional->imagen=$file->getClientOriginalName();
		}
		$profesional->titulo=$request->get('titulo');
		$profesional->presentasion=$request->get('presentasion');
		$profesional->nombre=$request->get('nombre');
		$profesional->puesto=$request->get('puesto');
		$profesional->save();
		return Redirect::to('profesional.configurar_profesional');
	}
	public function show($id)
	{
		return view("profesional.configurar_profesional.show",["profesional"=>Profesional::findOrFail($id)]);
	}
	public function edit($id)
	{
		return view("profesional.configurar_profesional.edit",["profesional"=>Profesional::findOrFail($id)]);	
	}
	public function update(ProfesionalFormRequest $request, $id)
	{
		$profesional=Profesional::findOrFail($id);
		
		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$profesional->imagen=$file->getClientOriginalName();
		}
		$profesional->titulo=$request->get('titulo');
		$profesional->presentasion=$request->get('presentasion');
		$profesional->nombre=$request->get('nombre');
		$profesional->puesto=$request->get('puesto');
		$profesional->update();
		return Redirect::to('profesional.configurar_profesional');
	}
	public function destroy($id)
	{
		$profesional=Profesional::findOrFail($id);
		$profesional->delete();
		return Redirect::to('profesional.configurar_profesional'); 
	}
}
