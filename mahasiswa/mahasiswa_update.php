<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    // update user data
    $result = mysqli_query($con, "UPDATE mahasiswa SET nim='$nim',nama='$nama',alamat='$alamat',jenis_kelamin='$jk',email='$email',telepon='$telepon' WHERE id=$id");
    // Redirect to homepage to display updated user in list
    header("Location:?page=mahasiswa-show");
}
