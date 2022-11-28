<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estoque;
// use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\Produto;
// use Ramsey\Uuid\Type\Integer;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Produto::all()->toArray();
        $produtos = [];
        $estoques = [];
        foreach($response as $produto) {
            $categoria = Categoria::find($produto["categoria_id"])->toArray();
            $produto["categoria"] = $categoria;
            unset($produto["categoria_id"]);
            $estoque = Estoque::where('produto_id', $produto["id"])->take(1)->get()->toArray();
            $produto["estoque"] = $estoque;
            unset($produto["estoque_id"]);
            array_push($produtos, $produto);
        }
        return $produtos;
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
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'categoria_id'=> 'required'
        ]);
        $produto = Produto::create($request->toArray())->toArray();
        $estoque = Estoque::create(['quantidade'=> $request->toArray()['quantidade'] ?? 0, 'produto_id'=>$produto['id']])->toArray();
        $produto['estoque'] = $estoque;
        return $produto;
        //tenho que colocar a quantidade do produto aqui tbm 
        //pode não haver obrigatoriedade de informar o valor
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id)->toArray();
        $categoria = Categoria::find($produto["categoria_id"])->toArray();
        $estoque = Estoque::where('produto_id', $produto["id"])->take(1)->get()->toArray();
        unset($estoque["produto_id"]);
        // setar a verificação de quantidade no estoque
        $produto["categoria"] = $categoria;
        $produto["estoque"] = $estoque;
        unset($produto["categoria_id"]);
        unset($produto["estoque_id"]);
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Produto::where('id', $id)->update($request->toArray());
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Produto::destroy($id);
    }
}
