<?php

session_start();

$Secure = array("ForceOnInvalid" => true, "ForceOnSession" => false);
( @include_once('../php/Secure.php')) or die( "\"../php/Secure.php\" is required to run this demo, but could not be found on the local server" );
( @include_once('server.php')) or die( "\"server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

if( isset( $_POST[ "QuizData" ] ) ) {
    $UserID = $_SESSION["User"];
    $QuizID = $_POST["QuizID"];
    $OwnerID = mysqli_fetch_array(mysqli_query($Server->Connection, "SELECT UserID as '_' FROM quizes WHERE QuizID=$QuizID"))["_"];
    $Data = $_POST["QuizData"];

    // Get Answers
    $Result = json_decode($Data);
    $Answers = json_decode(mysqli_fetch_array(mysqli_query($Server->Connection, "SELECT Answers as '_' FROM quizes WHERE QuizID=$QuizID"))["_"]);

    // Calculate Grade
    $Grade = 0.0;
    for ($i = 0; $i < count($Result); $i++)
    {
        $Grade += $Result[$i] == $Answers[$i];
    }
    $Grade = ceil(($Grade / count($Result)) * 100.0);

    $Server->ExecuteQuery( "INSERT INTO quizes_completed( QuizID, UserID, Data, OwnerID, Grade ) VALUES( '$QuizID', '$UserID', '$Data', '$OwnerID', '$Grade' )" );
    header( "Location: ../views/User.php" );
}

$Server->ReleaseConnection();