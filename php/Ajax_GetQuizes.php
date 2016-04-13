<?php

session_start();

( @include_once('Secure.php')) or die( "\"Secure.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('server.php')) or die( "\"server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

$UserID = $_SESSION["User"];
$Start = $_POST["start"];
$Limit =  max(0, min(20, $_POST["limit"]));

$Query = mysqli_query($Server->Connection, "SELECT QuizID, Name, UserID FROM quizes ORDER BY UserID desc LIMIT $Limit OFFSET $Start");

$Data = [];
while($Row = mysqli_fetch_array($Query))
{
    $Data[] = array(
        "Name" => $Row["Name"],
        "ID" => $Row["QuizID"],
        "UserID" => mysqli_fetch_array(mysqli_query($Server->Connection, "SELECT username as '_' FROM users WHERE UserID=$UserID"))["_"]
    );
}

echo json_encode($Data);