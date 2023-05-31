<?php include "../connection.php" ?>
<?php
if (isset($_POST['registrasi'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    if ($pass !== $pass2) {
        echo '<script>alert("Password konfirmasi salah!");</script>';
        echo "<meta http-equiv='refresh' content='0 url=?page=user-add'>";
        return false;
    }
    $cekUsername = mysqli_query($con, "SELECT * FROM user WHERE username = '" . $username . "' ");
    if (mysqli_num_rows($cekUsername) >= 1) {
        echo '<script>alert("username tidak dapat digunakan");</script>';
        echo "<meta http-equiv='refresh' content='0 url=?page=user-add'>";
        return false;
    }
    // merubah karakter password enkripsi hash
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    // simpan user baru
    $exec = mysqli_query($con, "INSERT INTO user(username,password) VALUES('$username','$passHash')");
    if ($exec === true) {
        echo '<script>alert("User berhasil di tambahkan");</script>';
    } else {
        '<script>alert("User gagal di tambahkan");</script>';
    }
}
?>
<div class="card">
    <div class="card-header">
        <strong>Tambah Data User</strong>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password2" class="col-sm-3 col-form-label">Password Confirmation</label>
                <div class="col-sm-9">
                    <input type="password" name="password2" class="form-control" placeholder="Password Confirmation" required>
                </div>
            </div>
    </div>
    <div class="card-footer bg-transparent">
        <button type="submit" name="registrasi" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    </form>
</div>