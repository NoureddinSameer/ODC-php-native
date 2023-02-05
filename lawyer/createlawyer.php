<!-- lawyers -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';



checklink();
if (isset($_POST['send'])) {
  $name1 = $_POST["name1"];
  $name2 = $_POST["name2"];
  $age = $_POST["age"];
  $address = $_POST["address"];
  $salary = $_POST["salary"];
  $yearsEX = $_POST["yearsEX"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password=encryp($password);


  $image_name = time() . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "../upload/$image_name";
  move_uploaded_file($tmp_name, $location);
  // $location = "./upload/$image_name";
  $insert = "INSERT INTO `lawyers` (id,firstname,secondname,age,address,salary,yearsEX,phone,email,password,image)values(null,'$name1','$name2',$age,'$address',$salary
  ,$yearsEX,'$phone','$email','$password','$image_name')";
  $insertEmployeeCheck =  mysqli_query($connection, $insert);
  // test($insertEmployeeCheck, "insert");
  // test($Check, "insert lawyer");

  // session_unset();
  // session_destroy();
  path('lawyer/listlawyer.php');
  
}



?>
<br><br>
<div class="home">
  <h1 class="text-center  pt-5"> Welcome to lawyer Page</h1>
</div>

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
    <label for="">Lawyer Age</label>
    <input class="form-control" placeholder="Enter your Age" type="text" name="age">
  </div>
  <div class="form-group">
    <label for="">Lawyer Address</label>
    <input class="form-control" placeholder="Enter your Address" type="text" name="address">
  </div>
  <div class="form-group">
    <label for="">Lawyer Salary</label>
    <input class="form-control" placeholder="Enter your Salary" type="text" name="salary">
  </div>
  <div class="form-group">
    <label for="">Lawyer Experience</label>
    <input class="form-control" placeholder="Enter your years of Experience" type="text" name="yearsEX">
  </div>
  <div class="form-group">
    <label for="">Lawyer Phone</label>
    <input class="form-control" placeholder="Enter your Phone Number" type="text" name="phone">
  </div>
  <div class="form-group">
    <label for="">Lawyer E-mail</label>
    <input class="form-control" placeholder="Enter your E-mail" type="text" name="email">
  </div>
  <div class="form-group">
    <label for="">Lawyer Password</label>
    <input class="form-control" placeholder="Enter your Password" type="text" name="password">
  </div>
  <div class="form-group">
    <label for="">Lawyer Profile Photo</label>
    <input class="form-control" type="file" name="image">
  </div>

  <button name="send" class="btn btn-info"> Send </button>
</form>


<?php
include '../shared/footer.php';
include '../shared/script.php';
?>