<?php

namespace App\Helpers;



class PedidoHelper
{
	private static $statuses = [
		1 => 'EM ANDAMENTO',
		2 => 'FINALIZADO',
		3 => 'CANCELADO'
	];

	static function pedido_status(int $status): string {
		return self::$statuses[$status];
	}

	static function get_statuses(): array {
		return self::$statuses;
	}
}

