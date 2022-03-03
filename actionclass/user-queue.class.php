<?php



class userQueueClass extends dbconnect {
    static public function addQueue(){
        $sql = "INSERT INTO data_appointment(diagnose_id_code, hospita_code, appointment_date) VALUES (?,?,?)";
        $data = array($_GET['uid'], $_POST['hospita_code'], $_POST['appointment_date']);
        self::ExecuteData($sql, $data);
        echo "<script>alert(`จองวันนัดส่งตัวรักษาเรียบร้อย`); window.location.href = `?op=user-queue-show&uid={$_GET['uid']}&dc={$_POST['appointment_date']}&hc={$_POST['hospita_code']}`</script>";
    }

    static public function getQueueAll($hospita_code){
        $sql = "SELECT * FROM data_appointment t1, data_diagnose_user t2 WHERE t1.diagnose_id_code = t2.diagnose_idCrad AND t1.hospita_code = ? AND t1.appointment_status = ?";
        $data = array($hospita_code, 0);
        return self::getExecute($sql, $data);
    }

    static public function deleteQueue($id){
        $sql = "DELETE FROM data_appointment WHERE id = ?";
        $data = array($id);
        self::ExecuteData($sql, $data);
        echo "<script>window.location.href = `?op=queue&qID={$_GET['qID']}&rp={$_GET['rp']}`;</script>";
    }
}