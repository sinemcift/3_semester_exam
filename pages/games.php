<?php
require('../config/config.php');
require('../config/db.php');
?>

<?php include('../inc/header.php'); ?>

<?php include('../inc/logged-in.php'); ?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1 class="page-title">Games</h1>
        </div>
        <!-- Concentration camp game -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <a href="games/escape_the_concentration_camp.php"><img src="../image/thumbnail/thumb-1.jpg" class="card-img-top img-fluid" alt="Thumbnail a spil her."></a>
                <div class="card-body text-center">
                    <h5 class="card-title">Escape the concentration camp</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="games/escape_the_concentration_camp.php" class="btn btn-danger">Play now</a>
                </div>
            </div>
        </div>
        <!-- Match the weapons -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <a href="games/escape_the_concentration_camp.php"><img src="../image/thumbnail/thumb-1.jpg" class="card-img-top" alt="Thumbnail a spil her. "></a>
                <div class="card-body text-center">
                    <h5 class="card-title">Match the weapons</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="games/escape_the_concentration_camp.php" class="btn btn-danger">Play now</a>
                </div>
            </div>
        </div>
        <!-- Don't eat the cyannide pill -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <a href="games/escape_the_concentration_camp.php"><img src="../image/thumbnail/thumb-1.jpg" class="card-img-top" alt="Thumbnail a spil her. "></a>
                <div class="card-body text-center">
                    <h5 class="card-title">Don't eat the cyannide pill</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="games/escape_the_concentration_camp.php" class="btn btn-danger">Play now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../inc/footer.php'); ?>