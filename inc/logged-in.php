
<?php
if (!isset($_SESSION['adgang'])) {
    header("location:".ROOT_URL."pages/login.php");
}
?>