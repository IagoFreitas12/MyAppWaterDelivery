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
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
