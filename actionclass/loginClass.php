<?php

class loginClass extends dbconnect{
    static public function Login(){
        $sql = "SELECT * FROM admin WHERE username = ? AND password = ? AND status = ?";
        $data = array($_POST['username'], $_POST['password'], 0);
        $resData = self::getExecute($sql, $data);
        if(count($resData) > 0){
            foreach($resData as $key=>$item){
                $_SESSION['id'] =  $item['id'];
                $_SESSION['adminName'] =  $item['adminName'];
                echo "<script>location.href = 'index.php?op=admin-dashboard'</script>";
            }
        }else{
            echo "<script>alert('Email หรือ Password ไม่ถูกต้อง!')</script>";
        }
    }
}