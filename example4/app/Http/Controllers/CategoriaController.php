<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Request\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query = trim($request->get('searchText'));
            $categorias = DB::table('categorias') ->where('nombre','LIKE', '%'.$query.'%')
            -> where('condition', '=','1')
            -> orderBy('idcategoria', 'desc')
            -> paginate(7);
            return view('almacen.categoria.index',["categorias" => $categorias,"searchText" =>$query]);
        }
    }
    public function create()
    {
        return view("almacen.categoria.create");
    }

    public function store(CategoriaFormReques $request)
    {
        $categoria = new Categorias;
        $categoria -> nombre = $request ->get('nombre');
        $categoria -> descripcion = $request ->get('description');
        $categoria -> visibilidad = '1';
        $categoria -> save();
        
        return Redirect::to('almacen/categoria');

    }

    public function show($id)
    {
        return view("almacen.categoria.show",["categoria" => Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria" => Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria-> nombre=$request -> get('nombre');
        $categoria-> descripcion=$request -> get('descripcion');
        $categoria -> update();
        return Redirect::to('almacen/categoria');
    }

    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria -> condition='0';
        $categoria -> upadte();
        return Redirect::to('almacen/categoria');
    }
}
