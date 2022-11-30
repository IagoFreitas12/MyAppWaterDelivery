<?php

namespace App\Helpers;

class EntregaHelper
{ 
	static function entrega_status(int $status): string {
		return [
			1 => 'A CAMINHO',
			2 => 'ENTREGUE',
		][$status];
	}
}

