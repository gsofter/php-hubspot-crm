<?php
/**
* @param key 	= 9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7
* @param url 	= https://app.hubspot.com/contacts/6910819/contact/101/
* @param apiurl = https://api.hubapi.com/contacts/v1/contact/vid/101/profile
*/

/**
*
* Hubspot Contact APIs
*/

class ContactAPI {
	/**
	* Get contact profile by vid
	*
	* @param int $vid
	*/
	public static function GetContactProfileById($vid) {
		$hapikey = '9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7';
		$endpoint = 'https://api.hubapi.com/contacts/v1/contact/vid/'.$vid.'/profile/?hapikey=' . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_errors = curl_error($ch);
		// file_put_contents(__DIR__ . "/json/contact_" . time() .".json", $response);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'data' 	 => $response,
		];
	}
}

class CrmAPI {
	/**
	* Get associations for CRM object
	*
	* @param int $objId
	* @param int $defId
	* defId: 9 =>  Contact to engagement
	*/
	public static function GetAssociations($objId, $defId) {
		$hapikey = "9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7";
		$endpoint = "https://api.hubapi.com/crm-associations/v1/associations/".$objId
		."/HUBSPOT_DEFINED/". $defId ."?hapikey=" . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_errors = curl_error($ch);
		// file_put_contents(__DIR__ . "/json/association_" . time() .".json", $response);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'data' 	 => $response,
		];
	}
}

class EngagementAPI {
	/**
	* Get an engagement
	*
	* @param int $objId
	*/
	public static function GetEngagement($objId) {
		$hapikey = "9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7";
		$endpoint = "https://api.hubapi.com/engagements/v1/engagements/".$objId."?hapikey=" . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_errors = curl_error($ch);
		// file_put_contents(__DIR__ . "/json/association_" . time() .".json", $response);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'data' 	 => $response,
		];
	}
}


?>