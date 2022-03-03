<?php


class userDataClass extends dbconnect{
    static public function action(){
        $id = null;
        if(isset($_GET['eid'])) $id = $_GET['eid'];
        $checkData = self::getDataUser($id);
        return count($checkData) > 0 ? self::updateData($id) : self::insertData();
    }

    static private function insertData(){ // เพิ่มผู้ป่วย

        $sql = "INSERT INTO data_diagnose_user(diagnose_fullname, diagnose_id_code, diagnose_idCrad, diagnose_birthday, diagnose_age, diagnose_province, diagnose_district, diagnose_sub_district, diagnose_Date_first_admission, diagnose_right_reatment, diagnose_sub_right, diagnose_Filter1, diagnose_Craniofacial_filter, diagnose_Filtering_Craniofacial_Syndromic, diagnose_syndrome, diagnose_more, diagnose_latAndlong) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $data = array($_POST['diagnose_fullname'], $_POST['diagnose_id_code'], $_POST['diagnose_idCrad'], $_POST['diagnose_birthday'], $_POST['diagnose_age'], $_POST['diagnose_province'], $_POST['diagnose_district'], $_POST['diagnose_sub_district'], $_POST['diagnose_Date_first_admission'], $_POST['diagnose_right_reatment'], $_POST['diagnose_sub_right'], $_POST['diagnose_Filter1'], $_POST['diagnose_Craniofacial_filter'], $_POST['diagnose_Filtering_Craniofacial_Syndromic'], $_POST['diagnose_syndrome'], $_POST['diagnose_more'], $_POST['diagnose_latAndlong']);

        self::ExecuteData($sql, $data);
        echo "<script>alert(`บันทึกข้อมูลเรียบร้อย`);</script>";
        return true;
    }

    static private function updateData($id){ //แก้ไขผู้ป่วย

        $sql = "UPDATE data_diagnose_user SET diagnose_fullname=?, diagnose_id_code=?, diagnose_idCrad=?, diagnose_birthday=?, diagnose_age=?, diagnose_province=?, diagnose_district=?, diagnose_sub_district=?, diagnose_Date_first_admission=?, diagnose_right_reatment=?, diagnose_sub_right=?, diagnose_Filter1=?, diagnose_Craniofacial_filter=?, diagnose_Filtering_Craniofacial_Syndromic=?, diagnose_syndrome=?, diagnose_more=?, diagnose_latAndlong=? WHERE diagnose_id=?";

        $data = array($_POST['diagnose_fullname'], $_POST['diagnose_id_code'], $_POST['diagnose_idCrad'], $_POST['diagnose_birthday'], $_POST['diagnose_age'], $_POST['diagnose_province'], $_POST['diagnose_district'], $_POST['diagnose_sub_district'], $_POST['diagnose_Date_first_admission'], $_POST['diagnose_right_reatment'], $_POST['diagnose_sub_right'], $_POST['diagnose_Filter1'], $_POST['diagnose_Craniofacial_filter'], $_POST['diagnose_Filtering_Craniofacial_Syndromic'], $_POST['diagnose_syndrome'], $_POST['diagnose_more'], $_POST['diagnose_latAndlong'], $id);

        self::ExecuteData($sql, $data);
        echo "<script>alert(`แก้ไขข้อมูลเรียบร้อย`);</script>";
        return true;
    }

    static public function getDataUser($id){
        $sql = "SELECT * FROM data_diagnose_user WHERE diagnose_id = ?";
        $data = array($id);
        return self::getExecute($sql, $data);
    }

    static public function getDataCodeUser($id){
        $sql = "SELECT * FROM data_diagnose_user WHERE diagnose_idCrad = ?";
        $data = array($id);
        return self::getExecute($sql, $data);
    }    

    static public function getDataUserAll(){
        $sql = "SELECT * FROM data_diagnose_user WHERE diagnose_status = ?";
        $data = array(0);
        return self::getExecute($sql, $data);
    }

    static public function updateDelData($id){
        $sql = "UPDATE data_diagnose_user SET diagnose_status = ? WHERE diagnose_id = ?";
        $data = array(2,$id);
        self::ExecuteData($sql, $data);
        echo "<script>window.location.href = `?op=user-data-list`</script>";
        return true;
    }
}