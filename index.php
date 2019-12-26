<?php 
/**
* @param key 	= 9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7
* @param url 	= https://app.hubspot.com/contacts/6910819/contact/101/
* @param apiurl = https://api.hubapi.com/contacts/v1/contact/vid/101/profile
*/

require_once __DIR__ . '/api.php';
$profile = HubspotAPI::GetContactProfileById(101);
echo json_encode($profile);
?>
<!DOCTYPE html>
<html>
<head>
	<title> PHP HUBSPOT CRM | API INTEGRATION</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron text-center">
		<h1> PHP Hubpot CRM API integration</h1>
		<p>Test project!</p>
	</div>
	<div class="container">
		<div class="profile-itme">
			<div class="col-6">
				<p> username </p>
			</div>
			<div class="col-6">
				
			</div>
		</div>
	</div>
</body>
</html>