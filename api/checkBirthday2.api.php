<?php

class checkBirthdayApi {
    static public function checkBirthday($birthday){
        $birthday = self::dateDiff03($birthday);
        $data = explode('-',$birthday);

        if(intval($data[0]) === 0){
            if(intval($data[1]) < 3 ){

                $text = null;
                if(intval($data[0]) > 0) $text .= "{$data[0]} ปี -";
                if(intval($data[1]) > 0) $text .= "{$data[1]} เดือน -";
                if(intval($data[2]) > 0) $text .= "{$data[2]} วัน -";                

                return '_อายุน้อยกว่าแผนการรักษา||'. str_replace("-","", $text);
            }else if(intval($data[1]) > 5){

                $text = null;
                if(intval($data[0]) > 0) $text .= "{$data[0]} ปี -";
                if(intval($data[1]) > 0) $text .= "{$data[1]} เดือน -";
                if(intval($data[2]) > 0) $text .= "{$data[2]} วัน -";                   
                return '_ผู้ป่วยอายุเกินแผนการรักษา||'. str_replace("-","", $text); 
            }
        }else if(intval($data[0]) > 0){

            $text = null;
            if(intval($data[0]) > 0) $text .= "{$data[0]} ปี -";
            if(intval($data[1]) > 0) $text .= "{$data[1]} เดือน -";
            if(intval($data[2]) > 0) $text .= "{$data[2]} วัน -";               
            return '_ผู้ป่วยอายุเกินแผนการรักษา||' . str_replace("-","", $text);
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

