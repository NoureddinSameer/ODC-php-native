<?php

$connection=mysqli_connect("localhost","root","","lawoffice");
if (!$connection) {
    die("ERROR: 
    You have a problem communicating with the database" . mysqli_connect_error());
}