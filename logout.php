<?php

session_start();
session_unset();
session_destroy();
session_write_close();
unset($_SESSION);

echo "<script>window.location.href = `login.php`</script>";