
<?php
if(isset($_POST['appointment_date'])) userQueueClass::addQueue();

$diagnose_fullname = null;
$diagnose_id_code = null;
$diagnose_birthday = null;
$diagnose_age = null;
$diagnose_right_reatment = null;
$diagnose_sub_right = null;
$diagnose_syndrome = null;

$status = false;
$id = null;

if (isset($_GET['uid'])) {
    $resData = userDataClass::getDataCodeUser($_GET['uid']);
    if (count($resData) > 0) {
        foreach ($resData as $key => $item) {
            $diagnose_fullname = $item['diagnose_fullname'];
            $diagnose_id_code = $item['diagnose_id_code'];
            $diagnose_birthday = $item['diagnose_birthday'];
            $diagnose_age = $item['diagnose_age'];
            $diagnose_right_reatment = $item['diagnose_right_reatment'];
            $diagnose_sub_right = $item['diagnose_sub_right'];
            $diagnose_syndrome = $item['diagnose_syndrome'];
            $status = true;
            $id = $_GET['uid'];
        }
    } else {
        echo "<script>alert('ไม่พบรายชื่อผู้ป่วย ID: {$_GET['uid']} นี้!')</script>";
        $id = $_GET['uid'];
    }
}

$hidName = null;
$codeHid = null;
if(isset($_GET['hid'])){
    $resData = adminAddHospitalClass::getData($_GET['hid']);
    if(count($resData) > 0){
        foreach($resData as $item){
            $hidName = $item['hospita_name'];
            $codeHid = $_GET['hid'];
        }
    }
}

?>



<section class="mt-5 text-center">
    <h3><i class="fa-solid fa-calendar-days"></i> จองคิว / นัดส่งตัวรักษา</h3>
</section>

<section class="container mt-5">
    <div class="row g-3">

        <div class="col-sm-6 col-12" style="background-color: #ffffff;">

            <form action="" class="border p-3 shadow-sm" method="post">

                <div class="mb-3">
                    <label class="form-label">เลขประจำตัวผู้ป่วย</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="เลขประจำตัวผู้ป่วย" style="max-width: 25rem;" value="<?php echo $diagnose_id_code ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">ชื่อ-สกุล</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="ชื่อ-สกุล" value="<?php echo $diagnose_fullname ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">วัน-เดือน-ปี เกิด</label>
                    <input type="text" disabled class="form-control form-control-sm" style="max-width: 25rem;" value="<?php echo optionclass::DateThai($diagnose_birthday) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">อายุ</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="อายุ" value="<?php echo optionclass::dateDiff02($diagnose_birthday, date('Y-m-d')); ?>">
                    <?php //echo $diagnose_age ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">สิทธิการรักษาหลักในการรับบริการ</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="สิทธิการรักษาหลักในการรับบริการ" value="<?php echo $diagnose_right_reatment ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">ประเภทสิทธิย่อย</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="ประเภทสิทธิย่อย" value="<?php echo $diagnose_sub_right ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">กลุ่มอาการ</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="กลุ่มอาการ" value="<?php echo $diagnose_syndrome ?>">
                </div>
            </form>

        </div>

        <div class="col-sm-6 col-12" style="background-color: #ffffff;" >
            <form id="sb" action="" method="POST" class="border p-3 shadow-sm">
                <div class="mb-3">
                    <label class="form-label"><strong>เลือก วันที่จองคิว / นัดส่งตัวรักษา</strong></label><br>

                    <strong class="text-danger">
                        วันส่งตัวรักษาต้องไม่เกิน 3-5 เดือน นับจากวันเกิด
                    </strong> <br>
                    <span class="text-danger">
                    <?php echo optionclass::MonthPlus($diagnose_birthday, 3) ?> ถึง <?php echo optionclass::MonthPlus($diagnose_birthday, 5) ?>
                    </span>
                    <hr>      
                    
                    <input type="datetime-local" onchange="myCheckData(`<?php echo $diagnose_birthday?>`, this.value)" name="appointment_date" 
                    class="form-control form-control-sm" style="max-width: 25rem;" 
                    value="">
                    <?php //echo str_replace('|','T',strval(date('Y-m-d|H:i:s')))?>


                </div>
                <div class="input-group mb-3">
                    <input type="hidden" name="hospita_code" value="<?php echo $codeHid?>">
                    <input type="text" class="form-control form-control-sm " value="<?php echo $hidName?>">
                    <span class="input-group-text"><i class="fa-solid fa-hospital"></i></span>
                </div>    

                <hr>
                <button type="button" onclick="mySaveData()" name="mySave" class="btn btn-primary w-100"><i class="fa-solid fa-calendar-plus"></i> จองคิว</button>
            </form>
        </div>

    </div>
</section>

<script>
    function myCheckData(birthday, myThis){
        let form = new FormData();
        form.append('birthday', birthday);
        form.append('myThis', myThis);
        axios({
            method: 'post',
            url: 'api/checkDate.api.php',
            data: form
        }).then((data)=>{
            if(data.data !== true){
                alert(data.data);
                document.querySelector('[name=appointment_date]').value = "";
            }
        });
    }
    function mySaveData(){
        document.getElementById('sb').submit()
    }
</script>

