<?php
require_once __DIR__ . '/api.php';

$vid = '101';
$gyeuserid =  '98271';
$status = 'Green - got something this year (no more follow up needed)';
$latest_pledge = array(
	'pledge_date' => date("Y/m/d",strtotime('2019-12-25')),
	'pledge_type' => 'Will try',
	'total_pledge' => '100.60',
	'currency' => 'USD',
	'installments' => 'One time',
);
$rating = '1';


$array = [
	"properties" => [
		[
			'property' => "email",
			'value' => 'new@hubspot.com'
		],
		[
			'property' => "firstname",
			'value' => 'aaa'
		],
		[
			'property' => "currency",
			'value' => $latest_pledge['currency']
		],
		[
			'property' => "gyeuserid",
			'value' => '98271'
		],
		[
			'property' => "marital_status",
			'value' => $status
		],
		[
			'property' => "rating",
			'value' => $rating
		],
		// [
		// 	'property' => "pledge_date",
		// 	'value' => $latest_pledge['pledge_date']
		// ],
		[
			'property' => "pledge_type",
			'value' => $latest_pledge['pledge_type']
		],
		[
			'property' => "pledge_total",
			'value' => $latest_pledge['total_pledge']
		],
		[
			'property' => "pledge_installments",
			'value' => $latest_pledge['installments']
		],
		[
			'property' => "pledge_currency",
			'value' => $latest_pledge['currency']
		],
	],
];

$response = ContactAPI::UpdateContact(101, $array);
echo json_encode($response);
?>