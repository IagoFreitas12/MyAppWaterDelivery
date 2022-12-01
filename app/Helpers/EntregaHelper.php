<?php

namespace App\Helpers;

class EntregaHelper
{
	private static $statuses = [
		1 => 'A CAMINHO',
		2 => 'ENTREGUE',
	];

	static function get_statuses(): array {
		return self::$statuses;
	}

	static function entrega_status(int $status): string {
		return self::$statuses[$status];
	}
}

