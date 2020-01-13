<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    public function index(){
        $categorias = Categoria::all();
        return json_encode($categorias);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        $categoria = Categoria::all();
        return view('categorias', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nova_categoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->name = request()->input("nome_categoria");
        $categoria->save();

        return json_encode($categoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if(isset($categoria))
            return json_encode($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        if(isset($categoria)){
            return view('editar_categoria', compact('categoria'));
        }

        return redirect()->route('categorias.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if(isset($categoria)){
            $categoria->name = request()->input('nome_categoria');
            $categoria->save();

            return json_encode($categoria);
        }

        return response('CATEGORIA NÃO ENCONTRADA', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if(isset($categoria)){
            $categoria->delete();
            return response('OK', 200);
        }

        return response('CATEGORIA NÃO ENCONTRADA', 404);
    }

    public function indexJson()
    {
        $categoria = Categoria::all();
        return json_encode($categoria);
    }
}
