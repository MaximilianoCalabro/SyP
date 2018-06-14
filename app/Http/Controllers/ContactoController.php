<?php

namespace SyP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SyP\Contacto;
use SyP\Http\Requests\ContactoFormRequest;
use DB;

class ContactoController extends Controller
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
    		$contacto=DB::table('contacto')->get();
    		return view('contacto.configurar_contacto.index',["contacto"=>$contacto,"searchText"=>$query]);
    	}
    }
    public function create()
    {
    	return view ("contacto.configurar_contacto.create");
    }
	public function store(ContactoFormRequest $request)
	{
		$contacto=new Contacto;

		$contacto->direccion=$request->get('direccion');
		$contacto->ubicacion=$request->get('ubicacion');
		$contacto->telefono=$request->get('telefono');
		$contacto->correo=$request->get('correo');
		$contacto->save();
		return Redirect::to('contacto/configurar_contacto');
	}
	public function show($id)
	{
		return view("contacto.configurar_contacto.show",["contacto"=>Contacto::findOrFail($id)]);
	}
	public function edit($id)
	{
		return view("contacto.configurar_contacto.edit",["contacto"=>Contacto::findOrFail($id)]);	
	}
	public function update(ContactoFormRequest $request, $id)
	{
		$contacto=Contacto::findOrFail($id);
		$contacto->direccion=$request->get('direccion');
		$contacto->ubicacion=$request->get('ubicacion');
		$contacto->telefono=$request->get('telefono');
		$contacto->correo=$request->get('correo');
		$contacto->update();
		return Redirect::to('contacto/configurar_contacto');
	}
	public function destroy($id)
	{
		$contacto=Contacto::findOrFail($id);
		$contacto->delete();
		return Redirect::to('contacto/configurar_contacto');
	}
}
