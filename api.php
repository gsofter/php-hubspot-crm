<?php
/**
* @param key 	= 9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7
* @param url 	= https://app.hubspot.com/contacts/6910819/contact/101/
* @param apiurl = https://api.hubapi.com/contacts/v1/contact/vid/101/profile
*/
class HubspotAPI {
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
		@curl_close($ch);
		return [
			'status' => $status_code,
			'result' => json_decode($response),
		];
	}
}
?>