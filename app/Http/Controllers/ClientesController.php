<?php

namespace App\Http\Controllers;

use App\Helpers\PedidoHelper;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\ItemDePedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Cliente::all()->toArray();
        $clientes = [];
        foreach ($response as $cliente) {
            $enderecos = Endereco::where('cliente_id', $cliente['id'])->get()->toArray();
            $cliente['enderecos'] = $enderecos;
            array_push($clientes, $cliente);
        }
        return $clientes;
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
            'cpf_cnpj' => 'required',
            'telefone' => 'required'
        ]);
        $cliente = Cliente::create($request->toArray());
        return $cliente;
    }

    public function addAddress(Request $request, $id)
    {
        $endereco = Endereco::create([
            'latitude' => $request->toArray()['latitude'],
            'longitude' => $request->toArray()['longitude'],
            'cliente_id' => $id
        ]);
        return $this->show($id);
    }

    public function addOrder(Request $request, $id)
    {
        $pedido = Pedido::create([
            'cliente_id' => $id,
            'status' => 1,
            ...$request->toArray()
        ]);
        return $pedido;
    }

    public function addOrderItem(Request $request, $cliente_id, $pedido_id)
    {
        $request->validate([
            'produto_id' => 'required',
            'quantidade' => 'required'
        ]);
        $produto = Produto::findOrFail($request->toArray()['produto_id'])->toArray();
        $itemDePedido = ItemDePedido::create([
            'quantidade' => $request->toArray()['quantidade'],
            'preco' => $produto['preco'],
            'pedido_id' => $pedido_id,
            'produto_id' => $request->toArray()['produto_id']
        ]);
        return $itemDePedido;
    }

    public function getPedidos($cliente_id)
    {
        $response = Pedido::where('cliente_id', $cliente_id)->get()->toArray();
        $pedidos = [];
        foreach ($response as $pedido) {
            $pedido['itens'] = [];
            $pedido['status_description'] = PedidoHelper::pedido_status($pedido['status']);
            $itensDePedido = ItemDePedido::where('pedido_id', $pedido['id'])->get()->toArray();
            foreach ($itensDePedido as $itemDePedido) {
                array_push($pedido['itens'], $itemDePedido);
            }
            array_push($pedidos, $pedido);
        }
        return $pedidos;
    }

    public function getPedido($pedido_id)
    {
        $pedido = Pedido::findOrFail($pedido_id)->toArray();
        $pedido['itens'] = [];
        $pedido['status_description'] = PedidoHelper::pedido_status($pedido['status']);
        $itensDePedido = ItemDePedido::where('pedido_id', $pedido_id)->get()->toArray();
        foreach ($itensDePedido as $itemDePedido) {
            array_push($pedido['itens'], $itemDePedido);
        }
        return $pedido;
    }

    public function changePedidoStatus($cliente_id, $pedido_id, $status)
    {
        Pedido::where('id', $pedido_id)->update([
            'status' => $status
        ]);
        return $this->getPedido($pedido_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id)->toArray();
        $enderecos = Endereco::where('cliente_id', $id)->get()->toArray();
        $cliente['enderecos'] = $enderecos;
        return $cliente;
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
        Cliente::findOrFail($id)->update($request->toArray());
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
        return Cliente::destroy($id);
    }
}
