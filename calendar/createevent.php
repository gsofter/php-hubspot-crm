<?php
require_once __DIR__ . '/../api.php';
if(!isset($_POST['event_name'])) {
	echo "Redirecting to index";
	header("Location: /calendar/");
	exit;
}

$event_name = $_POST['event_name'];
$event_description = $_POST['event_description'];
$params = array(
	'name' => $event_name, 
	'description' => $event_description, 
);
$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";

$response = CalendarAPI::CreateCalendarEvent($testhapikey, $params);
echo $response['response'];
?>