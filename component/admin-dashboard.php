
<div class="col-12 text-center mt-5">
    <h3><strong>รายการโรงพยาบาล</strong></h3>
</div>

<?php 

    if(isset($_GET['did'])){
        adminAddHospitalClass::updateDel($_GET['did']);
    }

    $resData = adminAddHospitalClass::getDataAll();
?>

<section class="container mt-5 border shadow-sm p-3">
    <div class="col-12 text-end">
        <a href="?op=admin-add-hospital" class="btn-sm btn btn-outline-primary"><i class="fa-solid fa-hospital"></i> เพิ่มโรงพยาบาล</a>
        <a href="?op=user-data-list" class="btn-sm btn btn-outline-dark"><i class="fa-solid fa-bed-pulse"></i> ข้อมูลผู้ป่วย </a>
    </div>

    <hr>

    <table id="example" class="table table-striped w-100">
        <thead>
            <tr>
                <th>โรงพยาบาล</th>
                <th>ที่อยู่</th>
                <th>แผนที่ ร.พ.</th>
                <th>รายการจองคิว</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resData as $key=>$item):?>
                <tr>
                    <td><?php echo $item['hospita_name']?></td>
                    <td><?php echo $item['hospita_address']?></td>
                    <td>
                        <!-- แผนที่ -->
                        <a href="<?php echo $item['hospita_map']?>" target="_black" class="btn btn-sm btn-info"><i class="fa-solid fa-map-location"></i></a>
                        
                    </td>
                    <td>
                        <a href="?op=queue&qID=<?php echo $item['hospita_code']?>&rp=<?php echo $item['hospita_name']?>" class="btn btn-sm btn-warning ">รายการจองคิว</a>
                    </td>
                    <td>
                        <!-- แก้ไข -->
                        <a href="?op=admin-add-hospital&eid=<?php echo $item['hospita_code']?>" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <!-- ลบ -->
                        <a href="?op=admin-dashboard&did=<?php echo $item['hospita_code']?>" class="btn btn-sm btn-danger" onclick="if(!confirm('ฉันต้องการลบรายการนี้!')) return false"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</section>