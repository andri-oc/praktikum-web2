<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM matakuliah WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $kode = $data['kode'];
    $nama = $data['nama'];
    $sks = $data['sks'];
    $semester = $data['semester'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="panel-title">Ubah Data Matakuliah</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=matakuliah-update" class="form-horizontal">
                    <div class="form-group">
                        <label for="nim" class="col-sm-2 control-label">Kode</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Matakuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sks" class="col-sm-2 control-label">sks</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="sks" value="<?php echo $sks; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-sm-2 control-label">semester</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="semester" value="<?php echo $semester; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>