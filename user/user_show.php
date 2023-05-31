<div class="card">
    <div class="card-header">
        <strong>Data User</strong>
    </div>
    <div class="card-body">
        <form action="?page=user-show" method="POST">
            <div class=" input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan Username..." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" value="Cari" id="button-search" name="search">Cari!</button>
                </div>
            </div>
        </form>
        <!-- <div class="col-md-12"> -->
        <a href="?page=user-add" class="btn btn-primary mb-2">Tambah Data</a>
        <!-- <a href="?page=mahasiswa-print" class="btn btn-success mb-2">Cetak Data</a> -->
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover m-0">
                <?php
                include '../connection.php';
                $limit = 5;
                $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $limit) - $limit : 0;
                $query = mysqli_query($con, "SELECT * FROM user LIMIT $mulai, $limit") or die(mysqli_error($con));
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search'])) {
                        $keyword = trim($_POST['keyword']);
                        if (!empty($keyword)) {
                            $query = mysqli_query($con, "SELECT * FROM user WHERE username LIKE '%" . $keyword . "%'");
                        }
                    }
                    $no = $mulai + 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="?page=user-edit&id=<?php echo $data['id']; ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="../user/user_delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        $result = mysqli_query($con, "SELECT * FROM user");
        $total_records = mysqli_num_rows($result);
        ?>
        <p>Jumlah Data : <?php echo $total_records; ?></p>
        <nav class="mb-5">
            <ul class="pagination justify-content-end">
                <?php
                $jumlah_page = ceil($total_records / $limit);
                $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
                if ($page == 1) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                } else {
                    $link_prev = ($page > 1) ? $page - 1 : 1;
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=1">First</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=' . $link_prev . '" arialabel="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                }
                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' active' : '';
                    echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=user-show&halaman=' . $i . '">' . $i .
                        '</a></li>';
                }
                if ($page == $jumlah_page) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                } else {
                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=' . $link_next . '" arialabel="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=user-show&halaman=' . $jumlah_page . '">Last</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>