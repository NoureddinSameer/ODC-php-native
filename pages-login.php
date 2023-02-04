<?php
include './general/env.php';
include './general/functions.php';
include './shared/head.php';
include './shared/header1.php';

$numRows = 0;
$passworddb1 = "";
$passworddb2 = "";
if (isset($_POST['login'])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $select = "SELECT * FROM `admin` WHERE `email` ='$email'";
  $ss1  = mysqli_query($connection, $select);
  foreach ($ss1 as $y) {
    $passworddb1 = $y['password'];
  }
  if (password_verify($password, $passworddb1)) {
    $select = "SELECT * FROM `admin` WHERE `email` ='$email' and `password` = '$passworddb1'";
    $s1  = mysqli_query($connection, $select);
    $numRows = mysqli_num_rows($s1);
    $row = mysqli_fetch_assoc($s1);
    if ($numRows == 1) {
      $_SESSION['admin'] = [
        'adminName' => $email,
        'role' => $row['role'],
        'job' => "Admin"
      ];
      $job="Admin";
      path('./welcome.php');
    }else {
      session_unset();
      session_destroy();
      echo "<div class='alert alert-danger' role='alert'>
      Error! <br>
      You have a problem communicating with the Database
      <br>OR You have entered Wrong Data </div>";
      
    }
  } else {
    $select2 = "SELECT * FROM `lawyers` WHERE `email` ='$email'";
    $ss2  = mysqli_query($connection, $select2);
    foreach ($ss2 as $z) {
      $passworddb2 = $z['password'];
    }
    if (password_verify($password, $passworddb2)) {
      $select2 = "SELECT * FROM `lawyers` WHERE `email` ='$email' and `password` = '$passworddb2'";
      $s2  = mysqli_query($connection, $select2);
      $numRows = mysqli_num_rows($s2);
      $row = mysqli_fetch_assoc($s2);
      if ($numRows == 1) {
        $_SESSION['admin'] = [
          'adminName' => $email,
          'role' => "2",
          'job' => "Lawyer"
        ];
        path('./welcome.php');
      } else {
        echo '<br>'.
        session_unset();
        session_destroy();
        echo "<div class='alert alert-danger' role='alert'>
        Error! <br>
        You have a problem communicating with the Database
        <br>OR You have entered Wrong Data </div>";        
      }
    }
  }
}

?>
<br>

<form action="" method="POST" enctype="multipart/form-data">
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-center py-4">
                  <a href="index.php" class="logo d-flex align-items-center w-auto">
                    <label><i class="fa-brands fa-slack fa-2x"></i></label>
                    <span class="d-none d-lg-block">Baldaty</span>
                  </a>
                </div>
                <div class="card mb-3">

                  <div class="card-body">

                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your E-mail & password to login</p>
                    </div>



                    <div class="col-12">
                      <label for="yourUsername" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" placeholder="Enter your E-mail" name="email" class="form-control" id="yourUsername" required>

                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" placeholder="Enter your Password" name="password" class="form-control" id="yourPassword" required>

                    </div>
                    <br>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                    </div>
                  </div>
                </div>
                <div class="credits">
                  Designed by <a href="https://www.linkedin.com/in/noureddin-sameer-45760a236/">Noureddin Sameer</a>
                </div>
              </form>
            </div>
          </div>
        </div>

      </section>
</form>
</div>
</main>
<?php
include './shared/footer.php';
include './shared/script.php';
?>