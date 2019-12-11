<?php
require('../config/config.php');
require('../config/db.php');
?>
<?php include('../inc/header.php'); ?>

<?php
//session_start(); is included in the nav.php file. 
session_destroy();
header("location:login.php");
?>

<?php include('../inc/footer.php'); ?> 