<?php
require_once __DIR__ . '/../api.php';
if(isset($_COOKIE['access_token'])) {
	if(strval($_COOKIE['expire']) >= time()){
		$access_token = $_COOKIE['access_token'];
		$expire = strval($_COOKIE['expire']);
	}
	else
		header("Location: /timeline/auth.php");	
} else {
	header("Location: /timeline/auth.php");
}

$pledge_appid = "209702";
$token = $access_token;
$eventTypeId = '396886';
$email = 'eyes.guard@gmail.com';
?>

<?php require_once __DIR__ . '/../header.php'; ?>
<div class="jumbotron text-center">
	<h1> Timeline API TEST </h1>
</div>
<div class="row">
	<div class="container">
		<h3 class="text-center"> And Pledge Event to Timeline </h3>
		<div class="alert alert-info"> 
			<?php $date = date('Y-m-d h:i:s', $expire); ?>
			<p> Token will be expire in <?php echo $date; ?></p>
		</div>
		<div class="card p-5 col-md-8">
			<form method="post" action="createevent.php">
				<div class="form-group row">
					<label class="col-md-3" for="email"> Email </label>
					<input class="form-control col-md-9" name="email" id="email" value="<?php echo $email; ?>"/>
				</div>
				<div class="form-group row">
					<label class="col-md-3" for="event-id"> Event ID </label>
					<input class="form-control col-md-9" name="event_id" id="event-id"/>
				</div>
				<div class="form-group row">
					<label class="col-md-3" for="pledge-amount"> Pledge Amount </label>
					<input class="form-control col-md-9" name="pledge_amount" id="pledge-amount" type="number" />
				</div>
				<div class="form-group row">
					<label class="col-md-3" for="access-token"> Access Token </label>
					<input class="form-control col-md-9" id="access-token" value="<?php echo $token; ?>" disabled/>
					<input class="form-control" name="access_token" value="<?php echo $token; ?>" hidden/>
				</div>
				<div class="form-group row">
					<label class="col-md-3" for="app-id"> App ID </label>
					<input class="form-control col-md-9" id="app-id" value="<?php echo $pledge_appid; ?>" disabled/>
					<input class="form-control" name="app_id" value="<?php echo $pledge_appid; ?>" hidden/>
				</div>
				<div class="form-group row">
					<label class="col-md-3" for="event-type"> Event Type ID</label>
					<input class="form-control col-md-9" id="event-type" value="<?php echo $eventTypeId ?> " disabled/>
					<input class="form-control" name="event_type" value="<?php echo $eventTypeId ?> " hidden/>
				</div>
				<div class="form-group"> 
					<input type="submit" name="submit" class="btn btn-primary">
				</div>
			</form>
		</div>
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