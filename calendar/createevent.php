<?php require_once __DIR__ . '/../header.php'; ?>
<div class="jumbotron text-center">
	<h1> CALENDAR API TEST </h1>
</div>

<?php
require_once __DIR__ . '/../api.php';
if(!isset($_POST['event_name'])) {
	echo "Redirecting to index";
	header("Location: calendar/index.php");
	exit;
}

$event_name = $_POST['event_name'];
$event_description = $_POST['event_description'];
$event_date = $_POST['event_date'];
$event_state = $_POST['event_state'];
$event_category = $_POST['event_category'];
$params = array(
	'name' => $event_name, 
	'description' => $event_description, 
	'eventDate' => strtotime($event_date) * 1000,
	'state' => $event_state,
	'category' => $event_category,
);
$testhapikey = "4b050595-94eb-4eff-93fc-7f2e067463dc";
$response = CalendarAPI::CreateCalendarEvent($testhapikey, $params);
if($response['status'] != 200) {
	echo "<div class='alert alert-danger' role='alert'>";
	echo $response['response'];
	echo "</div>";
	echo "<a href='/calendar/index.php'> Back </a>";
} else {
	echo "<div class='alert alert-success' role='alert'>";
  	echo $response['response'];
	echo "</div>";
	echo "<a href='/calendar/index.php'> Back </a>";
}
?>

<?php require_once __DIR__ . '/../footer.php'; ?>