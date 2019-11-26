<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>index.php">Game Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <?php
  session_start();
  if (isset($_SESSION['adgang'])) {
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <!--After Login -->
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>">Hjem</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/games.php">Games</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/profile.php">Min profil</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/logud.php">Log ud</a>
        </li>
      </ul>

    </div>
</nav>
<?php
} else {
  ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/login.php">Log ind</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/registrer.php">Registrer</a>
      </li>
    </ul>
  </div>
  </nav>
<?php
}
?>