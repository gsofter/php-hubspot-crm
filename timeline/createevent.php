<?php require_once __DIR__ . '/../header.php'; ?>
<div class="jumbotron text-center">
	<h1> TIMELINE API TEST </h1>
</div>

<?php 

$event_data = [
	'id' 			=> $_POST['event_id'],
	'pledgeAmount'	=> $_POST['pledge_amount'],
	'eventTypeId' 	=> $_POST['event_type'],
	'email' 		=> $_POST['email'],
];

$response = TimelineAPI::CreateEvent($pledge_appid, $token, $event_data);
if($response['status'] != 204) {
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