<?php
    require('../config/config.php');
    require('../config/db.php');
?>
<?php include('../inc/header.php'); ?>

<?php 

$flag = false;

// 'submit kommer fra knappens 'name' 
if(isset($_POST['submit'])){


    //print_r($_POST);

    //Mysqli_real_escape_string... renser for karakterer som kan bruges til SQL angreb
    $userName = mysqli_real_escape_string ($conn, $_POST['username']);
    //password1 = første gang man indtaster password
    $pass1 = mysqli_real_escape_string ($conn, $_POST['password1']);
    //password2 = gentag password
    $pass2 = mysqli_real_escape_string ($conn, $_POST['password2']);

    //Stemmer de 2 passwords overens med hinanden
    if($pass1 == $pass2){
        $flag = true;
    }

    if($flag == true){
        $salt = "uwehpwaibhøepr" . $pass1 . "dhxtjcfyulhbiænjkoøm";
        
        $hashed = hash('sha512', $salt);

        $sql = "INSERT INTO login(login_name, login_pasword) values('$userName', '$hashed')";
        $result = mysqli_query($conn, $sql) or die ("Query virker overhovedet ikke!");
    }
}

?>

<div class="container">
    <div class="col-12">
        <h1>Sign up</h1>
    </div>
    <div class="col-10">
        <form action="registrer.php" method="POST" onSubmit="return checkForm()" id="checkform">
            <div class="row">
                <div class="form-group">
                    <label for="firstName" method="POST">First Name</label>
                    <input type="text" class="form-control" placeholder="Type your first name" name="First name" id="firstName">
                    <span class="helper-text"></span>
                </div>
                <div class="form-group">
                    <label for="lastName" method="POST">Last Name</label>
                    <input type="text" class="form-control" placeholder="Type your last name" name="Last name" id="lastName">
                    <span class="helper-text"></span>
                </div>
            </div>
            <div class="row">
                <!-- han bruger input-field i videoen i stedet for form-group -->
                <div class="form-group">
                    <label for="password" class="col-3">Password</label>
                    <input type="password" name="Password" id="password" placeholder="Enter a password">
                    <span class="helper-text"></span>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="col-5">Confirm Password</label>
                    <input type="password" name="Confirm Password" id="confirmPassword" placeholder="Enter a password">
                    <span class="helper-text"></span>
                </div>   
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input type="email" name="Email" id="email">
                    <span class="helper-text"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form> 
       
    </div>
</div>

<?php include('../inc/footer.php'); ?> 
<script>

// Input fields
let firstName = document.query.selector("#firstName");
let lastName = document.query.selector("#lastName");
let password = document.query.selector("#password");
let confirmPassword = document.query.selector("#confirmPassword");
let email = document.query.selector("#email");

//Forms

</script>