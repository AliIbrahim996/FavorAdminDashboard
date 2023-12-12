<?php

class User
{
    private $conn;
    private $table = 'user';
    //User Prop


    private $id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $phone;
    private $full_name;
    private $userRole;
    private $email;
    private $password;
    private $loc_lat;
    private $loc_lan;


    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function getName($id)
    {
        $q = "select CONCAT(first_name,' ',last_name) full_name  from $this->table where user_id   = ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['full_name'];
        } else {
            return "no user found!";
        }
    }

    public function deleteUser($user_id)
    {
        $q = "Delete from user where user_id = ? ";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $user_id);
        try {
            $stmt->execute();
            http_response_code(200);
            return json_encode(array(
                "message" => "user deleted successfully",
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
        $q = "select Count(*) use_count  from $this->table";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            http_response_code(200);
            return $row['use_count'];
        } else {
            return "no data found!";
        }
    }

}