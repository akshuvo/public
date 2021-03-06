<?php

// ** MySQL settings - You can get this info from your web host ** //

if ( trim( $_SERVER['SERVER_NAME'] ) == 'helpingwall.local' ) {
    /** The name of the database for Project */
    define( 'DB_NAME', 'local' );

    /** MySQL database username */
    define( 'DB_USER', 'root' );

    /** MySQL database password */
    define( 'DB_PASSWORD', 'root' );

    /** MySQL hostname */
    define( 'DB_HOST', 'localhost' );

} else {
    // Production Defines
    define( 'DB_NAME', 'addojxhp_helpingwall' );

    /** MySQL database username */
    define( 'DB_USER', 'addojxhp_helpingwall' );

    /** MySQL database password */
    define( 'DB_PASSWORD', 'helpingwall' );

    /** MySQL hostname */
    define( 'DB_HOST', 'localhost' );
    // End Productions
}



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
    public $insert_id;
    public $last_error;

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
    
    public function query( $query, $type = '' ){

        if ( empty( $type ) ) {
            return $this->dbconn->query( $query );
        } elseif( $type == 'insert' ){
            if ( $this->dbconn->query( $query ) === TRUE ) {
                $this->insert_id = $this->dbconn->insert_id;
            } else {
                $this->last_error = "Error: " . $query . "<br>" . $this->dbconn->error;
            }
        }
        
    }

    public function get_results( $query = ''  ){
        if ( empty( $query ) ) {
            return '';
        }

        $db_query = $this->query( $query );

        if( $db_query->num_rows > 0 ){
     
            // output data of each row
            $rows = [];

            while($row = $db_query->fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
            
        }

        return false;
    }

    // Get only first row
    public function get_row( $query = '' ){
        if ( empty( $query ) ) {
            return '';
        }

        $db_query = $this->query( $query );

        if( isset( $db_query->num_rows ) && $db_query->num_rows > 0 ){
            
            return $db_query->fetch_assoc();
            
        }

        return false;
    }

    // Insert query
    public function insert( $table, $data ){
        if ( empty( $table ) ) {
            return false;
        }

        $this->insert_id = 0;
     
        $fields  = '`' . implode( '`, `', array_keys( $data ) ) . '`';
        $values  = '"' . implode( '", "', array_values( $data ) ) . '"';
        
        // Build query
        $sql = "INSERT INTO `$table` ($fields) VALUES ($values)";

        // Run query
        $db_query = $this->query( $sql, 'insert' );

        // return insert id
        return $this->insert_id;
    }

    // Update query
    public function update( $table, $data, $where ){
        if ( empty( $table ) || empty( $where ) ) {
            return false;
        }

        $this->insert_id = 0;

     
        $fields  = '`' . implode( '`, `', array_keys( $data ) ) . '`';
        $values  = '"' . implode( '", "', array_values( $data ) ) . '"';
        
        // Build query
        $sql = "UPDATE `$table` SET ";
        if ( !empty( $data ) ) {

            // Data Loop
            foreach ($data as $key => $value) {
                $sql .= "`$key` = '$value', ";
            }

            // Trim last comma
            $sql = trim($sql, ', ');
            $sql = trim($sql, ',');
            $sql .= " WHERE ";

            // Data Loop
            foreach ($where as $key => $value) {
                $sql .= "`$key` = '$value' ";
            }

            $sql .= ";";


            // Run query
            $db_query = $this->query( $sql, 'insert' );

            // return insert id
            return $this->insert_id;
        }

    }
}

function dbconn(){
    return dbconn::init();
}

dbconn();