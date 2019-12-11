<?php
    require_once('config/config.php');
    require_once('config/db.php');
?>
<?php include('inc/header.php'); ?>
<?php include('inc/logged-in.php'); ?>
<?php
if (isset($_SESSION['adgang'])) {
    header("location:".ROOT_URL."pages/games.php");
}
?>

<?php include('inc/footer.php'); ?> 