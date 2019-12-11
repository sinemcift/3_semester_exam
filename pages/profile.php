<?php
require_once('../config/config.php');
require_once('../config/db.php');
?>
<?php include('../inc/header.php'); ?>
<?php include('../inc/logged-in.php'); ?>

<?php
//session_start(); is included in the nav.php file.
$userName = $_SESSION ['username'];
if(isset($_SESSION['adgang'])){
    $sql = "SELECT * FROM login WHERE login_name = '$userName'";

    //Den henter data fra databasen (dette er sat op i "dataform", med andre ord det er ikke sat op som en forståelig liste.) 
    $result = mysqli_query($conn, $sql) or die("Query doesn't work");
    //Her laver den et array med alle informationer fra en specific bruger. 
    $user = mysqli_fetch_assoc($result); 
} else {
    echo "<script>window.location.href='index.php';</script>";
}
?>

<!-- content on page (HTML) -->
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-5"><h1 class="page-title">Welcome back to your profile <?php echo $user['login_name']; ?></h1></div>
    </div>
    <div class="px-4 py-4 rounded">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 profile-input mx-1 my-1"><p>Username <span><?php echo $user['login_name']; ?></span></p></div>
            <div class="col-md-6 profile-input mx-1 my-1"><p>First name: <span><?php echo $user['login_first_name']; ?></span></p></div>
            <div class="col-md-6 profile-input mx-1 my-1"><p>Last name: <span><?php echo $user['login_last_name']; ?></span></p></div>
            <div class="col-md-6 profile-input mx-1 my-1"><p>Age: <span><?php echo $user['login_age']; ?></span></p></div>
            <div class="col-md-6 profile-input mx-1 my-1"><p>Email: <span><?php echo $user['login_email']; ?></span></p></div>
            <div class="col-md-6 profile-input mx-1 my-1"><p>Address: <span><?php echo $user['login_adresse']; ?></span></p></div>
            <a class="col-md-6 edit-btn text-center py-2" href="<?php echo ROOT_URL; ?>pages/edit-profile.php">Edit</a>
        </div>
    </div>
</div> 



<?php include('../inc/footer.php'); ?>