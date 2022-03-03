<?php


include_once('../dbconnect/dbconnect.php');
class hospitalApi extends dbconnect{
    static public function getDataHospital($date){
        // วัน เดือน ปี นี้มีโรงพยาบาลใหนว่างบ่าง!
        $sql = "SELECT * FROM `data_hospita` WHERE hospita_status = ? ";
        $data = array(0);
        $resData = self::getExecute($sql, $data);
        
        $codeID = array();
        if(count($resData) > 0){
            foreach($resData as $key=>$item){

                $sql = "SELECT * FROM data_appointment WHERE hospita_code = ? AND appointment_date = ?";
                $data = array($item['hospita_code'], $date);
                $resDasta = self::getExecute($sql, $data);
                if(count($resDasta) === 0){
                    array_push($codeID, $item['hospita_code']);
                }
            }
        }

        if(count($codeID) > 0){
            $sql = "SELECT * FROM `data_hospita` WHERE `hospita_code` IN (?)";
            $data = array(implode(',', $codeID));
            return self::getExecute($sql, $data);
        }else{
            return false;
        }
    }
}

if(isset($_POST['date'])){
    echo json_encode(hospitalApi::getDataHospital($_POST['date']));
}else{
    echo json_encode(false);
}

