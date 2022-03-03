

<?php


    if(isset($_POST['btnSave'])){
        adminAddHospitalClass::actionData();
    }elseif(isset($_GET['dle'])){
        adminAddHospitalClass::deleteFile($_GET['dle']);
    }



    $hospita_name = null;
    $hospita_address = null;
    $hospita_agency = null;
    $hospita_province = null;
    $hospita_map = null;
    $image = null;
    $hospita_latAndlong = null;

    if(isset($_GET['eid'])){
        $resData = adminAddHospitalClass::getData($_GET['eid']);
        if(count($resData) > 0){
            foreach($resData as $key=>$item){
                $hospita_name = $item['hospita_name'];
                $hospita_address = $item['hospita_address'];
                $hospita_agency = $item['hospita_agency'];
                $hospita_province = $item['hospita_province'];
                $hospita_map = $item['hospita_map'];   
                $image = $item['hospita_image'];
                $hospita_latAndlong = $item['hospita_latAndlong'];
            }
        }
    }


    // ภาคเหนือ
    $province1 = array('เชียงราย', 'เชียงใหม่', 'น่าน', 'พะเยา', 'แพร่', 'แม่ฮ่องสอน', 'ลำปาง', 'ลำพูน', 'อุตรดิตถ์');
    // ภาคตะวันออกเฉียงเหนือ
    $province2 = array('กาฬสินธุ์', 'ขอนแก่น', 'ชัยภูมิ', 'นครพนม', 'นครราชสีมา', 'บึงกาฬ', 'บุรีรัมย์', 'มหาสารคาม', 'มุกดาหาร', 'ยโสธร', 'ร้อยเอ็ด', 'เลย', 'สกลนคร', 'สุรินทร์', 'ศรีสะเกษ', 'หนองคาย', 'หนองบัวลำภู', 'อุดรธานี', 'อุบลราชธานี', 'อำนาจเจริญ');
    // ภาคกลาง
    $province3 = array('กรุงเทพมหานคร', 'กำแพงเพชร', 'ชัยนาท', 'นครนายก', 'นครปฐม', 'นครสวรรค์', 'นนทบุรี', 'ปทุมธานี', 'พระนครศรีอยุธยา', 'พิจิตร', 'พิษณุโลก', 'เพชรบูรณ์', 'ลพบุรี', 'สมุทรปราการ', 'สมุทรสงคราม', 'สมุทรสาคร', 'สิงห์บุรี', 'สุโขทัย', 'สุพรรณบุรี', 'สระบุรี', 'อ่างทอง', 'อุทัยธานี');    
    //ภาคตะวันออก
    $province4 = array('จันทบุรี', 'ฉะเชิงเทรา', 'ชลบุรี', 'ตราด', 'ปราจีนบุรี', 'ระยอง', 'สระแก้ว');
    //ภาคตะวันตก
    $province5 = array('กาญจนบุรี', 'ตาก', 'ประจวบคีรีขันธ์', 'เพชรบุรี', 'ราชบุรี');
    //ภาคใต้
    $province6 = array('กระบี่', 'ชุมพร', 'ตรัง', 'นครศรีธรรมราช', 'นราธิวาส', 'ปัตตานี', 'พังงา', 'พัทลุง', 'ภูเก็ต', 'ระนอง', 'สตูล', 'สงขลา', 'สุราษฎร์ธานี', 'ยะลา');    
?>


<section class="container mt-5 border shadow-sm p-3">

<div class="col-12 position-relative">
    <a href="?op=admin-dashboard" class="btn btn-sm btn-outline-dark position-absolute end-0"><i class="fa-solid fa-door-open"></i> ย้อนกลับ</a>
</div>

    <div class="text-center mb-5">
        <h3><i class="fa-solid fa-hospital"></i> เพิ่มโรงพยาบาล</h3>
    </div>
    <div class="row">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">รูป</label>
                <input type="file" name="myfile" class="form-control form-control-sm" accept="image/*" style="max-width: 25rem;">

                <?php if($image !== null && $image !== ""):?>
                    <a href="<?php echo $image ?>" target="_back" style="text-decoration: none;">
                        <img src="<?php echo $image ?>" style="max-width: 10rem;" alt="">
                    </a>
                    <a href="?op=admin-add-hospital&dle=<?php echo $_GET['eid']?>" onclick="if(!confirm(`ฉันต้องการลบภาพนี้`)) return false" style="text-decoration: none;color:red">ลบภาพ</a>
                <?php endif;?>
            </div>            
            <div class="mb-3">
                <label class="form-label">โรงพยาบาล</label>
                <input type="text" name="hospita_name" class="form-control form-control-sm" placeholder="โรงพยาบาล" value="<?php echo $hospita_name?>">
            </div>
            <div class="mb-3">
                <label class="form-label">ที่อยู่</label>
                <textarea name="hospita_address" class="form-control form-control-sm" rows="3"><?php echo $hospita_address?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">หน่ายงาน</label>
                <div class="d-flex">
                    <div class="d-flex position-relative">
                        <input type="radio" class="position-absolute" name="hospita_agency" <?php if($hospita_agency === 'หน่ายงานรัฐ') echo 'checked'?> value="หน่ายงานรัฐ" checked id="ch1" style="top:0.4rem"> 
                        <label style="margin-left: 1rem;" for="ch1">หน่ายงานรัฐ</label>
                    </div>
                    <div class="d-flex position-relative">
                        <input type="radio" class="position-absolute" name="hospita_agency" <?php if($hospita_agency === 'หน่ายงานเอกชน') echo 'checked'?> value="หน่ายงานเอกชน" id="ch2" style="top:0.4rem; left: 3rem;"> 
                        <label style="margin-left: 4rem;" for="ch2">หน่ายงานเอกชน</label>                    
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label w-12">จังหวัด</label>
                <select class="form-control form-control-sm" style="max-width: 25rem;" name="hospita_province">

                    <option disabled selected value="">---- เลือกจังหวัด ----</option>

                    <!-- ภาคเหนือ -->
                    <?php foreach($province1 as $item):?> 
                        <option <?php if($hospita_province === $item) echo 'selected'?> value="<?php echo $item?>"><?php echo $item?></option>
                    <?php endforeach;?>

                    <!-- ภาคตะวันออกเฉียงเหนือ -->
                    <?php foreach($province2 as $item):?> 
                        <option <?php if($hospita_province === $item) echo 'selected'?> value="<?php echo $item?>"><?php echo $item?></option>
                    <?php endforeach;?>
                    
                    <!-- ภาคกลาง -->
                    <?php foreach($province3 as $item):?> 
                        <option <?php if($hospita_province === $item) echo 'selected'?> value="<?php echo $item?>"><?php echo $item?></option>
                    <?php endforeach;?>
                    
                    <!-- ภาคตะวันออก -->
                    <?php foreach($province4 as $item):?> 
                        <option <?php if($hospita_province === $item) echo 'selected'?> value="<?php echo $item?>"><?php echo $item?></option>
                    <?php endforeach;?>
                    
                    <!-- ภาคตะวันตก -->
                    <?php foreach($province5 as $item):?> 
                        <option <?php if($hospita_province === $item) echo 'selected'?> value="<?php echo $item?>"><?php echo $item?></option>
                    <?php endforeach;?>
                    
                    <!-- ภาคใต้ -->
                    <?php foreach($province6 as $item):?> 
                        <option <?php if($hospita_province === $item) echo 'selected'?> value="<?php echo $item?>"><?php echo $item?></option>
                    <?php endforeach;?>                    

                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">แผนที่ location ลิ้งค์ url map</label>
                <input type="text" class="form-control form-control-sm" name="hospita_map" placeholder="แผนที่ location ลิ้งค์ url map" value="<?php echo $hospita_map?>">
            </div>   
            <div class="mb-3">
                <label class="form-label">lat and long พิกัดภูมิศาสตร์ รูปแบบข้อมูล -> (1000000000,100000000)</label>
                <input type="text" name="hospita_latAndlong" required class="form-control form-control-sm" placeholder="lat and long พิกัดภูมิศาสตร์" value="<?php echo $hospita_latAndlong?>">
            </div>
            <hr>
            <div class="col-12 mb-3 mt-3 text-center mt-5">
                
                <button type="submit" name="btnSave" class="btn btn-sm btn-primary w-50">
                    <i class="fa-solid fa-floppy-disk"></i> 
                    <?php $btnName = 'บันทึก'; if(isset($_GET['eid'])) $btnName = 'แก้ไข'; echo $btnName ?>
                </button>
            </div>
            
        </form>

    </div>
</section>

