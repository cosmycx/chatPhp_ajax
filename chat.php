<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'chat';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//-----------------------------------------------------------------------
if (isset ( $_POST['mess'] ) ) {

	$chatMessage = mysqli_real_escape_string($conn, $_POST['mess']);

	//$chatMessage = $_POST['mess'];

	if ($chatMessage !=''){
		mysqli_query($conn, "INSERT INTO message(message) VALUES ('$chatMessage')");
	}
}
//-------------------------------------------------------------------------
if (isset ( $_POST['chat'] ) ) {

	$allMessages = mysqli_query($conn, "SELECT * FROM message");

	while( $getData = mysqli_fetch_array($allMessages, MYSQLI_ASSOC) ){
		$chatMess = $getData['message'];
		echo $chatMess.'<br/>';
	}

}

?>