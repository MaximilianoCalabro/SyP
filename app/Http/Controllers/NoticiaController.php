<?php

namespace SyP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SyP\Noticia;
use SyP\Http\Requests\NoticiaFormRequest;
use DB;

class NoticiaController extends Controller
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
    		$noticia=DB::table('noticia')->get();
    		return view('noticia.configurar_noticia.index',["noticia"=>$noticia,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view ("noticia.configurar_noticia.create");
    }
	public function store(NoticiaRequest $request)
	{
		$noticia=new Noticia;

		$noticia->titulo=$request->get('titulo');
		$noticia->texto=$request->get('texto');
		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$noticia->imagen=$file->getClientOriginalName();
		}
		$noticia->save();
		return Redirect::to('noticia.configurar_noticia');
	}
	public function show($id)
	{
		return view("noticia.configurar_noticia.show",["noticia"=>Noticia::findOrFail($id)]);
	}
	public function edit($id)
	{
		return view("noticia.configurar_noticia.edit",["noticia"=>Noticia::findOrFail($id)]);	
	}
	public function update(NoticiaFormRequest $request, $id)
	{
		$noticia=Noticia::findOrFail($id);
		
		$noticia->titulo=$request->get('titulo');
		$noticia->texto=$request->get('texto');
		if (Input::hasFile ('imagen')){
			$file=Input::file('imagen');
			$file->move(public_path().'/img/',$file->getClientOriginalName());
			$noticia->imagen=$file->getClientOriginalName();
		}
		$noticia->update();
		return Redirect::to('noticia.configurar_noticia');
	}
	public function destroy($id)
	{
		$noticia=Noticia::findOrFail($id);
		$noticia->delete();
		return Redirect::to('noticia.configurar_noticia'); 
	}
}
