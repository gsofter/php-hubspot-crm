<?php
/**
* @param key 	= 9f487cb8-c9fc-4a4a-8b6a-2a2f482261e7
* @param url 	= https://app.hubspot.com/contacts/6910819/contact/101/
* @param apiurl = https://api.hubapi.com/contacts/v1/contact/vid/101/profile
*
* developer account
* @param appid 	= 209702
* @param clientid = 5879ea6d-0f52-4dc5-b71e-32ed54306d97
* @param clientsecret = 3d7c66fb-4822-4735-9640-4dcdb057d6ee
* @param userid = 7909886
* @param apikey = 3606359a-4148-401f-976a-7b888453aaff
*/

/**
*
* Hubspot Contact APIs
*/

class ContactAPI {
	/**
	* Get all contacts
	*
	* @param string $hapikey
	* @param int $count
	*/
	public static function GetAllContacts($hapikey, $count=5) {
		$endpoint = 'https://api.hubapi.com/contacts/v1/lists/all/contacts/all?hapikey='.$hapikey.'&count='.$count;
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
			'response' 	 => $response,
		];
	}

	/**
	* Get contact profile by vid
	*
	* @param string $hapikey
	* @param int $vid
	*/
	public static function GetContactProfileById($hapikey, $vid) {
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

	
	/**
	* Create contact
	*
	* @param string $hapikey
	* @param array $data
	*/
	public static function CreateContact($hapikey, $data) {
		$endpoint = 'https://api.hubapi.com/contacts/v1/contact/?hapikey=' . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_errors = curl_error($ch);
		
		@curl_close($ch);
		return [
			'status' => $status_code,
			'response' 	 => $response,
		];
	}


	/**
	* Create or update a group of contacts
	*
	* @param string $hapikey
	* @param array $array
	* @return status
	*/
	public static function UpdateContactProperties($hapikey, $array) {
		$endpoint = "https://api.hubapi.com/contacts/v1/contact/batch/?hapikey=" . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' => $status_code,
		];
	}

	/**
	* Update an existing contact
	*
	* @param string $hapikey
	* @param array $array
	* @param int $vid
	* @return status
	*/
	public static function UpdateContact($hapikey, $vid, $array) {		
		$endpoint = "https://api.hubapi.com/contacts/v1/contact/vid/101/profile?hapikey=" . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' => $status_code,
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

class TimelineAPI {
	/**
	* Create an Event Type
	*
	* @param array $array
	* @return status, response
	*/
	public static function CreateEventType($array) {
		$appid = "209702";
		$devhapikey = "3606359a-4148-401f-976a-7b888453aaff";
		$endpoint = "https://api.hubapi.com/integrations/v1/". $appid ."/timeline/event-types?hapikey=".$devhapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'response' => $response,
		];
	}

	/**
	* Set Event Properties for given event_type_id
	*
	* @param string $appid
	* @param int $etypeid
	* @param array $array
	* @return status, response
	*/
	public static function SetEventProperties($appid, $etypeid, $array) {
		$devhapikey = "3606359a-4148-401f-976a-7b888453aaff";
		$endpoint = "https://api.hubapi.com/integrations/v1/". $appid."/timeline/event-types/".$etypeid."/properties?hapikey=".$devhapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' 	=> $status_code,
			'response' 	=> $response,
		];
	}

	/**
	* Create Event
	*
	* @param string $appid
	* @param string $token
	* @param array $event_data
	* @return status, response 
	*/

	public static function CreateEvent($appid, $token, $event_data) {
		$endpoint = "https://api.hubapi.com/integrations/v1/".$appid."/timeline/event";
		$header = [];
		$header[] = "Content-type: application/json";
		$header[] = "Authorization: Bearer ".$token;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($event_data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' 	=> $status_code,
			'response' 	=> $response,
		];
	}
}

class AuthAPI {
	/**
	* Authorize
	*
	*/
	public static function Authorize() {
	}

	/**
	* Get Access Token
	*
	* @param array $array 
	* @return status, response 
	*/
	public static function GetOAuthToken($array) {
		$header = "Content-Type: application/x-www-form-urlencoded;charset=utf-8";
		$endpoint = "https://api.hubapi.com/oauth/v1/token";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' 	=> $status_code,
			'response' 	=> $response,
		];
	}
}

class HubDBAPI {
	/**
	* Get all 
	*
	* @param string $hapikey
	* 
	*/
	public static function GetAllTables($hapikey) {
		$endpoint = "https://api.hubapi.com/hubdb/api/v2/tables?hapikey=".$hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'response' => $response,
		];
	}

	/**
	* Create a new Table
	*
	* @param string $hapikey
	* @param array $data
	* 
	*/
	public static function CreateTable($hapikey, $data) {
		$endpoint = "https://api.hubapi.com/hubdb/api/v2/tables?hapikey=".$hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' 	=> $status_code,
			'response' 	=> $response,
		];
	}

	/**
	* Update a Table
	*
	* @param string $hapikey
	* @param string $tblId
	* @param array $data
	* 
	*/
	public static function UpdateTable($hapikey, $tblId, $data) {
		$endpoint = "https://api.hubapi.com/hubdb/api/v2/tables/360123?hapikey=".$hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	}

	/**
	* Get Table Rows
	*
	* @param string $hapikey
	* @param string $portalId
	* 
	*/
	public static function GetTableRows($portalId, $tblId) {
		$endpoint = "https://api.hubapi.com/hubdb/api/v2/tables/".$tblId."/rows?portalId=".$portalId;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'response' => $response,
		];	
	}
	/**
	* Add a new row to table
	*
	* @param string $hapikey
	* @param string $tblId
	* @param array $row
	* 
	*/
	public static function InsertRow($hapikey, $tblId, $row) {
		$endpoint = "https://api.hubapi.com/hubdb/api/v2/tables/".$tblId."/rows?hapikey=".$hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($row));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' => $status_code,
			'response' => $response,
		];
	}
}

class CalendarAPI {
	/**
	* Get a event
	* 
	* @param string $hapikey
	* @param string $start_date
	* @param string $end_date
	* @param int $limit
	*/
	public function GetCalendarEvents($hapikey, $start_date, $end_date, $limit=2) {
		$endpoint = "https://api.hubapi.com/calendar/v1/events?startDate=".$start_date."&endDate=".$end_date."&limit=100&hapikey=".$hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' 	=> $status_code,
			'response' 	=> $response,
		];
	}

	/**
	* Get a even
	* 
	* @param string $hapikey
	* @param array $data
	*/
	public static function CreateCalendarEvent($hapikey, $data) {
		$endpoint = "https://api.hubapi.com/calendar/v1/events/task?hapikey=" . $hapikey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		@curl_close($ch);
		return [
			'status' 	=> $status_code,
			'response' 	=> $response,
		];
	}
}
?>