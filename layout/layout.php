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

    <!-- data table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light border shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> <strong><i class="fa-solid fa-bed-pulse"></i> จองคิวส่งตัวผู้ป่วย</strong> <br> <small> Admin : <?php echo $_SESSION['adminName']?></small></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0"></div>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-clipboard-list"></i> จองคิว</a>
                        </li>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['id'])):?>
                                <a class="nav-link active" href="logout.php" onclick="if(!confirm(`ฉันต้องการออกจากระบบ!`)) return false;"><i class="fa-solid fa-arrow-right-to-bracket"></i> ออกจากระบบ</a>
                            <?php else:?>
                                <a class="nav-link active" href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> ผู้ดูแลระบบ</a>
                            <?php endif;?>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    
    <div class="mt-3" style="margin-left: 1rem;">
            <a class="btn btn-sm btn-primary" href="?op=admin-dashboard">รายการโรงพยาบาล</a>
            <a class="btn btn-sm btn-success" href="?op=user-data-list">รายการผู้ป่วย</a>
            <a class="btn btn-sm btn-warning" href="index.php">จองคิว</a>
    </div>

    <?php 
    
        if(isset($_GET['op'])){
            if(file_exists('component/'.$_GET['op'].'.php')){
                include_once('component/'.$_GET['op'].'.php');    
            }else{
                include_once('component/404.php');  
            }
            
        }else{
            include_once('component/home.php');
        }
    
    ?>


<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 1, "desc" ]]
        });
    });    
</script>

</body>

</html>