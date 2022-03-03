<?php


class optionclass extends dbconnect
{

    static public function DateThai($strDate)
    {


        $date = date_create($strDate);

        $strYear = intval(date_format($date, "Y")) + 543;
        $strMonth = intval(date_format($date, "m"));
        $strDay = intval(date_format($date, "d"));

        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[intval($strMonth)];
        return "$strDay $strMonthThai $strYear";
    }   

    static public function randCode($table, $fill)
    {
        $rand = rand(1, 999999);
        return self::checkData($table, $fill, $rand);
    }

    static private function checkData($table, $fill, $value)
    {
        $sql = "SELECT * FROM $table WHERE $fill = ?";
        $data = array($value);
        $resData = self::getExecute($sql, $data);
        if (count($resData) > 0) self::randCode($table, $fill);
        return $value;
    }

    static public function dateDiff($oldDate, $newDate, $status = null) //การคำนวน ระยะห่างระหว่าง วันที่  
    {

        $datetime1 = new DateTime($oldDate);
        $datetime2 = new DateTime($newDate);

        $myD1 = date_format($datetime1 , 'Y-m-d');
        $myD2 = date_format($datetime2 , 'Y-m-d');

        if($myD1 <= $myD2) return null;

        $interval = $datetime1->diff($datetime2);
        $convert = $interval->format('%y - %m - %d');
        
        $data = explode('-',$convert);
        
        $text = null;
        if(intval($data[0]) !== 0) $text .= "{$data[0]} ปี ";
        if(intval($data[1]) !== 0) $text .= "{$data[1]} เดือน ";
        if(intval($data[2]) !== 0) $text .= "{$data[2]} วัน ";
        
        return strval($text);
    }

    static public function dateDiff02($oldDate, $newDate, $status = null)
    {
        $datetime1 = new DateTime($oldDate);
        $datetime2 = new DateTime($newDate);
        $interval = $datetime1->diff($datetime2);
        $convert = $interval->format('%y - %m - %d');
        
        $data = explode('-',$convert);
        
        $text = null;
        if(intval($data[0]) !== 0) $text .= "{$data[0]} ปี ";
        if(intval($data[1]) !== 0) $text .= "{$data[1]} เดือน ";
        if(intval($data[2]) !== 0) $text .= "{$data[2]} วัน ";
        
        return strval($text);
    }

 

    static public function getQueue($id)
    {
        $sql = "SELECT * FROM data_appointment WHERE hospita_code = ? ORDER BY data_appointment.appointment_date DESC";
        $data = array($id);
        $resData = self::getExecute($sql, $data);
        if (count($resData)) return $resData[0]['appointment_date'];
        return date('Y-m-d');
    }

    static public function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'miles')
    {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch ($unit) {
            case 'miles':
                break;
            case 'kilometers':
                $distance = $distance * 1.609344;
        }
        return (round($distance, 2));
    }

    //   $res = getDistanceBetweenPointsNew(17.49116279306119, 101.73311327238825, 16.22449202358357, 100.23826013008397, 'kilometers');
    //   print_r($res);

    static public function getDateQueue($id){
        $sql = "SELECT * FROM data_appointment WHERE diagnose_id_code = ? ORDER BY data_appointment.appointment_date  DESC LIMIT 1";
        $data = array($id);
        $resData = self::getExecute($sql, $data);
        if(count($resData) > 0){
            foreach($resData as $item){
                return $item['appointment_date'];
            }
        }else{
            return "-";
        }
    }

}
