<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\ItemDeEntrega;
use App\Models\Pedido;
use Exception;
use Illuminate\Http\Request;

class EntregasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Entrega::all()->toArray();
        $entregas = [];
        foreach ($response as $entrega) {
            $itens_de_entrega = ItemDeEntrega::where('entrega_id', $entrega['id'])->get()->toArray();
            $entrega['itens_de_entrega'] = $itens_de_entrega;
            array_push($entregas, $entrega);
        }
        return $entregas;
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
    public function store()
    {
        $entrega = Entrega::create();
        return $entrega;
    }

    public function addItemDeEntrega(Request $request, $entrega_id)
    {
        $pedido_id = $request->toArray()['pedido_id'];
        $pedido = Pedido::where([
            'status' => 2,
            'id' => $pedido_id
        ])->get()->toArray();
        if($pedido == []) {
            throw new Exception('Pedido não finalizado');
        }
        return ItemDeEntrega::create([
            'pedido_id' => $pedido_id,
            'entrega_id' => $entrega_id,
            'status' => 1
        ]);
    }

    public function finishingItemDeEntrega($entrega_id, $item_de_entrega_id)
    {
        $item_de_entrega = ItemDeEntrega::where([
            'entrega_id' => $entrega_id,
            'id' => $item_de_entrega_id,
            'status' => 1
        ])->take(1)->get()->toArray();
        if (count($item_de_entrega) == 0) {
            throw new Exception('Não foi encontrado item de entrega com o status em andamento com este id');
        }
        ItemDeEntrega::where('id', $item_de_entrega_id)->update(['status' => 2]);
        return $this->show($entrega_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrega = Entrega::findOrFail($id)->toArray();
        $itens_de_entrega = ItemDeEntrega::where('entrega_id', $id)->get()->toArray();
        $entrega['itens_de_entrega'] = $itens_de_entrega;
        return $entrega;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
