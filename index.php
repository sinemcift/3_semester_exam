
<?php include('inc/header.php'); ?>

<?php
if (isset($_SESSION['adgang'])) {
    header("location:pages/games.php");
} else {
    header("location:pages/login.php");
}
?> 

<?php include('inc/footer.php'); ?> 