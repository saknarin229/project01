<?php 


class queueAllClass extends dbconnect {
    static public function getQueueAll($id){

        $sql = "SELECT * FROM data_appointment t1, data_diagnose_user t2 WHERE t1.diagnose_id_code = t2.diagnose_idCrad AND t1.diagnose_id_code = ?";
        // $sql = "SELECT * FROM data_appointment AS t1 INNER JOIN data_diagnose_user AS t2 ON t1.diagnose_id_code=t2.diagnose_idCrad WHERE t1.diagnose_id_code = ? AND t1.`appointment_status` = ?";
        $data = array($id);
        return self::getExecute($sql, $data);

    }
}