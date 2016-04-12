<?php

session_start();

if( !isset( $_SESSION[ "User" ] ) ) {
    header( "Location: ../Home.html" );
} else if( isset( $_SESSION[ "User" ] ) != "" ) {
    header( "Location: ../Home.html" );
}

if( isset( $_GET[ "Logout" ] ) ) {
    session_destroy();
    unset( $_SESSION[ "User" ] );

    header( "Location: ../Home.html" );
}