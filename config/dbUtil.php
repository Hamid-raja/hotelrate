<?php 

class dbUtile{

    public $host   = "localhost";
    public $user   = "root";
    public $pass   = "9799";
    public $dbname = "hotelrate";

    public $conn;  //for connection
    public $errmsg; // for error messages

    public function __construct()
    {
        $this->connectDb();
    }

    private function connectDb()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if (!$this->conn) {
            $this->errmsg = "Connection Error";
            return false;
        }
    }

    /**
     * Select data from tables
     * parameter $query 
     * */ 
    public function select($query)
    {
        // get select record 
        // echo $query;
        $resultSel = $this->conn->query($query) or  die($this->conn->connect_error . __LINE__);
        if ($resultSel->num_rows > 0) {
            return $resultSel;
        } else {
            return false;
        }
    }

    /**
     * Insert record in database
     */
    public function insert($query)
    {
        //insert record
        // echo $query;
        $insertRow = $this->conn->query($query) or  die($this->conn->connect_error."". __LINE__);
        if ($insertRow) {
            return $insertRow;
        } else {
            return false;
        }
    }

    /**
     * Update database table record
     */
    public function update($query)
    {
        $updateRow = $this->conn->query($query) or   die($this->conn->connect_error . __LINE__);
        if ($updateRow) {
            return $updateRow;
        } else {
            return false;
        }
    }

    /**
     * Delete record from database table
     */
    public function delete($query)
    {
        $deleteRow = $this->conn->query($query) or  die($this->conn->connect_error . __LINE__);
        if ($deleteRow) {
            return $deleteRow;
        } else {
            return false;
        }
    }
}

?>