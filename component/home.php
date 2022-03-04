<?php

$diagnose_fullname = null;
$diagnose_id_code = null;
$diagnose_birthday = null;
$diagnose_age = null;
$diagnose_right_reatment = null;
$diagnose_sub_right = null;
$diagnose_syndrome = null;
$diagnose = array(null, null);

$status = false;
$id = null;

if (isset($_GET['id'])) {
    $resData = userDataClass::getDataCodeUser($_GET['id']);
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
            $id = $_GET['id'];
            $diagnose = explode(',', $item['diagnose_latAndlong']);
        }
    } else {
        echo "<script>alert('ไม่พบรายชื่อผู้ป่วย ID: {$_GET['id']} นี้!'); window.location.href = `index.php`</script>";
        $id = $_GET['id'];
    }
}

?>

<?php if (isset($_GET['id'])) : ?>
    <section class="mt-5 text-center">
        <h3><i class="fa-solid fa-bed-pulse"></i> จองคิวส่งตัวผู้ป่วย</h3>
    </section>
<?php else: ?>
    <section class="mt-5 container">
        <h3><i class="fa-solid fa-bed-pulse"></i> จองคิวส่งตัวผู้ป่วย</h3>
    </section>
<?php endif; ?>


<section class="container mt-5 ">
    <div class="row g-3">

        <div class="col-sm-6 col-12" style="background-color: #ffffff;">
            <form class="border p-3 shadow-sm">
                <div class="input-group mb-3">
                    <input type="text" required name="id" class="form-control" placeholder="ค้นหา เลขบัตรประชาชน ผู้ป่วย" value="<?php echo $id ?>">
                    <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
            </form>

            <?php if (isset($_GET['id'])) : ?>

                <div class="mt-5"></div>
                <?php $resData = adminAddHospitalClass::getDataAll(); ?>

                <table id="example" class="table table-striped w-100 border shadow-sm">
                    <thead>
                        <tr class="bg-light">
                            
                            <th>โรงพยาบาล</th>
                            <th style="width: 5rem;">คิว</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($resData as $key => $item) : ?>
                            <?php

                            $date = optionclass::getQueue($item['hospita_code']);
                            $dateShow = $date;
                            $date = date_create($date);

                            $time = optionclass::dateDiff(date_format($date, 'Y-m-d'), date('Y-m-d'), true);

                            $date1 = date_create(date('Y-m-d'));
                            $date2 = $date;
                            $diff=date_diff($date1,$date2);
                            
                            $dateThai = optionclass::DateThai($dateShow);

                            

                            ?>
                            <tr>
                                <td class="d-flex">
                                    <div class="col overflow-hidden p-1">
                                        <img src="<?php echo $item['hospita_image'] ?>" style="max-width: 9rem;" alt="">
                                    </div>
                                    <div class="col-8">
                                        <strong><?php echo $item['hospita_name'] ?></strong><br>
                                        <?php echo $item['hospita_address'] ?>
                                        <br>
                                        <?php
                                        if (intval($time) === 0) {
                                            echo " <strong class='text-dark'> <i class='fa-solid fa-calendar-days'></i> ว่าง </strong>";
                                        } else {
                                            echo " <strong class='text-dark'>คิวล่าสุด: $dateThai </strong> <br>";
                                            echo " <small class='text-dark'>วันนี้ - $dateThai </small> | ";
                                            echo " <small class='text-dark'>อีก $time </small>";
                                        }

                                        $hospita = explode(',', $item['hospita_latAndlong']);

                                        ?>

                                        <br>
                                        <small>
                                        ระยะทางจากที่อยู่ ผู้ป่วย-รพ
                                        <strong><?php echo intval(optionclass::getDistanceBetweenPointsNew($hospita[0], $hospita[1], $diagnose[0], $diagnose[1], 'kilometers')); ?></strong> กิโลเมตร
                                        </small>

                                        <br>
                                        <a target="_black" href="<?php echo $item['hospita_map'] ?>">แผนที่</a> 
                                        <?php if (boolval($time) !== false) : ?>
                                            <a href="?op=queue&qID=<?php echo $item['hospita_code']?>&rp=<?php echo $item['hospita_name']?>" >ดูคิวทั้งหมด</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <small>
                                        <?php 
                                            if (intval($time) === 0) {
                                                echo " <strong class='text-dark'> <i class='fa-solid fa-calendar-days'></i> ว่าง </strong>";
                                            } else {
                                                echo "$time";
                                            }                                    
                                        ?>
                                    </small>
                                </td>
                                <td>
                                    <!-- ปุ่มจองคิว -->
                                    <a href="?op=user-queue&uid=<?php echo $_GET['id'] ?>&hid=<?php echo $item['hospita_code'] ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-calendar-plus"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="mt-5"></div>

            <?php endif; ?>



        </div>
        <?php if (isset($_GET['id'])) : ?>

            <div class="col-sm-6 col-12" style="background-color: #ffffff;">      

                <form action="" class="border p-3 shadow-sm" method="post">

                    <strong class="text-danger">
                        วันส่งตัวรักษาต้องไม่เกิน 3-5 เดือน นับจากวันเกิด
                    </strong> <br>
                    <span class="text-danger">
                    <?php echo optionclass::MonthPlus($diagnose_birthday, 3) ?> ถึง <?php echo optionclass::MonthPlus($diagnose_birthday, 5) ?>
                    </span>
                    <hr>                   

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
                        <input type="text" disabled class="form-control form-control-sm" style="max-width: 25rem;" placeholder="ปี-เดือน-วัน เกิด" value="<?php echo optionclass::DateThai($diagnose_birthday) ?>">
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
                </form>

            </div>

        <?php endif; ?>
    </div>
</section>