<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM mahasiswa WHERE id=$id");
header("Location:../admin/?page=mahasiswa-show");
// echo "<meta http-equiv='refresh' content='0; url=../?page=mahasiswa-show'>";