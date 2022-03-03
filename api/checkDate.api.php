
<?php 

class checkDateApiClass {
    static public function checkDate($birthday, $myThis){
        
        $birthday = date_create($birthday);
        $birthday = date_format($birthday, 'Y-m-d');

        $finalDate = self::MonthPlus($birthday, 5);
        $finalDate = date_create($finalDate);
        $finalDate = date_format($finalDate, 'Y-m-d');

        $thisDate = date_create($myThis);
        $thisDate = date_format($thisDate, 'Y-m-d');

        if($thisDate > $finalDate){
            
            return 'วันส่งตัวรักษาที่คุณเลือกมากกว่า 5 เดือน!';

        }else if($myThis < $birthday){

            return 'วันส่งตัวรักษาที่คุณเลือกน้อยกว่าวันเกิดผู้ป่วย!';

        }

        return true;
        

    }

    static public function MonthPlus($date, $plus){
        $time = strtotime($date);
        $final = date("Y-m-d", strtotime("+$plus month", $time));
        return $final;
    }    
}

echo json_encode(checkDateApiClass::checkDate($_POST['birthday'], $_POST['myThis']));