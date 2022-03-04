<?php


class checkBirthdayApi {
    static public function checkBirthday($birthday){
        $birthday = self::dateDiff03($birthday);
        $data = explode('-',$birthday);



        if(intval($data[1]) < 3 && intval($data[0]) > 0){
            return 'ผู้ป่วยอายุเกินแผนการรักษา';//"อายุน้อยกว่าเกณฑ์กำหนด 3 เดือน";
        }else if(intval($data[1]) > 5  && intval($data[0]) > 0){
            return 'ผู้ป่วยอายุเกินแผนการรักษา';//"อายุฃมากกว่าเกณฑ์กำหนด 5 เดือน";
        }

        return str_replace("-","", $birthday);
    }

    static private function dateDiff03($birthday)
    {
        $datetime1 = new DateTime($birthday);
        $datetime2 = new DateTime(date('Y-m-d'));
        $interval = $datetime1->diff($datetime2);
        $convert = $interval->format('%y - %m - %d');
        
        $data = explode('-', $convert);
        
        $text = null;
        
        if(intval($data[0]) > 0) $text .= "{$data[0]} ปี -";
        if(intval($data[1]) > 0) $text .= "{$data[1]} เดือน -";
        if(intval($data[2]) > 0) $text .= "{$data[2]} วัน -";
        
        return strval($text);
    }
}

 echo json_encode(checkBirthdayApi::checkBirthday($_POST['birthday']));

