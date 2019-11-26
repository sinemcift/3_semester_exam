<?php
    require_once('config/config.php');
    require_once('config/db.php');
?>
<?php include('inc/header.php'); ?>

<?php
if (isset($_SESSION['adgang'])) {
    //Dette bliver ændret senere til en "rigtig" home page. 
    header("location:pages/games.php");
    
} else {
    header("location:pages/login.php");
}
?> 

<?php include('inc/footer.php'); ?> 