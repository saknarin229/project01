<?php

class adminAddHospitalClass extends dbconnect{
    static public function actionData(){
        $id = null;
        
        if(isset($_GET['eid']))  $id = $_GET['eid'];
        $checkData = self::getData($id);
        return count($checkData) > 0 ? self::updateData($id) : self::insertData();
    }

    static public function getDataAll(){
        $sql = "SELECT * FROM data_hospita WHERE hospita_status = ?";
        $data = array(0);
        return self::getExecute($sql, $data);
    }

    static public function getData($id){
        $sql = "SELECT * FROM data_hospita WHERE hospita_code = ?";
        $data = array($id);
        return self::getExecute($sql, $data);
    }

    static private function insertData(){

        $code = optionclass::randCode('data_hospita','hospita_code');
        $sql = "INSERT INTO data_hospita (hospita_code, hospita_name, hospita_address, hospita_agency, hospita_province, hospita_map, hospita_latAndlong) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $data = array($code, $_POST['hospita_name'], $_POST['hospita_address'], $_POST['hospita_agency'], $_POST['hospita_province'], $_POST['hospita_map'], $_POST['hospita_latAndlong']);
        self::ExecuteData($sql,$data);
        self::uploadFile($code);
        echo "<script>alert(`บันทึกข้อมูลเรียบร้อย`)</script>";
        return true;
    }

    static private function updateData($id){
        $sql = "UPDATE data_hospita SET hospita_name=?, hospita_address=?, hospita_agency=?, hospita_province=?, hospita_map=?, hospita_latAndlong=? WHERE hospita_code=?";
        $data = array($_POST['hospita_name'], $_POST['hospita_address'], $_POST['hospita_agency'], $_POST['hospita_province'], $_POST['hospita_map'], $_POST['hospita_latAndlong'], $id);
        self::ExecuteData($sql,$data);
        self::uploadFile($id);
        echo "<script>alert(`แก้ไขข้อมูลเรียบร้อย`)</script>";
        return true;
    }

    static private function uploadFile($code){

        if(!empty($_FILES['myfile'])){
            
            $resData = self::getData($code);
            if(count($resData) > 0){
                foreach($resData as $key=>$item){
                    if(file_exists($item['hospita_image'])){
                        unlink($item['hospita_image']);
                    }
                }
            }
            $pathFile = 'image/';
            $fileName = date('Ymd-His').$_FILES['myfile']['name'];
            move_uploaded_file($_FILES['myfile']['tmp_name'], $pathFile.$fileName);

            $sql = "UPDATE data_hospita SET hospita_image=? WHERE hospita_code=?";
            $data = array($pathFile.$fileName, $code);
            self::ExecuteData($sql, $data);

        }
    }

    static public function deleteFile($id){
        $resData = self::getData($id);
        if(count($resData) > 0){
            foreach($resData as $key=>$item){
                if(file_exists($item['hospita_image'])){
                    unlink($item['hospita_image']);
                }
                $sql = "UPDATE data_hospita SET hospita_image=? WHERE hospita_code=?";
                $data = array(null,$id);
                self::ExecuteData($sql, $data);
                echo "<script>window.location.href = `?op=admin-add-hospital&eid=$id`;</script>";
            }
        }
    }

    static public function updateDel($id){
        $sql = "UPDATE data_hospita SET hospita_status=? WHERE hospita_code=?";
        $data = array(2, $id);
        self::ExecuteData($sql, $data);
        echo "<script>window.location.href = `?op=admin-dashboard`</script>";
    }
}