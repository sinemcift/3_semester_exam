<?php
require_once('../config/config.php');
require_once('../config/db.php');
?>

<?php include('../inc/header.php'); ?>
<?php
// If you are granted access then you will be redirected the the profile site. 
if (isset($_SESSION['adgang'])) {
    header("location:profile.php");
}
?>


<?php
    $output = "";
    if(isset($_POST['submit'])){
        $userName = mysqli_real_escape_string ($conn, $_POST['username']);
        $pass = mysqli_real_escape_string ($conn, $_POST['password']);

        // salt mixes different charcters to your password
        $salt = "uwehpwaibhøepr" . $pass . "dhxtjcfyulhbiænjkoøm";
        
        // hasing is the result of the mix of salt. 
        $hashed = hash('sha512', $salt);

        $sql = "SELECT * FROM login WHERE login_name = '$userName' AND login_pasword = '$hashed'";

        $result = mysqli_query($conn, $sql) or die("Query virker ikke!" . $sql);

        // if one result appears, you are granted access 
        if(mysqli_num_rows($result) == 1){
            session_start();
            $_SESSION['adgang'] = "adgang";
            $_SESSION['username'] = $userName; 
            header("location:profile.php");
        }else {
            $output = "Wrong login";
        }
    }
?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="page-title">Login:</h1>
        </div>
        <div class="col-6">
            <form method="POST">
                <div class="form-group">
                    <label for="username" method="POST">Username:</label>
                    <input type="text" class="form-control" placeholder="Indtast brugernavn" name="username">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Password"  name="password">
                </div>
                <button type="submit" class="btn login-btn" name="submit">Login</button>
                <h3><?php echo $output ?></h3>
                
            </form> 
        </div>
    </div>
</div>
<?php include('../inc/footer.php'); ?>    
