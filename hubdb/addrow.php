<?php
require_once __DIR__ . '/../api.php';

$pname = $_POST['pledge_name'];
$pamount = $_POST['pledge_amount'];
$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$new_row = array(
	'values' => [
		'1' => $pname,
		'2' => (int)$pamount,
	],
);

// echo $pamount;
$response = HubDBAPI::InsertRow($testhapikey, "2038922", $new_row);
echo $response['response'];
?>