<?php
if (isset($_POST['Submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,alamat,jenis_kelamin,email,telepon) VALUES('$nim','$nama','$alamat','$jk','$email','$telepon')") or die(mysqli_error($con));

    header("Location:?page=mahasiswa-show");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Mahasiswa</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=mahasiswa-add" class="form-horizontal">
                    <div class="form-group">
                        <label for="nim" class="control-label">NIM</label>
                        <input type="text" class="form-control" name="nim" placeholder="Masukan NIM..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="ontrol-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="control-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option disabled selected> Pilih </option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="control-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat..." required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukan email..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telepon" class="control-label">Telepon</label> <input type="number" class="form-control" name="telepon" placeholder="Masukan telepon..." required>
                        </div>
                    </div>
                    <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>