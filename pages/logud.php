<?php
require('../config/config.php');
require('../config/db.php');
?>
<?php include('../inc/header.php'); ?>

<?php
session_destroy();

header("location:login.php");
?>

<?php include('../inc/footer.php'); ?> 