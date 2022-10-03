<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Empoyee</title>
    <!-- 1663944426 -->
    <link rel="stylesheet" href="..\CSS\bootstrap.min.css">
    <link rel="stylesheet" href="..\CSS\Css\bootstrap.min.css">
    <link rel="stylesheet" href="..\CSS\style.css">
    <link rel="stylesheet" href=".\CSS\bootstrap.min.css">
    <link rel="stylesheet" href=".\CSS\Css\bootstrap.min.css">
    <link rel="stylesheet" href=".\CSS\style.css">
    
    <link rel="stylesheet" href=".\ODC7\fontawsome\css\all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Company System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Sign in <span class="sr-only">(current)</span></a>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Lawyers
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../employees/lawyers.php">Create New</a>
                        <a class="dropdown-item" href="../employees/listlawyers.php">List All</a>
                        <a class="dropdown-item" href="../employees/showlawyers.php">Show All</a>
                    </div>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Department
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../listdepartment.php">List All</a>
                        <a class="dropdown-item" href="../createdepartment.php">Create New</a>
                    </div>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        admin
                    </a>
                    <div class="dropdown-menu">
                        
                        <a class="dropdown-item" href="../admin/create.php">Create admin</a>
                        <a class="dropdown-item" href="../admin/listadmin.php">List All</a>
                        <a class="dropdown-item" href="../admin/updateadmin.php">Show All</a>
                    </div>

                </li>



                    </ul>
                    <form action="">
                <button name="logout" class="btn btn-danger"> Logout </button>
            </form>
            </div>
</nav><h1 class="text-center">Add admin</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Admin Name </label>
        <input class="form-control" type="text" name="name" required>
    </div>
    <div class="form-group">
        <label for="">Admin Age </label>
        <input class="form-control" type="number" name="age" required>
    </div>
    <div class="form-group">
        <label for="">Admin address </label>
        <input class="form-control" type="text" name="address" required>
    </div>
    <div class="form-group">
        <label for="">Admin Phone </label>
        <input class="form-control" type="text" name="phone" required>
    </div>
    <div class="form-group">
        <label for="">Admin Email </label>
        <input class="form-control" type="text" name="email" required>
    </div>
    <div class="form-group">
        <label for="">Admin Password </label>
        <input class="form-control" type="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="">Admin Profile Photo</label>
        <input class="form-control" type="file" name="tmp_name">
    </div>

    <div class="form-group">
        <label for="role">Admin Role </label>
        <select name="role" id="" class="form-control">
            <option value="0">All Access</option>
            <option value="1">Semi Access</option>
        </select>
    </div>
    <button name="insert" class="btn btn-info"> Add Admin </button>

</form>
<br />
<b>Warning</b>:  include(./shared/footer.php): failed to open stream: No such file or directory in <b>C:\xampp\htdocs\ODC7\admin\create.php</b> on line <b>81</b><br />
<br />
<b>Warning</b>:  include(): Failed opening './shared/footer.php' for inclusion (include_path='C:\xampp\php\PEAR') in <b>C:\xampp\htdocs\ODC7\admin\create.php</b> on line <b>81</b><br />
