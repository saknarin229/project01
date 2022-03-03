<?php

if (isset($_POST['mySave']))

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
    }

    $resData = adminAddHospitalClass::getData($_GET['hc']);
}

?>



<section class="mt-5 text-center">
    <h3><i class="fa-solid fa-calendar-days"></i> รายละเอียด-นัดส่งตัวรักษา</h3>
</section>

<section class="container mt-5 mb-5">
    <div class="row g-3 justify-content-center">

        <div class="col-sm-6 col-12" style="background-color: #ffffff;">
            <div class="border p-3 shadow-sm">

                <div class="mb-3 text-center">
                    <img src="<?php echo $resData[0]['hospita_image'] ?>" style="max-width: 30rem;" alt="">
                </div>

                <div class="mb-3 text-center">
                    <label class="form-label">วันที่นัดส่งตัวรักษา</label> : <strong>
                        <?php $dateTime = $_GET['dc']; ?>
                        <?php echo optionclass::DateThai($dateTime); ?>
                        <small>
                            <?php $dateTime = date_create($dateTime);
                            echo " เวลา " . date_format($dateTime, 'H:i:s') ?>
                        </small>
                    </strong> <br>
                    <label class="form-label">โรงพยาบาล</label> : <?php echo $resData[0]['hospita_name'] ?> <br>
                    <label class="form-label">ที่อยู่โรงพยาบาล</label> : <?php echo $resData[0]['hospita_address'] ?> <br>
                    <label class="form-label">แผนที่โรงพยาบาล</label> : <a href="<?php echo $resData[0]['hospita_map'] ?>" target="_black">คลิกดูแผนที่</a>
                </div>
            </div>


            <div class="border p-3 shadow-sm mt-3">

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
                    <input type="date" disabled class="form-control form-control-sm" placeholder="ชื่อ-สกุล" style="max-width: 25rem;" value="<?php echo $diagnose_birthday ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">อายุ</label>
                    <input type="text" disabled class="form-control form-control-sm" placeholder="อายุ" value="<?php echo optionclass::dateDiff02($diagnose_birthday, date('Y-m-d')); ?>">
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

            </div>

        </div>

    </div>
</section>