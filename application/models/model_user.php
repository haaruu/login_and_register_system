<?php

class Model_User extends Model
{

	public function findUserName($userId) { 
        $sql="SELECT * FROM users WHERE id = '$userId'";
        $result = $this->connect()->query($sql);
        $numRows =  $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
	}
	
	public function insertAttr($userId, $attrName, $attrValue) {

		$sql = "INSERT INTO attributes (name) VALUES ('$attrName');";
		$sql .= "INSERT INTO attrValues (userId, attrId, attrValue) VALUES ('$userId', LAST_INSERT_ID(), '$attrValue')";

		return $this->connect()->multi_query($sql);
	}
	

	public function getEmail($email) { 
        $sql="SELECT * FROM users WHERE email = '$email'";
        return $this->connect()->query($sql);
    }
	
	public function getData($userId) { 
		$sql="SELECT * FROM attributes, attrvalues WHERE userId = '$userId' AND attributes.id = attrId";
        $result = $this->connect()->query($sql);
        $numRows =  $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
	}

	public function edit_data($id){

		$sql="SELECT * FROM attributes WHERE id = '$id'";
        $result = $this->connect()->query($sql);
        $numRows =  $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
		}
    }

    public function updateAttr($attrName, $attrValue, $attrId){

		$sql="UPDATE attributes SET name = '$attrName' WHERE id = $attrId;";
		$sql .= "UPDATE attrvalues SET attrValue = '$attrValue' WHERE attrId = $attrId;";

		return $this->connect()->multi_query($sql);

	}

	public function deleteAttr($attrId) {

		$sql="DELETE FROM attributes WHERE id = $attrId;";
		$sql .= "DELETE FROM attrValues WHERE attrId = $attrId;";

		return $this->connect()->multi_query($sql);
	}
	
	
}
