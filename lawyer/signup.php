<!-- lawyers -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';



// checklink();
if (isset($_POST['send'])) {
  $name1 = $_POST["name1"];
  $name2 = $_POST["name2"];
  $age = $_POST["age"];
  $address = $_POST["address"];
  $Comments = $_POST["Comments"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password=encryp($password);


//   $image_name = time() . $_FILES['image']['name'];
//   $tmp_name = $_FILES['image']['tmp_name'];
//   $location = "../upload/$image_name";
//   move_uploaded_file($tmp_name, $location);
  // $location = "./upload/$image_name";
  $insert = "INSERT INTO `lawyers` (id,firstname,secondname,age,address,phone,email,password)values(null,'$name1','$name2',$age,'$address'
  ,'$phone','$email','$password')";
  $insertEmployeeCheck =  mysqli_query($connection, $insert);
  // test($insertEmployeeCheck, "insert");
  // test($Check, "insert lawyer");

  // session_unset();
  // session_destroy();
  path('./pages-login.php');
  
}



?>
<br><br>
<?php
if (!isset($_SESSION['admin'])) { ?>
<div class="home">
  <h1 class="text-center  pt-5"> Sign up</h1>
</div>
<?php }else{ ?>
        <div class="home">
            <h1 class="text-center  pt-5"> Add Partner </h1>
        </div>
<?php  } ?>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">First Name</label>
    <input class="form-control" placeholder="Enter your First Name" type="text" name="name1">
  </div>
  <div class="form-group">
    <label for="">Second Name</label>
    <input class="form-control" placeholder="Enter your Second Name" type="text" name="name2">
  </div>
  <div class="form-group">
    <label for="">Age</label>
    <input class="form-control" placeholder="Enter your Age" type="text" name="age">
  </div>
  <div class="form-group">
    <label for="">Address</label>
    <input class="form-control" placeholder="Enter your Address" type="text" name="address">
  </div>
  
  <div class="form-group">
    <label for="">Phone</label>
    <input class="form-control" placeholder="Enter your Phone Number" type="text" name="phone">
  </div>
  <div class="form-group">
    <label for="">E-mail</label>
    <input class="form-control" placeholder="Enter your E-mail" type="text" name="email">
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input class="form-control" placeholder="Enter your Password" type="text" name="password">
  </div>
  
  <button name="send" class="btn btn-info"> Send </button>
</form>


<?php
include '../shared/footer.php';
include '../shared/script.php';
?>