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

 
// /* Attempt to connect to MySQL database */
// $dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// // Check connection
// if( $dbconn === false ){
//     die("ERROR: Could not connect. " . $dbconn->connect_error);
// }

final class dbconn{ 

    public $dbconn;

    function __construct(){
        /* Attempt to connect to MySQL database */
        $this->dbconn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
         
        // Check connection
        if( $this->dbconn === false ){
            die("ERROR: Could not connect. " . $this->dbconn->connect_error);
        }

    }

    /**
     * Initializes a singleton instance
     *
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }
    
    public function query( $query ){
        return $this->dbconn->query( $query);
    }

    public function get_results( $query = '' ){
        if ( empty( $query ) ) {
            return '';
        }

        $db_query = $this->query( $query );

        if( $db_query->num_rows > 0 ){
            return $db_query->fetch_assoc();
        }

        return false;
    }
}

function dbconn(){
    return dbconn::init();
}

dbconn();