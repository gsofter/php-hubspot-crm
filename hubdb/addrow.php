<?php
require_once __DIR__ . '/../api.php';
if(!isset($_POST['pledge_name'])) {
	echo "Redirecting to index";
	header("Location: /hubdb/");
	exit;
}
$pname = $_POST['pledge_name'];
$pamount = $_POST['pledge_amount'];
$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$new_row = array(
	'values' => [
		'1' => $pname,
		'2' => (int)$pamount,
	],
);

$response = HubDBAPI::InsertRow($testhapikey, "2038922", $new_row);
if($response['status'] == 200) {
	echo "<h3> One Row has been successfully inserted!</h3>";
	echo "<p> Check pledge on Test environment!</p>";
} else {
	echo "<h3> Insert Failed! </h3>";
	echo $response['response'];
}


?>