<?php 
/**
* @param key 	= 9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7
* @param url 	= https://app.hubspot.com/contacts/6910819/contact/101/
* @param apiurl = https://api.hubapi.com/contacts/v1/contact/vid/101/profile
*/

require_once __DIR__ . '/api.php';
$contactResponse = ContactAPI::GetContactProfileById(101);
$userdata = [];
if($contactResponse['status'] != 200) {
	echo "API server error";
	exit();
} else {
	$data = json_decode($contactResponse['data'], true);
	$userdata['email'] = $data['properties']['email']['value'];
	$userdata['mobilephone'] = $data['properties']['mobilephone']['value'];
	$userdata['firstname'] = $data['properties']['firstname']['value'];
	$userdata['lastname'] = $data['properties']['lastname']['value'];
	$userdata['phone'] = $data['properties']['phone']['value'];	
}

$crmResponse = CrmAPI::GetAssociations(101, 9);
$engagements = [];
$notes = [];
$calls = [];
$tasks = [];
if($crmResponse['status'] != 200) {
	echo "API server error";
	exit();
} else {
	$data = json_decode($crmResponse['data'], true);
	$ids = $data['results'];
	foreach ($ids as $no => $id) {
		$response = EngagementAPI::GetEngagement($id);
		if($response['status'] == 200) {
			$newEngage = [];
			// echo $response['data'];
			$data = json_decode($response['data'], true);
			if($data['engagement']['type'] == "NOTE") {
				$newEngage['type'] = $data['engagement']['type'];
				$newEngage['body'] = $data['metadata']['body'];
				$newEngage['created_at'] = date('Y/m/d h:i:s', substr($data['engagement']['createdAt'], 0, 10));
				$newEngage['updated_at'] = date('Y/m/d h:i:s', substr($data['engagement']['lastUpdated'], 0, 10));
				$notes[] = $newEngage;
			}
			else if($data['engagement']['type'] == "CALL") {
				$newEngage['type'] = $data['engagement']['type'];
				$newEngage['body'] = $data['metadata']['body'];
				$newEngage['created_at'] = date('Y/m/d H:i:s', substr($data['engagement']['createdAt'], 0, 10));
				$newEngage['updated_at'] = date('Y/m/d H:i:s', substr($data['engagement']['lastUpdated'], 0, 10));
				$calls[] = $newEngage;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> PHP HUBSPOT CRM | API INTEGRATION </title>
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
	<section id="contact">
		<div class="container">
			<div class="profile-item row" >
				<div class="col-md-3 title"> <p> Firstname </p> </div>
				<div class="col-md-6 content"> <p> <?php echo $userdata['firstname'] ?></p> </div>
			</div>

			<div class="profile-item row">
				<div class="col-md-3 title"> <p> Lastname </p> </div>
				<div class="col-md-6 content"> <p> <?php echo $userdata['lastname'] ?></p> </div>
			</div>

			<div class="profile-item row">
				<div class="col-md-3 title"> <p> Email </p> </div>
				<div class="col-md-6 content"> <p> <?php echo $userdata['email'] ?></p> </div>
			</div>

			<div class="profile-item row">
				<div class="col-md-3 title"> <p> Phone </p> </div>
				<div class="col-md-6 content"> <p> <?php echo $userdata['phone'] ?></p> </div>
			</div>
		</div>
	</section>
	<section id="notes">
		<div class="container">
			<h2> NOTES </h2>
			<table class="table table-striped">
				<thead> 
					<th> No </th>  
					<th> Type </th>  
					<th> Content </th>  
					<th> CreatedAt </th>  
					<th> UpdatedAt </th>  
				</thead>
				<tbody>
				<?php foreach ($notes as $no => $note) { ?>
					<tr> 
						<td> <?php echo $no+1; ?> </td>
						<td> <?php echo $note['type']; ?> </td>
						<td> <?php echo $note['body']; ?> </td>
						<td> <?php echo $note['created_at']; ?> </td>
						<td> <?php echo $note['updated_at']; ?> </td>
					</tr>
				<?php } ?>		
				</tbody>
			</table>
		</div> 
	</section>
	<section id="notes">
		<div class="container">
			<h2> CALLS </h2>
			<table class="table table-striped">
				<thead> 
					<th> No </th>  
					<th> Type </th>  
					<th> Content </th>  
					<th> CreatedAt </th>  
					<th> UpdatedAt </th>  
				</thead>
				<tbody>
				<?php foreach ($calls as $no => $call) { ?>
					<tr> 
						<td> <?php echo $no+1; ?> </td>
						<td> <?php echo $call['type']; ?> </td>
						<td> <?php echo $call['body']; ?> </td>
						<td> <?php echo $call['created_at']; ?> </td>
						<td> <?php echo $call['updated_at']; ?> </td>
					</tr>
				<?php } ?>		
				</tbody>
			</table>
		</div> 
	</section>
</body>
</html>