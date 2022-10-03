<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';


checklink();
$readAll = "SELECT * FROM `lawyers`";
$iC = mysqli_query($connection, $readAll);
foreach ($iC as $row) { ?>
    <br><br><br>
    <h1 class="text-center"> Lawyer : <?= $row['id'] ?></h1>
    <div class="container col-md-3 mt-5">
        <div class="card">            
            <img src="<?= '../upload/' . $row['image']  ?>" class="img-card-top" alt="">
            <div class="card">
                <h6>Name : <?= $row['firstname'].' '.$row['secondname'] ?></h6>
                <h6>Age : <?= $row['age'] ?></h6>
                <h6>Address : <?= $row['address'] ?></h6>
                <h6>Salary : <?= $row['salary'] ?></h6>
                <h6>Experience : <?= $row['yearsEX'] ?></h6>
                <h6>Phone : <?= $row['phone'] ?></h6>
                <h6>Email : <?= $row['email'] ?></h6>
                <h6>Password : <?= $row['password'] ?></h6>

            </div>
        </div>

    </div>

<?php }
include '../shared/footer.php';
include '../shared/script.php';
?>