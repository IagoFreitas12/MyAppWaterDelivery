<?php

namespace App\Helpers;

class PedidoHelper
{ 
	static function pedido_status(int $status): string {
		return [
			1 => 'EM ANDAMENTO',
			2 => 'FINALIZADO',
			3 => 'CANCELADO'
		][$status];
	}
}

