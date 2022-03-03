<?php

    session_start();
    ob_start();
    date_default_timezone_set("Asia/Bangkok");
    if(isset($_SESSION['id'])) echo "<script>window.location.href = `index.php`</script>";


    include_once('dbconnect/dbconnect.php');
    include_once('optionclass/optionclass.php');    
    include_once('actionclass/loginClass.php');

    if(isset($_POST['mylogin'])) loginClass::Login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรแกรมจองคิวส่งตัวผู้ป่วย</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <div class="position-relative" style="height: 100vh;">
        <div class="position-absolute top-50 start-50 translate-middle border shadow-sm p-3" style="width: 20rem;">
            <div class="col-12 text-center">

                <label class=" shadow-sm bg-info" style="width: 5rem; height: 5rem; border-radius:50rem; position: relative;">
                    <i class="fa-solid fa-bed" style="position: absolute; top:2rem;left:2rem"></i>
                </label>
                <br>
                <strong>
                    โปรแกรมจองคิวส่งตัวผู้ป่วย
                </strong>
            </div>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" name="username" required class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
                </div>
                <div class="text-center">
                    <button type="submit" name="mylogin" class="btn btn-primary w-100"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                    <!-- <a href="index.php?op=admin-dashboard" class="btn btn-primary w-100"><i class="fa-solid fa-right-to-bracket"></i> Login</a> -->
                </div>

            </form>

        </div>
    </div>


</body>

</html>