<?php

session_start();

if( isset( $_SESSION[ "User" ] ) != "" ) {
    header( "Location: ../UserHome.html" );
}

( @include_once( 'Server.php' ) ) or die( "\"Server.php\" is required to run this demo, but could not be found on the local server" );

$Server = Server::Reference();
$Server->AttemptConnection();


if( isset( $_POST[ "SignUp" ] ) ) {
    $Username = mysqli_real_escape_string( $Server->Connection, $_POST[ "Username" ] );
    $Email = mysqli_real_escape_string( $Server->Connection, $_POST[ "Email" ] );
    $Password = md5( mysqli_real_escape_string( $Server->Connection, $_POST[ "Password" ] ) );

    if( $Server->ExecuteQuery( "INSERT INTO Users( Username, Email, Password ) VALUES( '$Username', '$Email', '$Password' )" ) ) {
        header( "Location: ../RegistrationSuccessful.html" );
    } else {
        header( "Location: ../RegistrationUnsuccessful.html" );
    }
}

$Server->ReleaseConnection();