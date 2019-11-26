
<?php
require('../config/config.php');
require('../config/db.php');
?>
<?php include('../inc/header.php'); ?>

<?php 

$flag = false;
$ifunique = true;

if(isset($_POST['submit'])){


    //print_r($_POST);

    //Mysqli_real_escape_string... renser for karakterer som kan bruges til SQL angreb
    $userName = mysqli_real_escape_string ($conn, $_POST['username']);
    //password1 = første gang man indtaster password
    $pass1 = mysqli_real_escape_string ($conn, $_POST['password1']);
    //password2 = gentag password
    $pass2 = mysqli_real_escape_string ($conn, $_POST['password2']);
    //name = navn
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $message = "Brugernavnet \"" . $userName . "\" er optaget";

    //Stemmer de 2 passwords overens med hinanden 
    if($pass1 == $pass2){
        $flag = true;
    }
    $sql = "SELECT * FROM login WHERE login_name = '$userName'";
    $result = mysqli_query($conn, $sql) or die ("Query virker slet ikke!");


    //print_r($result);

    if (mysqli_num_rows($result)){
        $ifunique = false;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }       

    if($flag && $ifunique == true){
        $salt = "uwehpwaibhøepr" . $pass1 . "dhxtjcfyulhbiænjkoøm";
        
        $hashed = hash('sha512', $salt);

        $sql = "INSERT INTO login(login_name, login_pasword) values ('$userName', '$hashed')";
        $result = mysqli_query($conn, $sql) or die ("Query virker overhovedet ikke!");
    }
}

?>

<div class="container">
    <div class="col-12">
        <h1>Registrer:</h1>
    </div>
    <div class="col-6">
        <form action="registrer.php" method="POST" id="checkform">
            <div class="form-group">

                <label for="username" method="POST">Brugernavn</label>
                <input type="text" class="form-control" placeholder="Indtast brugernavn" name="username" id="username">
                <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password1" id="pass1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
            <div class="form-group">
                <label for="password2">Gentag password</label>
                <input type="password" class="form-control" placeholder="Password" name="password2" id="pass2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Store og små bogstaver, min 8 tegn">
            </div>
            <div class="form-group">
                <label for="name">Fornavn</label>
                <input type="text" class="form-control" placeholder="Indtast fornavn" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" placeholder="Indtast gade, nummer, etage og by" name="address" id="address" required>
            </div>


            <button class="btn btn-primary" name="submit">Submit</button>

        </form> 
       
    </div>
</div>

<?php include('../inc/footer.php'); ?> 