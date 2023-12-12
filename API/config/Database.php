<?php


class Database
{
    //DB parms
    private  $host;
    private  $db_name;
    private  $username;
    private  $password;

    //DB Conn

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->host = 'localhost';
        $this->db_name = 'smarttra_favor_ios';
        $this->username = 'smarttra_student';
        $this->password = '&[JT}iml?&rq';
    }

    /**
     * @return PDO
     */

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO('mysql:host=localhost;dbname=' . $this->db_name,
                $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $conn;
    }
}