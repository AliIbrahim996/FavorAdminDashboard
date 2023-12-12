<?php

class Restaurant
{
    private $conn;
    private $table = 'restaurant';


    public function getDir()
    {
        return $this->dir;
    }


    public function __construct(PDO $db)
    {
        $this->conn = $db;

    }

    function delete($rest_id)
    {
        $q = "Delete from $this->table where id = ? ";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $rest_id);
        try {
            $stmt->execute();
            http_response_code(200);
            return json_encode(array(
                "message" => "restaurant deleted successfully",
                "flag" => 1
            ));
        } catch (Exception $e) {
            http_response_code(401);
            return json_encode(array(
                "message" => "something went wrong! " . $e->getMessage(),
                "flag" => -1
            ));
        }
    }

    public function getCount()
    {
        $q = "select Count(*) rest_count  from $this->table";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            http_response_code(200);
            return $row['rest_count'];
        } else {
            http_response_code(404);
            return "no data found!";
        }
    }
}
