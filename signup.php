<?php
session_start();

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include 'connection.php';

    // Periksa apakah username sudah digunakan
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Username sudah digunakan";
    } else {
        // Tambahkan user baru ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ss', $username, $hashedPassword);
        $stmt->execute();

        $_SESSION['username'] = $username;
        header('Location: admin/index.php');
        exit;
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
    <title>Signup</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header bg-transparent mb-0">
                        <h5 class="text-center">Signup <span class="font-weight-bold text-success">User</span></h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" name="signup" value="Signup" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>