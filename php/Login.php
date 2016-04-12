<?php

( @include_once('server.php')) or die( "\"server.php\" is required to run this demo, but could not be found on the local server" );
( @include_once( 'Alert.php' ) ) or die( "\"Alert.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();

session_start();

if( isset( $_SESSION[ "User" ] ) ) {
    header( "Location: ../Home.php" );
}

if( isset( $_POST[ "Login" ] ) ) {
    $Email = mysqli_real_escape_string( $Server->Connection, $_POST[ "Email" ] );
    $Password = mysqli_real_escape_string( $Server->Connection, $_POST[ "Password" ] );

    $Query = mysqli_query( $Server->Connection, "SELECT * FROM Users WHERE Email='$Email'" );
    $Row = mysqli_fetch_array( $Query );

    if( $Row[ "Password" ] == md5( $Password) ) {
        $_SESSION[ "User" ] = $Row[ "UserID" ];

        header( "Location: ../Home.html" );
    } else {
        ShowAlert( "Incorrect login details" );
    }
}