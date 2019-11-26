<?php include('../inc/header.php'); ?>
<?php include('../inc/logged-in.php'); ?>

<!-- content on page (HTML) -->
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h1>Dette er din profil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form method="POST">
                <div class="form-group">
                    <label for="username" method="POST">Navn</label>
                    <input type="text" class="form-control" placeholder="Indtast fornavn" name="username">
                </div>
                <div class="form-group">
                    <label for="username" method="POST">Adresse</label>
                    <input type="text" class="form-control" placeholder="Indtast gade, nummer, ettage & by" name="username">
                </div>
                <div class="form-group">
                    <label for="username" method="POST">Telefon</label>
                    <input type="text" class="form-control" placeholder="eks. +45 12 34 56 78" name="username">
                </div>
                <div class="form-group">
                    <label for="username" method="POST">Email</label>
                    <input type="text" class="form-control" placeholder="eks. Peter@perstennet.dk" name="username">
                </div>
                <div class="form-group">
                    <label for="username" method="POST">Køn</label>
                    <select name="" id="">
                        <option value="">Kvinde</option>
                        <option value="">Mand</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username" method="POST">Alder</label>
                    <input type="text" class="form-control" placeholder="indtast alder. " name="username">
                </div>
            </form>
        </div>

        <div class="col-6">
            <img class="img-fluid" src="../image/woman-profile-img.jpg" alt="">
        </div>
    </div>
</div>


<?php include('../inc/footer.php'); ?>