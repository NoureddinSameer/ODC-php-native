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
    $partnerName1 = $i['firstname'];
    $partnerName2 = $i['secondname'];
    $partnerAge = $i['age'];
    $partnerAddress = $i['address'];
    
    $partnerComments = $i['partnerComments'];
    $partnerPhone = $i['phone'];
    $partnerEmail = $i['email'];
    $partnerPassword = $i['password'];
}
//update after we press on button of Update Data
if (isset($_POST['update'])) {
    $partnerName1 = $_POST['partnerName1'];
    $partnerName2 = $_POST['partnerName2'];
    $partnerAge = $_POST['partnerAge'];
    $partnerAddress = $_POST['partnerAddress'];
    $partnerComments = $_POST['partnerComments'];
    $partnerPhone = $_POST['partnerPhone'];
    $partnerEmail = $_POST['partnerEmail'];
    $partnerPassword = $_POST['partnerPassword'];
    $partnerPassword = encryp($partnerPassword);

    if (empty($_FILES['image']['name'])) {
        $image_name = $i['image'];
    } else {
        $image_name = time()  . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "../upload/$image_name";
        move_uploaded_file($tmp_name, $location);
        // $location = "/ODC7/employees/upload/$image_name";
    }


    $update = "UPDATE `lawyers` SET  firstname='$partnerName1',secondname='$partnerName2',age=$partnerAge,
    address='$partnerAddress',comments=$partnerComments,
    phone='$partnerPhone',email='$partnerEmail',`password`='$partnerPassword',image='$image_name' WHERE id=$id";
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
        <label for="partnerName1">Partner First Name</label>
        <input type="text" class="form-control" value=<?= $partnerName1 ?> id="partnerName1" name="partnerName1" required>
    </div>
    <div class="form-group">
        <label for="partnerName2">Partner Second Name</label>
        <input type="text" class="form-control" value=<?= $partnerName2 ?> id="partnerName2" name="partnerName2" required>
    </div>
    <div class="form-group">
        <label for="partnerAge">Partner Age</label>
        <input type="text" class="form-control" value=<?= $partnerAge ?> id="partnerAge" name="partnerAge" required>
    </div>
    <div class="form-group">
        <label for="partnerAddress">Partner Address</label>
        <input type="text" class="form-control" value=<?= $partnerAddress ?> id="partnerAddress" name="partnerAddress" required>
    </div>    
    
    <div class="form-group">
        <label for="partnerPhone">Partner Phone</label>
        <input type="text" class="form-control" value=<?= $partnerPhone ?> id="partnerPhone" name="partnerPhone" required>
    </div>
    <div class="form-group">
        <label for="partnerEmail">Partner Email</label>
        <input type="text" class="form-control" value=<?= $partnerEmail ?> id="partnerEmail" name="partnerEmail" required>
    </div>
    <div class="form-group">
        <label for="partnerPassword">Partner Password</label>
        <input type="text" class="form-control" value=<?= $partnerPassword ?> id="partnerPassword" name="partnerPassword" required>
    </div>
    <div class="form-group">
        <label for="">Partner's Photo</label>
        <input class="form-control" type="file" name="image">
    </div>
    <div class="form-group">
        <label for="partnerComments">Partner Comments</label>
        <input type="text" class="form-control" value=<?= $partnerComments ?> id="partnerComments" name="partnerComments" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
</form>
</table>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>