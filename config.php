<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for Project */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

 
/* Attempt to connect to MySQL database */
$dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// Check connection
if( $dbconn === false ){
    die("ERROR: Could not connect. " . $dbconn->connect_error);
}