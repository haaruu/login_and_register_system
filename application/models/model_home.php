<?php

class Model_Home extends Model
{
		
    public function get_user($table) {
        $sql = "SELECT * FROM $table";
        $result = $this->connect()->query($sql);
        $numRows =  $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function findEmail($email) { 
        $sql="SELECT * FROM users WHERE email = '$email'";
        $result = $this->connect()->query($sql);
        $numRows =  $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getEmail($email) { 
        $sql="SELECT * FROM users WHERE email = '$email'";
        return $this->connect()->query($sql);
    }

    public function checkEmail($email) {
        $result = $this->getEmail($email);
        if(mysqli_num_rows($result) >0) {
            return false;
        } else {
            return true;
        }
    }

    public function findInDb($email, $password) {
        $datas = $this->findEmail($email);
        $result = $this->getEmail($email);

         if(mysqli_num_rows($result) >0) { 
            foreach ($datas as $data) {

                $dbPassword = $data['password'];
                $userId = $data['id'];

                if(password_verify($password, $dbPassword)){

                    return ['status' => 'ok', 'data' => $userId];

                } else {
                    return ['status' => 'passwordNotMacthed'];
                }
            }
        } else {
            return ['status' => 'emailNotFound'];
        }
    }
    
}
