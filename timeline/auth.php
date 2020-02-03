<?php
if(!isset($_GET['code'])) {
	header("Location: https://app.hubspot.com/oauth/authorize?client_id=5879ea6d-0f52-4dc5-b71e-32ed54306d97&redirect_uri=http://localhost/timeline/auth.php&scope=contacts%20content%20timeline");
	exit;
}

require_once __DIR__ . "/../api.php";
$code = $_GET['code'];
$pledge_app = [
	'grant_type' 	=> 'authorization_code',
	'client_id' 	=> '5879ea6d-0f52-4dc5-b71e-32ed54306d97',
	'client_secret' => '3d7c66fb-4822-4735-9640-4dcdb057d6ee',
	'redirect_uri' 	=> 'http://localhost/timeline/auth.php',
	'code'			=> $code, 
];

$response = AuthAPI::GetOAuthToken($pledge_app);
if($response['status'] != 200) {
	require_once __DIR__ . '/../header.php';
	?>
	<div class="jumbotron text-center">
		<h1> TIMELINE API TEST </h1>
	</div>

	<?php
	echo "<div class='alert alert-danger' role='alert'>";
	echo "<h3> Authentication Failed </h3>";
	echo $response['response'];
	echo "</div>";
	echo "<a href='/timeline/index.php'> Back </a>";
	require_once __DIR__ . '/../footer.php';
	return;
}

$token_data = json_decode($response['response'], true);
$access_token = $token_data['access_token'];
$refresh_token = $token_data['refresh_token'];
$expires_in = $token_data['expires_in'];
setcookie('access_token', $access_token);
setcookie('expire', time() + $expires_in);

require_once __DIR__ . "/../header.php";
?>
<div class="jumbotron text-center">
	<h1> CALENDAR API TEST </h1>
</div>

<?php
echo "<div class='alert alert-success' role='alert'>";
echo "<h3> Authentication Success </h3>";
echo "access_token:". $access_token . "<br/>";
echo $response['response'];
echo "</div>";
require_once __DIR__ . "/../footer.php";
?>
