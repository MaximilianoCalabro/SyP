<?php

namespace SyP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SyP\Quienes;
use SyP\Http\Requests\QuienesFormRequest;
use DB;

class QuienesController extends Controller
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
    		$quienes=DB::table('quienes')->get();
    		return view('quienes.configurar_quienes.index',["quienes"=>$quienes,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view ("quienes.configurar_quienes.create");
    }
	public function store(QuienesRequest $request)
	{
		$quienes=new Quienes;

		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$quienes->imagen=$file->getClientOriginalName();
		}
		$quienes->titulo=$request->get('titulo');
		$quienes->texto=$request->get('texto');
		$quienes->save();
		return Redirect::to('quienes.configurar_quienes');
	}
	public function show($id)
	{
		return view("quienes.configurar_quienes.show",["quienes"=>Quienes::findOrFail($id)]);
	}
	public function edit($id)
	{
		return view("quienes.configurar_quienes.edit",["quienes"=>Quienes::findOrFail($id)]);	
	}
	public function update(QuienesFormRequest $request, $id)
	{
		$quienes=Quienes::findOrFail($id);
		
		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$quienes->imagen=$file->getClientOriginalName();
		}
		$quienes->titulo=$request->get('titulo');
		$quienes->texto=$request->get('texto');
		$quienes->update();
		return Redirect::to('quienes.configurar_quienes');
	}
	public function destroy($id)
	{
		$quienes=Quienes::findOrFail($id);
		$quienes->delete();
		return Redirect::to('quienes.configurar_quienes'); 
	}
}
