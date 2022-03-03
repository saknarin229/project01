<?php

if(isset($_GET['did'])) userQueueClass::deleteQueue($_GET['did']);
$resData = queueAllClass::getQueueAll($_GET['id']);
?>

<div class="col-12 text-center mt-5">
    <h3><strong>คิวนัด-ส่งตัวผู้ป่วย <br> <?php echo $_GET['un'] ?></strong></h3>
</div>

<section class="container mt-5 border shadow-sm p-3">
    <div class="col-12 text-end">
        <a href="?op=user-data-list" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-door-open"></i> ย้อนกลับ</a>
    </div>

    <hr>

    <table id="example" class="table table-striped w-100">
        <thead>
            <tr>
                <th>รหัสผู้ป่วย</th>
                <th>บัตรประจำตัวประชาชน</th>
                <th>วัน-เดือน-ปี เกิด</th>
                <th>คิวนัด</th>
                <th>ข้อมูลเพิ่มเติม</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resData as $key => $item) : ?>
                <tr>
                    <td><?php echo $item['diagnose_id_code'] ?></td>
                    <td><?php echo $item['diagnose_idCrad'] ?></td>
                    <td><?php echo optionclass::DateThai($item['diagnose_birthday']); ?></td>
                    <td>
                        <?php $dateTime = $item['appointment_date']; ?>
                        <?php echo optionclass::DateThai($dateTime); ?>
                        <br>
                        <small>
                            <?php $dateTime = date_create($dateTime);
                            echo date_format($dateTime, 'H:i:s') ?>
                        </small>
                    </td>
                    <td>
                        <a href="?op=user-queue-show&uid=<?php echo $item['diagnose_id_code'] ?>&dc=<?php echo $item['appointment_date'] ?>&hc=<?php echo $item['hospita_code'] ?>" class="btn btn-sm btn-warning position-relative">
                            ข้อมูลเพิ่มเติม
                        </a>
                    </td>
                    <td>
                        <!-- ลบ -->
                        <a href="?op=queue-all&id=<?php echo $_GET['id'] ?>&un=<?php echo $_GET['un'] ?>&did=<?php echo $item['id'] ?>" class="btn btn-sm btn-danger" onclick="if(!confirm('ฉันต้องการลบรายการนี้!')) return false"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>