
<?php
require('../config/config.php');
require('../config/db.php');
?>
<?php include('../inc/header.php'); ?>

<?php 

$flag_password = false;
$flag_email = false;
$ifunique = true;

if(isset($_POST['submit'])){
    //print_r($_POST);
    //Mysqli_real_escape_string... Clears for characters that can be used for sql attacks.
    $userName = mysqli_real_escape_string ($conn, $_POST['username']);
   
    //
    $pass1 = mysqli_real_escape_string ($conn, $_POST['password1']);
    $pass2 = mysqli_real_escape_string ($conn, $_POST['password2']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
    $first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
    $age = mysqli_real_escape_string($conn, $_POST['age']); 
    $address = mysqli_real_escape_string($conn, $_POST['address']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $email2 = mysqli_real_escape_string($conn, $_POST['email2']); 

    $message = "The username \"" . $userName . "\" is not available";
    $emailWrong = "The emails do not match";
    $passWrong = "The passwords do not match";

    // Check if both of the passwords match
    if($pass1 == $pass2){
        $flag_password = true;
    }else {
        echo "<script type='text/javascript'>alert('$passWrong');</script>";
    }

    // Check if the two emails match.
    if($email == $email2){
        $flag_email = true;
    }else {
        echo "<script type='text/javascript'>alert('$emailWrong');</script>";
    }

    $sql = "SELECT * FROM login WHERE login_name = '$userName'";
    $result = mysqli_query($conn, $sql) or die ("Query doesn't work!");

    // if the username uniqueness is false then it will return the $message
    if (mysqli_num_rows($result)){
        $ifunique = false;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }       
    // if both the flag_passvord flag_email and the username is unique is true. 
    if($flag_password && $ifunique && $flag_email == true){
        // Then salt the password
        $salt = "uwehpwaibhøepr" . $pass1 . "dhxtjcfyulhbiænjkoøm";
        
        $hashed = hash('sha512', $salt);

        // insert all the values to the database in the respected columns. 
        $sql = "INSERT INTO `login` (`login_id`, `login_name`, `login_pasword`, `login_tm`, `login_age`, `login_adresse`, `login_last_name`, `login_email`, `login_first_name`) VALUES (NULL, '$userName', '$hashed', CURRENT_TIMESTAMP, '$age', '$address', '$last_name', '$email', '$first_name');";
        $result = mysqli_query($conn, $sql) or die ("Query doesn't work at all!");
        
        session_start();
        $_SESSION['adgang'] = 'adgang';
        $_SESSION['username'] = $userName;
        // And then you will me logged in and redirected to your profile
        echo "<script>window.location.href='profile.php';</script>";
    }

}

?>

<div class="container">
    <div class="col-12">
        <h1 class="page-title mt-5">Registrer:</h1>
    </div>
    <div class="col-6">
        <form class="mt-4" method="POST" id="checkform">
            <div class="form-group">
                <label><p><span>*</span> Username:</p></label>
                <input type="text" class="form-control" placeholder="Enter username" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label><p><span>*</span> Password:</p></label>
                <!-- as a frontend validation I choosed to use regular expresions where the rules where: use min. 8 char. both a-z, A-Z and a number -->
                <input type="password" class="form-control" placeholder="Enter password" name="password1" id="pass1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
            <div class="form-group">
                <label><p><span>*</span> Repeat password:</p></label>
                <input type="password" class="form-control" placeholder="Repeat your password" name="password2" id="pass2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
            <div class="form-group">
                <label><p><span>*</span> First name:</p></label>
                <input type="text" class="form-control" placeholder="Enter first name" name="firstName" id="name" required>
            </div>
            <div class="form-group">
                <label><p><span>*</span> Last name:</p></label>
                <input type="text" class="form-control" placeholder="Enter last name" name="lastName" id="name" required>
            </div>
            <div class="form-group">
                <label><p><span>*</span> E-mail:</p></label>
                <input type="text" class="form-control" placeholder="Enter e-mail" name="email" id="name" required>
            </div>
            <div class="form-group">
                <label><p><span>*</span> Repeat e-mail:</p></label>
                <input type="text" class="form-control" placeholder="Repeat your e-mail" name="email2" id="name" required>
            </div>
            <div class="form-group">
                <label><p><span>*</span> Address:</p></label>
                <input type="text" class="form-control" placeholder="enter streetname, number, (floor), zipcode and city" name="address" id="adress" required>
            </div>
            <div class="form-group">
                <label><p><span>*</span> Age:</p></label>
                <input type="number" class="form-control" placeholder="Enter your age" name="age" id="age" required>
            </div>
            <button class="btn register-btn mb-5" name="submit">Register</button>
        </form> 
    </div>
</div>

<?php include('../inc/footer.php'); ?> 