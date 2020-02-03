<?php require_once __DIR__ . '/../header.php'; ?>
<div class="jumbotron text-center">
	<h1> TIMELINE API TEST </h1>
</div>

<?php
require_once __DIR__ . '/../api.php';
$event_data = [
	'id' 			=> $_POST['event_id'],
	'pledgeAmount'	=> $_POST['pledge_amount'],
	'eventTypeId' 	=> $_POST['event_type'],
	'email' 		=> $_POST['email'],
];

$response = TimelineAPI::CreateEvent($_POST['app_id'], $_POST['access_token'], $event_data);
if($response['status'] != 204) {
	echo "<div class='alert alert-danger' role='alert'>";
	echo "<h3> Whoops! Something went wrong </h3>";
	echo $response['response'];
	echo "</div>";
	echo "<a href='/timeline/index.php'> Back </a>";
} else {
	echo "<div class='alert alert-success' role='alert'>";
	echo "<h3> Timeline Event Create Success! </h3>";
	echo $response['response'];
	echo "</div>";
	echo "<a href='/timeline/index.php'> Back </a>";
}

require_once __DIR__ . '/../footer.php';
?>