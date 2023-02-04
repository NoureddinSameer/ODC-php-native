<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';


checklink();
if ($_SESSION['admin']['role'] != "1") {
  path('404.php');
}
// Delete
if (isset($_GET['removeId'])) {
  $id = $_GET['removeId'];
  $selectOne = "SELECT * FROM lawyers where id =$id";
  $ss = mysqli_query($connection, $selectOne);
  $row = mysqli_fetch_assoc($ss);
  $image =   $row['image'];

  unlink("$image");
  $delete = "DELETE FROM lawyers WHERE id =$id ";
  mysqli_query($connection, $delete);
  path('lawyer/listlawyer.php');
}
?>
<h1 class="text-center"> list of Partners</h1>
<table class="table table-dark">

  <?php
  $readAll = "SELECT * FROM `lawyers`";
  $iC = mysqli_query($connection, $readAll); ?>
  <table class="table table-dark">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Partner Age</th>
      <th scope="col">Partner Address</th>
      <th scope="col">Partner Comments</th>
      <th scope="col">Partner Phone</th>
      <th scope="col">Partner Email</th>
      <th scope="col">Partner Picture</th>
      <th scope="col">Action</th>
      <!-- <th scope="col">Lawyer Image</th> -->
      <!-- <th scope="col">Action</th> -->
    </tr>
    <?php
    foreach ($iC as $i) { ?>
      <tr>
      
      <th scope="col"><?= $i['id'] ?></th>
      <th scope="col"><?= $i['firstname'].' '.$i['secondname'] ?></th>
      <th scope="col"><?= $i['age'] ?></th>
      <th scope="col"><?= $i['address'] ?></th>
      
      <th scope="col"><?= $i['comments'] ?></th>
      <th scope="col"><?= $i['phone'] ?></th>
      <th scope="col"><?= $i['email'] ?></th>
      
      <th scope="col">
        
      
        <image src="<?=  '../upload/'.$i['image'] ?>" style="height:90px;width:90px" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="https://scontent.fcai19-7.fna.fbcdn.net/v/t39.30808-1/307965251_110457838485709_2986188179606266249_n.jpg?stp=c0.0.40.40a_cp0_dst-jpg_p40x40&amp;_nc_cat=107&amp;ccb=1-7&amp;_nc_sid=7206a8&amp;_nc_ohc=DCVFjAECpuQAX908lJ0&amp;_nc_ht=scontent.fcai19-7.fna&amp;oh=00_AT-AY8BhnWXld9mtBr1RJR36vY8ft3Gdt2ekmJE1_V0H4Q&amp;oe=633394D0"></image>
      </th>
    <td>
      <button class="btn btn-primary "><a href="updatelawyer.php?updateId=<?= $i['id'] ?>" class="text-light btn-a"><i class="fa-solid fa-pen-to-square"></i></a></button>
      <div><br></div>
      <button class="btn btn-danger "><a href="listlawyer.php?removeId=<?= $i['id'] ?>" class="text-light btn-a"><i class="fa-solid fa-trash-can"></i></a></button>      
    </td>
      </tr>

    <?php  } ?>
  </table>
  <?php
include '../shared/footer.php';
include '../shared/script.php';
?>