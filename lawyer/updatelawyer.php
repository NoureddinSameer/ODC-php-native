<!-- updateemployee -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';

checklink();
$id = $_GET['updateId'];
$selectOneRow = "SELECT * FROM `lawyers` WHERE id=$id";
$Check = mysqli_query($connection, $selectOneRow);
// i represent the row
if ($Check) {
    $i = mysqli_fetch_assoc($Check);
    $lawyerName1 = $i['firstname'];
    $lawyerName2 = $i['secondname'];
    $lawyerAge = $i['age'];
    $lawyerAddress = $i['address'];
    $lawyerSalary = $i['salary'];
    $lawyerYearsEX = $i['yearsEX'];
    $lawyerPhone = $i['phone'];
    $lawyerEmail = $i['email'];
    $lawyerPassword = $i['password'];
}
//update after we press on button of Update Data
if (isset($_POST['update'])) {
    $lawyerName1 = $_POST['lawyerName1'];
    $lawyerName2 = $_POST['lawyerName2'];
    $lawyerAge = $_POST['lawyerAge'];
    $lawyerAddress = $_POST['lawyerAddress'];
    $lawyerSalary = $_POST['lawyerSalary'];
    $lawyerYearsEX = $_POST['lawyerYearsEX'];
    $lawyerPhone = $_POST['lawyerPhone'];
    $lawyerEmail = $_POST['lawyerEmail'];
    $lawyerPassword = $_POST['lawyerPassword'];
    $lawyerPassword = encryp($lawyerPassword);

    if (empty($_FILES['image']['name'])) {
        $image_name = $i['image'];
    } else {
        $image_name = time()  . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "../upload/$image_name";
        move_uploaded_file($tmp_name, $location);
        // $location = "/ODC7/employees/upload/$image_name";
    }


    $update = "UPDATE `lawyers` SET  firstname='$lawyerName1',secondname='$lawyerName2',age=$lawyerAge,
    address='$lawyerAddress',salary=$lawyerSalary,yearsEX=$lawyerYearsEX,
    phone='$lawyerPhone',email='$lawyerEmail',`password`='$lawyerPassword',image='$image_name' WHERE id=$id";
    $CheckUpdate = mysqli_query($connection, $update);

    if ($CheckUpdate) {
        path("lawyer/listlawyer.php");
        
    } else {
        die("ERROR!" . mysqli_connect_error());
    }
}

?>
<br><br><br>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="lawyerName1">Lawyer First Name</label>
        <input type="text" class="form-control" value=<?= $lawyerName1 ?> id="lawyerName1" name="lawyerName1" required>
    </div>
    <div class="form-group">
        <label for="lawyerName2">Lawyer Second Name</label>
        <input type="text" class="form-control" value=<?= $lawyerName2 ?> id="lawyerName2" name="lawyerName2" required>
    </div>
    <div class="form-group">
        <label for="lawyerAge">Lawyer Age</label>
        <input type="text" class="form-control" value=<?= $lawyerAge ?> id="lawyerAge" name="lawyerAge" required>
    </div>
    <div class="form-group">
        <label for="lawyerAddress">Lawyer Address</label>
        <input type="text" class="form-control" value=<?= $lawyerAddress ?> id="lawyerAddress" name="lawyerAddress" required>
    </div>
    <div class="form-group">
        <label for="lawyerSalary">Lawyer Address</label>
        <input type="text" class="form-control" value=<?= $lawyerSalary ?> id="lawyerSalary" name="lawyerSalary" required>
    </div>
    <div class="form-group">
        <label for="lawyerYearsEX">Lawyer Years EX</label>
        <input type="text" class="form-control" value=<?= $lawyerYearsEX ?> id="lawyerYearsEX" name="lawyerYearsEX" required>
    </div>
    <div class="form-group">
        <label for="lawyerPhone">Lawyer Phone</label>
        <input type="text" class="form-control" value=<?= $lawyerPhone ?> id="lawyerPhone" name="lawyerPhone" required>
    </div>
    <div class="form-group">
        <label for="lawyerEmail">Lawyer Email</label>
        <input type="text" class="form-control" value=<?= $lawyerEmail ?> id="lawyerEmail" name="lawyerEmail" required>
    </div>
    <div class="form-group">
        <label for="lawyerPassword">Lawyer Password</label>
        <input type="text" class="form-control" value=<?= $lawyerPassword ?> id="lawyerPassword" name="lawyerPassword" required>
    </div>
    <div class="form-group">
        <label for="">Lawyer Profile Photo</label>
        <input class="form-control" type="file" name="image">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
</form>
</table>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>