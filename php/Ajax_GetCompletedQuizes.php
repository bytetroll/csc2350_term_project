<?php

session_start();

$Secure = array("ForceOnInvalid" => true, "ForceOnSession" => false);
( @include_once('../php/Secure.php')) or die( "\"../php/Secure.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('server.php')) or die( "\"server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

$UserID = $_SESSION["User"];
$Start = $_POST["start"];
$Limit =  max(0, min(20, $_POST["limit"]));

$Query = mysqli_query($Server->Connection, "SELECT * FROM quizes_completed WHERE UserID=$UserID ORDER BY QuizCompletedID desc LIMIT $Limit OFFSET $Start");

$Data = [];
while($Row = mysqli_fetch_array($Query))
{
    $Data[] = array(
        "Grade" => $Row["Grade"],
        "Name" => mysqli_fetch_array(mysqli_query($Server->Connection, "SELECT Name as '_' FROM quizes WHERE QuizID=" . $Row["QuizID"]))["_"],
        "UserID" => mysqli_fetch_array(mysqli_query($Server->Connection, "SELECT username as '_' FROM users WHERE UserID=" . $Row["OwnerID"]))["_"]
    );
}

echo json_encode($Data);