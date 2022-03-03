<?php

session_start();
ob_start();

date_default_timezone_set("Asia/Bangkok");

if(!isset($_SESSION['id'])) echo "<script>window.location.href = `login.php`</script>"; // check login 

include_once('dbconnect/dbconnect.php');
include_once('optionclass/optionclass.php');

include_once('actionclass/admin-add-hospital.class.php');
include_once('actionclass/user-data.class.php');
include_once('actionclass/user-queue.class.php');
include_once('actionclass/queue-all.class.php');



include_once('layout/layout.php');

// https://stackoverflow.com/questions/2870295/increment-date-by-one-month