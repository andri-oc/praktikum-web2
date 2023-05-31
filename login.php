<?php
// Sertakan file koneksi ke database
require_once 'connection.php';

// Jalankan session
session_start();

// Cek apakah pengguna sudah login dan arahkan ke halaman admin jika iya
if (isset($_SESSION['username'])) {
    header('Location:admin/index.php');
    exit;
}

// Set variabel pesan kesalahan
$error = '';

// Cek apakah form login telah disubmit
if (isset($_POST['login'])) {
    // Ambil data input dari form dan bersihkan datanya
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username)) {
        $error = 'Username tidak boleh kosong';
    } elseif (empty($password)) {
        $error = 'Password tidak boleh kosong';
    } else {
        // Query untuk mendapatkan data user berdasarkan username
        $stmt = $con->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Verifikasi password yang dimasukkan dengan hash password yang tersimpan di database
        if ($row && password_verify($password, $row['password'])) {
            // Tetapkan variabel $_SESSION dengan username user yang berhasil login
            $_SESSION['username'] = $row['username'];
            // Alihkan ke halaman admin
            header('Location:admin/index.php');
            exit;
        } else {
            // Tampilkan pesan kesalahan jika username tidak ditemukan atau password yang dimasukkan salah
            $error = 'Username atau password salah';
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-6">

                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Login gagal:</strong> <?= $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="card shadow shadow-3p-4">
                    <div class="card-header bg-transparent mb-0">
                        <h5 class="text-center">Login <span class="font-weight-bold text-primary">User</span></h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
