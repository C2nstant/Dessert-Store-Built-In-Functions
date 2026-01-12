<?php

declare(strict_types = 1);

function get_reorder_message (int $stock_level): string {
	
	if ($stock_level < 10) {
		$message = "Yes";
	} else {
		$message = "No";
	}
	
	return $message;
}

function get_total_value (float $price, int $quantity) : float {
	
	$total_value = $price * $quantity;
	
	return $total_value;
	
}

function get_tax_due (float $price, int $quantity, int $tax_rate = 0) : float {
	
	$total_tax_due = $price * $quantity * ($tax_rate / 100);
	
	return $total_tax_due;
	
}

?>