<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $passwordLama1 = $_POST['password_lama1'];
    $passwordLama2 = $_POST['password_lama2'];
    $passwordBaru = $_POST['password_baru'];
    if (!password_verify($passwordLama2, $passwordLama1)) {
        echo '<script>alert("Password lama yang anda masukan salah");</script>';
        echo '<meta http-equiv="refresh" content="0; url=?page=user-edit&id=' . $id . '">';
        return false;
    }
    // echo '<script>alert("simpan");</script>';
    // update user data
    $passHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
    $result = mysqli_query($con, "UPDATE user SET id='$id',username='$username',password='$passHash' WHERE id=$id");
    // Redirect to homepage to display updated user in list
    echo '<meta http-equiv="refresh" content="0; url=?page=user-show">';
}
