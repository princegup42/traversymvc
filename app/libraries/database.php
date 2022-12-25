<?php

/**
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind Values
 * Return rows and results
 */
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;
    public function __construct() {
        // Set DSN
        $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        ];
        // create a PDO Instance
        try {
            $this->dbh = new PDO( $dsn, $this->user, $this->pass, $options );
        } catch ( PDOException $e ) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare statement with query function
     *
     * @param [type] $sql
     * @return void
     */
    public function query( $sql ) {
        $this->stmt = $this->dbh->prepare( $sql );
    }

    /**
     * Bind Value function
     *
     * @param [type] $param
     * @param [type] $value
     * @param [type] $type
     * @return void
     */
    public function bind( $param, $value, $type = null ) {
        if ( is_null( $type ) ) {
            switch ( $type ) {
            case is_int( $value ):
                $type = PDO::PARAM_INT;
                break;
            case is_bool( $value ):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null( $value ):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
                // break;
            }
        }

        $this->stmt->bindValue( $param, $value, $type );
    }

    /**
     * Execute the prepared statement function
     *
     * @return void
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /**
     * Get Result set as array of objects function
     *
     * @return void
     */
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll( PDO::FETCH_OBJ );
    }

    /**
     * Get single record as object function
     *
     * @return void
     */
    public function single() {
        $this->execute();
        return $this->stmt->fetch( PDO::FETCH_OBJ );
    }

    /**
     * Get row count function
     *
     * @return void
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}