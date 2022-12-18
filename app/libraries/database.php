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
}