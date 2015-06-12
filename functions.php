<?php
use google\appengine\api\taskqueue\PushTask;

//Fastest way I could think of was to use Memcache

/**
 *  Saves to the database
 * @param mixed $dataToSave
 * @return string
 */

function saveUser($userData){
	//some unique id
	$id= uniqid();

	$memcache = new Memcache;
	
	$userData['code']=rand(1000,9999);
	
	$memcache->set($id, $userData);
	
	sendWelcomeMessage($id);
	//assuming everything went well!
//	queueUpWelcomeMessage($id);
					
	return $id;
	
}

/**
 * 
 * @param string $id - id of user in database
 * @return mixed
 */
function readUser($id){
	
	$memcache = new Memcache;
	
	return $memcache->get($id);
	
}

/**
 * Sends a welcome message to a user
 * @param $id string - id of the user in database
 * @return string
 */

function sendWelcomeMessage($id){

	//simulate network/service delay
	sleep(3);
	
	$recipientData = readUser($id);
	
	$recipient = $recipientData['mobile_number'];
	$code = $recipientData['code'];
	
	$message=  "Thank you for signing up on DevCodeLab! Your verification code is $code.";
	
	$query = array(
		'username' => 'inis-dclabs', 'password' => 'dc0labs1', 'source' => 'DevCodeLab',
		'message' => $message,
		'destination' => $recipient, 'type'=>5, 'dlr' => 0,
	 );
	
	$baseUrl='http://bulksms.initsng.com/bulksms/bulksms?';
	
	 $url = $baseUrl . http_build_query($query);
	
	return file_get_contents($url);
	
}





/**
 * 
 * @param string $id id of the user to send a welcome message to
 * @return mixed - autogenerated task name
 */

function queueUpWelcomeMessage($id){

	$task = new PushTask('/messages.php', ['id' => $id]);
	
	return $task->add();
	
}