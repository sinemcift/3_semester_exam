<?php
require_once('../config/config.php');
require_once('../config/db.php');
?>

<?php include('../inc/header.php'); ?>
<?php
if (isset($_SESSION['adgang'])) {
    header("location:profile.php");
}
?>

<?php
    $output = "";
    if(isset($_POST['submit'])){
        $userName = mysqli_real_escape_string ($conn, $_POST['username']);
        $pass = mysqli_real_escape_string ($conn, $_POST['password']);

        $salt = "uwehpwaibhøepr" . $pass . "dhxtjcfyulhbiænjkoøm";
        
        $hashed = hash('sha512', $salt);

        $sql = "SELECT * FROM login WHERE login_name = '$userName' AND login_pasword = '$hashed'";

        $result = mysqli_query($conn, $sql) or die("Query virker ikke!" . $sql);

        if(mysqli_num_rows($result) == 1){
            session_start();

            $_SESSION['adgang'] = "adgang";

            header("location:profile.php");
        
            $output = "Du er logget ind";
        }else {
            $output = "Forkert login";
        }

    }
?>

<div class="container">
    <div class="col-12">
        <h1>Log ind:</h1>
    </div>
    <div class="col-6">
        <form method="POST">
            <div class="form-group">

                <label for="username" method="POST">Brugernavn</label>
                <input type="text" class="form-control" placeholder="Indtast brugernavn" name="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password"  name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <h3><?php echo $output ?></h3>
            
        </form> 
    </div>
</div>
<?php include('../inc/footer.php'); ?>    
