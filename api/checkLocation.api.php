<?php

include_once('../dbconnect/dbconnect.php');
class checkLocationApi extends dbconnect{
    static public function getLocation($key){
        $sql = "SELECT * FROM data_subdis WHERE name = ?";
        $data = array($key);
        $res = self::getExecute($sql, $data);
        if(count($res) > 0){
            return $res[0]['location'];
        }

        return null;
    }
}

echo json_encode(checkLocationApi::getLocation($_POST['word']));