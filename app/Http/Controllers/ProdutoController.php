<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    
    public function index(){
        $produtos = Produto::with('categoria')->get();
        return json_encode($produtos);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        $produtos = Produto::all();
        return view('produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = Categoria::find(request()->input('categorias'));

        $produto = new Produto();
        $produto->nome = request()->input('nome_produto');
        $produto->stock = request()->input('stock');
        $produto->price = request()->input('price');
        $produto->categoria()->associate($categoria);
        $produto->save();

        return json_encode($produto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $produto = Produto::find($id);
        
        if(isset($produto)){
            return json_encode($produto);
        }

        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        if(isset($produto)){
            return view('editar_produto', compact('produto'), compact('categorias'));
        }

        return redirect()->route('produtos.index');
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
        $categoria = Categoria::find(request()->input('categorias'));
        $produto = Produto::find($id);

        if(isset($produto)){
            $produto->nome = request()->input('nome_produto');
            $produto->stock = request()->input('stock');
            $produto->price = request()->input('price');
            $produto->categoria()->associate($categoria);
            $produto->save();

            return json_encode($produto);
        }

        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(isset($produto)){
            $produto->delete();
            return response('OK', 200);
        }

        return response('PRODUTO NÃO ENCONTRADO', 404);
    }
}
