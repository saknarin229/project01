<?php
$status = true;
if (isset($_POST['btnSave'])) $status = userDataClass::action();

if($status !== true){
    echo "<script>alert(`$status`)</script>";
}

$diagnose_id_code = null;
$diagnose_idCrad = null;
$diagnose_fullname = null;
$diagnose_birthday = null;
$diagnose_age = null;
$diagnose_province = null;
$diagnose_district = null;
$diagnose_sub_district = null;
$diagnose_Date_first_admission = null;
$diagnose_right_reatment = null;
$diagnose_sub_right = null;
$diagnose_Filter1 = null;
$diagnose_Craniofacial_filter = null;
$diagnose_Filtering_Craniofacial_Syndromic = null;
$diagnose_syndrome = null;
$diagnose_more = null;
$diagnose_latAndlong = null;

if (isset($_GET['eid'])) {
    $resdata = userDataClass::getDataUser($_GET['eid']);
    if (count($resdata) > 0) {
        foreach ($resdata as $key => $item) {
            $diagnose_id_code = $item['diagnose_id_code'];
            $diagnose_idCrad = $item['diagnose_idCrad'];
            $diagnose_fullname = $item['diagnose_fullname'];
            $diagnose_birthday = $item['diagnose_birthday'];
            $diagnose_age = $item['diagnose_age'];
            $diagnose_province = $item['diagnose_province'];
            $diagnose_district = $item['diagnose_district'];
            $diagnose_sub_district = $item['diagnose_sub_district'];
            $diagnose_Date_first_admission = $item['diagnose_Date_first_admission'];
            $diagnose_right_reatment = $item['diagnose_right_reatment'];
            $diagnose_sub_right = $item['diagnose_sub_right'];
            $diagnose_Filter1 = $item['diagnose_Filter1'];
            $diagnose_Craniofacial_filter = $item['diagnose_Craniofacial_filter'];
            $diagnose_Filtering_Craniofacial_Syndromic = $item['diagnose_Filtering_Craniofacial_Syndromic'];
            $diagnose_syndrome = $item['diagnose_syndrome'];
            $diagnose_more = $item['diagnose_more'];
            $diagnose_latAndlong = $item['diagnose_latAndlong'];
        }
    }
}
?>


<style>
    .d-hidden {
        display: none;
    }
</style>

<section class="container mt-5 border shadow-sm p-3">

    <div class="col-12 position-relative">
        <a href="?op=user-data-list" class="btn btn-sm btn-outline-dark position-absolute end-0"><i class="fa-solid fa-door-open"></i> ????????????????????????</a>
    </div>

    <div class="text-center mb-5">
        <h3><i class="fa-solid fa-bed-pulse"></i> ?????????????????????????????????-???????????????????????? ?????????????????????</h3>
    </div>
    <div class="row">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">??????????????????????????????????????????????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_id_code" placeholder="??????????????????????????????????????????????????????" style="max-width: 25rem;" value="<?php echo $diagnose_id_code ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">??????????????????????????????????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_idCrad" placeholder="??????????????????????????????????????????" style="max-width: 25rem;" value="<?php echo $diagnose_idCrad ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">????????????-????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_fullname" placeholder="????????????-????????????" value="<?php echo $diagnose_fullname ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">?????????-???????????????-?????? ????????????</label>
                <input type="date" onchange="checkDate(this)" class="form-control form-control-sm" required name="diagnose_birthday" style="max-width: 25rem;" value="<?php echo $diagnose_birthday ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">????????????</label> <strong id="alertDanger" class="text-danger"></strong>
                <input type="text" class="form-control form-control-sm" required name="diagnose_age" placeholder="????????????" value="<?php echo $diagnose_age ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">?????????????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_province" placeholder="?????????????????????" value="<?php echo $diagnose_province ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">???????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_district" placeholder="???????????????" value="<?php echo $diagnose_district ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">????????????</label>
                <input type="text" class="form-control form-control-sm" oninput="checkLocation(this.value)" required name="diagnose_sub_district" placeholder="????????????" value="<?php echo $diagnose_sub_district ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">lat and long ????????????????????????????????????????????? ???????????????????????????????????? -> (1000000000,100000000)</label>
                <input type="text" name="diagnose_latAndlong" required class="form-control form-control-sm" placeholder="lat and long ?????????????????????????????????????????????" value="<?php echo $diagnose_latAndlong ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">???????????????????????????????????????????????????????????????????????????????????????</label>
                <input type="date" class="form-control form-control-sm" required name="diagnose_Date_first_admission" style="max-width: 25rem;" value="<?php $date = date_create($diagnose_Date_first_admission); echo str_replace(' ', 'T', date_format($date, "Y-m-d")); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">?????????????????????????????????????????????????????????????????????????????????????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_right_reatment" placeholder="?????????????????????????????????????????????????????????????????????????????????????????????" value="<?php echo $diagnose_right_reatment ?>">

            </div>

            <div class="mb-3">
                <label class="form-label">?????????????????????????????????????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_sub_right" placeholder="?????????????????????????????????????????????" value="<?php echo $diagnose_sub_right ?>">

            </div>

            <div class="mb-3 d-hidden">
                <label class="form-label">????????????????????????????????????????????????????????? 1</label>
                <input type="text" class="form-control form-control-sm" name="diagnose_Filter1" placeholder="????????????????????????????????????????????????????????? 1" value="<?php echo $diagnose_Filter1 ?>">

            </div>

            <div class="mb-3 d-hidden">
                <label class="form-label">???????????????????????????????????????????????????????????? (Craniofacial)</label>
                <input type="text" class="form-control form-control-sm" name="diagnose_Craniofacial_filter" placeholder="???????????????????????????????????????????????????????????? (Craniofacial)" value="<?php echo $diagnose_Craniofacial_filter ?>">

            </div>

            <div class="mb-3 d-hidden">
                <label class="form-label">???????????????????????????????????????????????????????????? (Syndromic Craniofacial)</label>
                <input type="text" class="form-control form-control-sm" name="diagnose_Filtering_Craniofacial_Syndromic" placeholder="???????????????????????????????????????????????????????????? (Syndromic Craniofacial)" value="<?php echo $diagnose_Filtering_Craniofacial_Syndromic ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">??????????????????????????????</label>
                <input type="text" class="form-control form-control-sm" required name="diagnose_syndrome" placeholder="??????????????????????????????" value="<?php echo $diagnose_syndrome ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">???????????????????????????</label>
                <textarea name="diagnose_more" class="form-control form-control-sm" required rows="3"><?php echo $diagnose_more ?></textarea>
            </div>


            <hr>

            <div class="col-12 mb-3 mt-3 text-center mt-5">
                <button type="submit" name="btnSave" class="btn btn-sm btn-primary w-50"><i class="fa-solid fa-floppy-disk"></i> ??????????????????</button>
            </div>

        </form>

    </div>
</section>

<script>
    function checkDate(e) {
        let form = new FormData();
        form.append('birthday', e.value);
        axios({
            method: 'post',
            url: 'api/checkBirthday2.api.php',
            data: form
        }).then((data)=>{

            if(data.data.indexOf('?????????????????????????????????????????????????????????????????????') > 0 || data.data.indexOf('??????????????????????????????????????????????????????????????????????????????') > 0){
                let myData = data.data.split("||");
                document.getElementById('alertDanger').innerText = myData[0].replace('_', '');
                document.querySelector('[name="diagnose_age"]').value = myData[1];
            }else{
                document.getElementById('alertDanger').innerText = "";
                document.querySelector('[name="diagnose_age"]').value = data.data;
            }
        });
    }

    function checkLocation(e){
        let form = new FormData();
        form.append('word', e);
        axios({
            method: 'post',
            url: 'api/checkLocation.api.php',
            data: form
        }).then((data)=>{
            document.querySelector('[name=diagnose_latAndlong]').value = data.data;
        });
    }
    
</script>