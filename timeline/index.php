<?php require_once __DIR__ . '/../header.php'; ?>
	<div class="jumbotron text-center">
		<h1> Timeline API TEST </h1>
	</div>
<?php
require_once __DIR__ . '/../api.php';
$code = $_GET['code'];
$pledge_app = [
	'grant_type' 	=> 'authorization_code',
	'client_id' 	=> '5879ea6d-0f52-4dc5-b71e-32ed54306d97',
	'client_secret' => '3d7c66fb-4822-4735-9640-4dcdb057d6ee',
	'redirect_uri' 	=> 'http://localhost/timeline/index.php',
	'code'			=> $code, 
];

$response = AuthAPI::GetOAuthToken($pledge_app);
if($response['status'] != 200) {
	echo "<div class='alert alert-danger' role='alert'>";
	echo $response['response'];
	echo "</div>";
	echo "<a href='/calendar/index.php'> Back </a>";
	require_once __DIR__ . '/../footer.php';
	return;
}

$token_data = json_decode($response['response'], true);
$access_token = $token_data['access_token'];
$refresh_token = $token_data['refresh_token'];
$expires_in = $token_data['expires_in'];
echo "<div class='alert alert-danger' role='alert'>";
echo "access_token:". $access_token . "<br/>";
echo "</div>";

$pledge_appid = "209702";
$token = $access_token;
$eventTypeId = '396886';
?>

<div class="row">
	<div class="container">
		<h3 class="text-center"> And Pledge Event to Timeline </h3>
		<form method="post" action="createevent.php"> 
			<div class="form-group">
				<label for="event-id"> Event ID </label>
				<input class="form-control" name="event_id" id="event-id"/>
			</div>
			<div class="form-group">
				<label for="pledge-amount"> Pledge Amount </label>
				<input class="form-control" name="pledge_amount" id="pledge-amount" type="number" />
			</div>
			<div class="form-group">
				<label for="access-token"> Access Token </label>
				<input class="form-control" name="access_token" id="access-token" value="<?php echo $token; ?>" disabled />
			</div>
			<div class="form-group">
				<label for="app-id"> App ID </label>
				<input class="form-control" name="app_id" id="app-id"/>
			</div>
			<div class="form-group">
				<label for="email"> Email </label>
				<input class="form-control" name="email" id="email" value="eyes.guard@gmail.com" />
			</div>
			<div class="form-group">
				<label for="event-type"> Event Type ID</label>
				<input class="form-control" name="event_type" id="event-type" value="<?php echo $eventTypeId ?> " disabled/>
			</div>
			<div class="form-control"> 
				<input type="submit" name="submit">
			</div>
		</form>
	</div> 
</div>
<?php


// $event_type = [
// 	'name' => "TestEventType",
// 	'applicationId' => "209702",
// 	'headerTemplate' => 'Pledge Activity',
// 	'detailTemplate' => '{{ webinarName }} {{#formatDate timestamp}}{{/formatDate}}',
// ];

// $response = TimelineAPI::CreateEventType($event_type);
// $newtype = json_decode($response['response'], true);
// $etypeid = $newtype['id'];
// echo json_encode($response);
// echo $etypeid;

// $property = [
// 	'name' => 'webinarName',
// 	'label' => 'Webinar Name',
// 	'propertyType' => 'String',
// ];
// $appid = "209737";
// $response = TimelineAPI::SetEventProperties($etypeid, $property);
// echo json_encode($response);

?>
<?php require_once __DIR__ . '/../footer.php'; ?>