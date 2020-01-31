<?php 
	require_once __DIR__ . '/../header.php';
?>
<?php
/**
* @param key 	= 9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7
* @param url 	= https://app.hubspot.com/contacts/6910819/contact/101/
* @param apiurl = https://api.hubapi.com/contacts/v1/contact/vid/101/profile
*/

require_once __DIR__ . '/../api.php';
$contactResponse = ContactAPI::GetContactProfileById(101);
$userdata = [];
echo json_encode($contactResponse);
exit;

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

<?php 
	require_once __DIR__ . '/../footer.php';
?>