<?php

class Comment
{
    private $conn;
    private $table = 'comment';


    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    function updateComment($data)
    {
        $q = "Update comment set 
                content = ? , time = ?,
                user_id = ? ,
                restaurant_id = ? 
                where id = ? ";


        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $data->content);
        $stmt->bindParam(2, $data->time);
        $stmt->bindParam(3, $data->user_id);
        $stmt->bindParam(4, $data->restaurant_id);
        $stmt->bindParam(5, $data->comment_id);
        try {
            $stmt->execute();
            http_response_code(200);
            return json_encode(
                array(
                    "message" => "comment updated successfully",
                    "flag" => 1
                )
            );
        } catch (Exception $e) {
            http_response_code(401);
            return json_encode(
                array(
                    "message" => "something went wrong! " . $e->getMessage(),
                    "flag" => -1
                )
            );
        }
    }

    public function delete($c_id)
    {
        $q = "Delete from $this->table where id = ? ";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $c_id);
        try {
            $stmt->execute();
            http_response_code(200);
            return json_encode(array(
                "message" => "comment deleted successfully",
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
        $q = "select Count(*) co_count  from $this->table";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['co_count'];
        } else {
            return "no data found!";
        }
    }

}