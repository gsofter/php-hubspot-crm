<?php 
require_once __DIR__ . '/api.php';
if(!isset($_GET['code'])) {
	echo "Authorization required!";
	return;
}

$code = $_GET['code'];

$pledge_app = [
	'grant_type' 	=> 'authorization_code',
	'client_id' 	=> '6ab64848-6b7f-4724-8abc-19249e071491',
	'client_secret' => '5c480ff0-c1c3-445c-9756-5dece1078f96',
	'redirect_uri' 	=> 'https://gyeworld.com/crmtest/test.php',
	'code'			=> $code, 
];

$response = AuthAPI::GetOAuthToken($pledge_app);
if($response['status'] != 200) {
	echo "Authentication failed!";
	return;
}

$token_data = json_decode($response['response'], true);
$access_token = $token_data['access_token'];
$refresh_token = $token_data['refresh_token'];
$expires_in = $token_data['expires_in'];
echo "access_token:". $access_token . "<br/>";

$pledge_appid = "209737";
$token = $access_token;
$eventTypeId = '396886';
$event_data = [
	'id' 			=> 555,
	'pledgeAmount'	=> 1000,
	'eventTypeId' 	=> $eventTypeId,
	'email' 		=> 'eyes.guard@gmail.com',
];

$response = TimelineAPI::CreateEvent($pledge_appid, $token, $event_data);
if($response['status'] != 204) {
	echo "Faield to creat event!";
} else {
	echo "<h1> Event has been updated successfully </h1>";
}

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