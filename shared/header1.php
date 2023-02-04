<?php
session_start();
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location: ./index.php");
}
$email;
if (isset($_SESSION['admin'])){
    $email = $_SESSION['admin']['adminName'];
    $user = $_SESSION['admin']['job'];

    if ($user == "Admin") {
      $readAll1 = "SELECT * FROM `admin` WHERE email='$email'";
      $iC1 = mysqli_query($connection, $readAll1);

      if ($iC1) {
        foreach ($iC1 as $row1) {
          $name = $row1['firstname'];
          $image = $row1['image'];
          $phone = $row1['phone'];
          $address = $row1['address'];
          $user = "Admin";
        }
      }
    } else {
      $readAll2 = "SELECT * FROM `lawyers` WHERE email='$email'";
      $iC2 = mysqli_query($connection, $readAll2);
      if ($iC2) {
        foreach ($iC2 as $row2) {
          $name = $row2['firstname'];
          $image = $row2['image'];
          $phone = $row2['phone'];
          $address = $row2['address'];
          $user = "Lawyer";
        }
      }
      
    }
    
}
?>

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo d-flex align-items-center">
      

      <span class="d-none d-lg-block">Baldaty</span>
    </a>
  </div>


  <?php if (isset($_SESSION['admin'])) : ?>
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
      <span class="d-none d-md-block dropdown-toggle ps-2"><?= 'admins' ?></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./admin/createadmin.php">
          <i class="bi bi-gear"></i>
          <span>Add admin</span>
        </a>
      </li>

      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./admin/listadmin.php">
          <i class="bi bi-gear"></i>
          <span>List All</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./admin/showadmin.php">
          <i class="bi bi-gear"></i>
          <span>Show All</span>
        </a>
      </li>
    </ul>
  <?php endif; ?>
  <!-- end admins -->

  <?php if (isset($_SESSION['admin'])) : ?>
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
      <span class="d-none d-md-block dropdown-toggle ps-2"><?= 'Partners' ?></span>
    </a>
    <!-- checklink();
if ($_SESSION['admin']['role'] != "1") {
  path('404.php');
} -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <?php checklink(); if ($_SESSION['admin']['role'] != "1") { ?>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./lawyer/drag.php">
          <i class="bi bi-gear"></i>
          <span>Drag a photo</span>
        </a>
      </li>
      <?php  }else{ ?>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./lawyer/createlawyer.php">
          <i class="bi bi-gear"></i>
          <span>Add Partner</span>
        </a>
      </li>
      <?php  } ?>

      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./lawyer/listlawyer.php">
          <i class="bi bi-gear"></i>
          <span>List All</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./lawyer/showlawyer.php">
          <i class="bi bi-gear"></i>
          <span>Show All</span>
        </a>
      </li>

    </ul>
  <?php endif; ?>
  <!-- end lawyers -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">
        <?php if (isset($_SESSION['admin'])) : ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
            <img src="<?= './upload/' . $image ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $name ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $name ?></h6>
              <span><?= $user ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <form action="">
                <button name="logout" class="dropdown-item d-flex align-items-center" href="./pages-login.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span><i class="fa-solid fa-right-from-bracket"></i>Sign Out</span>
                </button>
              </form>
            </li>
          </ul>
        <?php endif; ?>
  </nav>
</header>