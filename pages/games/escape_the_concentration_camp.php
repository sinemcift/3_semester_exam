<?php
require('../../config/config.php');
require('../../config/db.php');
?>
<?php include('../../inc/header.php'); ?>

<?php include('../../inc/logged-in.php'); ?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1 class="page-title">Escape the concentration camp</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <center><canvas id="canvas" width="805" height="630"></canvas></center>
        </div>
        <!-- This header is hidden until you finish the game. -->
        <h3 id="congrats" class=" col-md-8 mb-5">CONGRATULATIONS! <br>
        You managed to escape the concentration camp, and save all your family members! <br>Your score is:</h3> 

        <div class="col-md-3">
            <h5>Number of family saved: <span id="keydisplay"></span></h5>
            <h5>Luggage collected: <span id="pointdisplay"></span></h5>
            <!-- Game description -->
            <p id="description" class="mt-4">You've been locked up in the concentration camp, your mission is the escape the camp, but remember to bring all your family members!</p>
            <!-- add icons of game and tell what they are. -->
            <div id="icons">
                <p class="mt-4 img-icon"><img src="../../image/bricks/player.png" alt="game tile icon"> = You</p>
                <p class="img-icon"><img src="../../image/bricks/suitcase.png" alt="game tile icon"> = Personal item - 1 point</p>
                <p class="img-icon"><img src="../../image/bricks/family.png" alt="game tile icon"> = Family member - 1 point</p>
                <p class="img-icon"><img src="../../image/bricks/soldier.png" alt="game tile icon"> = Nazi soldier</p>
                <p class="img-icon"><img src="../../image/bricks/exit.png" alt="game tile icon"> = Exit</p>
            </div>
        </div>
    </div>
</div>


<?php include('../../inc/footer.php'); ?>