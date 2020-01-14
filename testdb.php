<?php
require_once __DIR__ . '/api.php';

// Get all HubDB tables
$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$response = HubDBAPI::GetAllTables($testhapikey);
// echo $response['response'];

$new_tbl = array(
	'name' => 'New pledge',
	'columns' => [
		[
			'name' => 'pledge_name',
			'type' => 'TEXT',
		],
		[
			'name' => 'pledge_amount',
			'type' => 'NUMBER',
		],
		[
			'name' => 'pledge_date',
			'type' => 'DATE',
		],
	],
);

// Create a new HubDB table
$response = HubDBAPI::CreateTable($testhapikey, $new_tbl);
$tb = json_decode($response['response'], true);
$tbId = $tb['id'];
$new_row = array(
	'values' => [
		'1' => 'Contract with Ivan',
		'2' => 1000,
	],
);

$response = HubDBAPI::InsertRow($testhapikey, $tbId, $new_row);
?>