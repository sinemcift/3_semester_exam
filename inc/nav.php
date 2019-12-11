<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>pages/games.php">Der untergang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php
  session_start();
  if (isset($_SESSION['adgang'])) {
    ?>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
        <!--After Login -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/games.php">Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/history.php">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/profile.php">My profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/logud.php">Log out</a>
        </li>
      </ul>
    </div>
</nav>

<?php
} 

else {
  ?>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/login.php">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>pages/registrer.php">Register</a>
      </li>
    </ul>
  </div>
  </nav>
<?php
}
?>