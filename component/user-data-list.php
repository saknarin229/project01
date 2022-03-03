
<?php 
    if(isset($_GET['did'])) userDataClass::updateDelData($_GET['did']);
    $resData = userDataClass::getDataUserAll();    
?>


<div class="col-12 text-center mt-5">
    <h3><strong>รายการผู้ป่วย</strong></h3>
</div>

<section class="container mt-5 border shadow-sm p-3">
    <div class="col-12 text-end">
        <a href="?op=user-data" class="btn-sm btn btn-outline-primary"><i class="fa-solid fa-bed-pulse"></i> เพิ่มข้อมูล-วินิจฉัย ผู้ป่วย </a>
        <a href="?op=admin-dashboard" class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-door-open"></i> ย้อนกลับ</a>
    </div>
    
    <hr>

    <table id="example" class="table table-striped w-100">
        <thead>
            <tr>
                <th>id</th>
                <th>id-crad</th>
                <th>f-name</th>
                <th>Date of birth</th>
                <th>province</th>
                <th>district</th>
                <th>sub district</th>
                <th>q</th>
                <th>q-all</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resData as $key=>$item):?>
                <tr>
                    <td><?php echo $item['diagnose_id_code']?></td>
                    <td><?php echo $item['diagnose_idCrad']?></td>
                    <td><?php echo $item['diagnose_fullname']?></td>
                    <td>
                        <?php echo optionclass::DateThai($item['diagnose_birthday']);  ?>
                    </td>
                    <th><?php echo $item['diagnose_province']?></th>
                    <th><?php echo $item['diagnose_district']?></th>
                    <th><?php echo $item['diagnose_sub_district']?></th>
                    <th>
                        <?php
                            $res = optionclass::getDateQueue($item['diagnose_idCrad']);
                            if($res !== "-"){
                                $dateTime = date_create($res);
                                $date = optionclass::DateThai(date_format($dateTime, 'Y-m-d'));
                                $time = date_format($dateTime, 'H:i:s');
                                echo "<strong>$date</strong> <br> <small>$time</small>";
                            }else{
                                echo $res;
                            }
                        ?>
                    </th>                 
                    <th><a class="btn btn-sm btn-info" href="?op=queue-all&id=<?php echo $item['diagnose_idCrad'] ?>&un=<?php echo $item['diagnose_fullname']?>">คิว</a></th>
                    <td>
                        <!-- แก้ไข -->
                        <a href="?op=user-data&eid=<?php echo $item['diagnose_id']?>" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <!-- ลบ -->
                        <a href="?op=user-data-list&did=<?php echo $item['diagnose_id']?>" class="btn btn-sm btn-danger" onclick="if(!confirm('ฉันต้องการลบรายการนี้!')) return false"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</section>