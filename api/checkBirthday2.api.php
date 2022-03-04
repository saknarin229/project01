<?php

class checkBirthdayApi {
    static public function checkBirthday($birthday){
        $birthday = self::dateDiff03($birthday);
        $data = explode('-',$birthday);

        if(intval($data[0]) === 0){
            if(intval($data[1]) < 3 ){
                return 'อายุน้อยกว่าแผนการรักษา';
            }else if(intval($data[1]) > 5){
                return 'ผู้ป่วยอายุเกินแผนการรักษา'; 
            }
        }else if(intval($data[0]) > 0){
            return 'ผู้ป่วยอายุเกินแผนการรักษา';
        }


        $text = null;
        if(intval($data[0]) > 0) $text .= "{$data[0]} ปี -";
        if(intval($data[1]) > 0) $text .= "{$data[1]} เดือน -";
        if(intval($data[2]) > 0) $text .= "{$data[2]} วัน -";

        return str_replace("-","", $text);
    }

    static private function dateDiff03($birthday)
    {
        $datetime1 = new DateTime($birthday);
        $datetime2 = new DateTime(date('Y-m-d'));
        $interval = $datetime1->diff($datetime2);
        $convert = $interval->format('%y - %m - %d');        
        return strval($convert);
    }
}

 echo json_encode(checkBirthdayApi::checkBirthday($_POST['birthday']));

