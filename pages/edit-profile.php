<?php
require('../config/config.php');
require('../config/db.php');
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

<?php
$flag_old_pass = false;
$flag_new_pass = false;
$flag_old_email = false;
$flag_new_email = false;
$ifuniqueuser = true;
$ifuniquemail = true;

if (isset($_SESSION['save'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['username']); 
    $old_password = mysqli_real_escape_string($conn, $_POST['oldPass']); 
    $new_password_1 = mysqli_real_escape_string($conn, $_POST['newPass1']); 
    $new_password_2 = mysqli_real_escape_string($conn, $_POST['newPass2']); 
    $first_name = mysqli_real_escape_string($conn, $_POST['firstName']); 
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']); 
    $old_email = mysqli_real_escape_string($conn, $_POST['oldEmail']); 
    $new_email_1 = mysqli_real_escape_string($conn, $_POST['newEmail1']); 
    $new_email_2 = mysqli_real_escape_string($conn, $_POST['newEmail2']); 
    $address = mysqli_real_escape_string($conn, $_POST['address']); 
    $age = mysqli_real_escape_string($conn, $_POST['age']); 

    $old_pass_wrong = "This doesn't match your old password.";
    $new_pass_wrong = "The passwords doesn't match.";
    $old_email_wrong = "This doesn't match your old e-mail";
    $new_email_wrong = "The emails doesn't match.";

    $message = "The username \"" . $user_name . "\" is already in use.";
    $message2 = "The email \"" . $new_email_1 . "\" is already in use.";

    //Stemmer de 2 passwords overens med hinanden 
    if($old_password == $old_password){
        $flag_old_pass = true;
    }else {
        echo "<script type='text/javascript'>alert('$old_pass_wrong');</script>";
    }    
    if($new_password_1 == $new_password_2){
        $flag_new_pass = true;
    }else {
        echo "<script type='text/javascript'>alert('$new_pass_wrong');</script>";
    }
    if($old_email == $old_email){
        $flag_old_email = true;
    }else {
        echo "<script type='text/javascript'>alert('$old_email_wrong');</script>";
    }
    if($new_email_1 == $new_email_2){
        $flag_new_email = true;
    }else {
        echo "<script type='text/javascript'>alert('$new_email_wrong');</script>";
    }
    $sql = "SELECT * FROM login WHERE login_name = '$user_name'";
    $result = mysqli_query($conn, $sql) or die ("Query doesn't work!");

    if (mysqli_num_rows($result)){
        $ifuniqueuser = false;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    if (mysqli_num_rows($result)){
        $ifuniquemail = false;
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }

    if($flag_old_pass && $flag_new_pass && $flag_old_email && $flag_new_email && ifuniqueuser && $ifuniquemail == true){
        //salt er krydderi
        $salt = "uwehpwaibhøepr" . $new_password_1 . "dhxtjcfyulhbiænjkoøm";
        //hash er skeerne som blander salaten. 
        $hashed = hash('sha512', $salt);

        $sql = "INSERT INTO `login` (`login_id`, `login_name`, `login_pasword`, `login_tm`, `login_age`, `login_adresse`, `login_last_name`, `login_email`, `login_first_name`) VALUES (NULL, '$userName', '$hashed', CURRENT_TIMESTAMP, '$age', '$address', '$last_name', '$email', '$first_name');";
        $result = mysqli_query($conn, $sql) or die ("Query doesn't work!");
       
        $_SESSION['username'] = $user_name;

        echo "<script>window.location.href='profile.php';</script>";
    }
}
?>

<div class="container">
    <div class="row mt-5">
    <div class="col-12 text-center"><h1 class="page-title">Hi <?php echo $user['login_name']; ?> edit your profile setting here</h1></div>
    <form class="col-12 mt-4" method="POST" id="checkform">
        <div class="row">
            <!-- Username -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> Username:</p></label>
                <input type="text" class="form-control" value="<?php echo $user['login_name']; ?>" name="username" id="username">
            </div>
        </div>
        <div class="row">
            <!-- Old passwords -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> Old password:</p></label>
                <input type="password" class="form-control" placeholder="Enter old password" name="oldPass" id="oldPass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
            <!-- new password -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> New password:</p></label>
                <input type="password" class="form-control" placeholder="Enter new password" name="newPass1" id="newPass1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
            <!-- repeat new password -->
            <div class="form-group col-md-6 offset-md-6">
                <label><p><span>*</span> Repeat new password:</p></label>
                <input type="password" class="form-control" placeholder="Repeat new password" name="newPass2" id="newPass2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
        </div>
        <div class="row">
            <!-- first name -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> First name:</p></label>
                <input type="text" class="form-control" value="<?php echo $user['login_first_name']; ?>" name="firstName" id="name" required>
            </div>
            <!-- Last name -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> Last name:</p></label>
                <input type="text" class="form-control" value="<?php echo $user['login_last_name']; ?>" name="lastName" id="name" required>
            </div>
        </div>
        <div class="row">
            <!-- Old email -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> Old e-mail:</p></label>
                <input type="text" class="form-control" placeholder="Enter old e-mail" name="oldEmail" id="name" required>
            </div>
            <!-- New email -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> New e-mail:</p></label>
                <input type="text" class="form-control" placeholder="Enter new e-mail" name="newEmail1" id="newEmail1" required>
            </div>
            <!-- Repeat new email -->
            <div class="form-group col-md-6 offset-md-6">
                <label><p><span>*</span> Repeat new e-mail:</p></label>
                <input type="text" class="form-control" placeholder="New e-mail" name="newEmail2" id="newEmail2" required>
            </div>
        </div>
        <div class="row">
            <!-- Address -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> Address:</p></label>
                <input type="text" class="form-control" placeholder="Repeat new e-mail" name="address" id="newEmail2" required>
            </div>
            <!-- Age -->
            <div class="form-group col-md-6">
                <label><p><span>*</span> Age:</p></label>
                <input type="number" class="form-control" value="<?php echo $user ['login_age']; ?>" name="age" id="age" required>
            </div>
        </div>
        <div class="row">
            <!-- Save button -->

            <div class="col-md-6 my-5 ">
                <button class="btn save-btn col-md-3" name="save">Save</button>
            </div>
        </div>
        </form> 
    </div>
</div>



<?php include('../inc/footer.php'); ?>