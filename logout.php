<?php
session_start();
unset($_SESSION['ins_id']);
unset($_SESSION['adminId']);
session_destroy();
header('location:index.php');
?>