<?php
session_start();
?>
<div class="card">
    <div class="card-header">
        <strong>INFORMASI</strong>
    </div>
    <div class="card-body">
        <p>Selamat Datang <strong><i><?php echo $_SESSION['username']; ?></i></strong>,</p>
        <p>
            <strong>Materi ini mempelajari CRUD basic dengan <code>PHP + MYSQLi</code> </strong><br><br>
            Apa saja yang kita pelajari ?
        <ul>
            <li>Membuat tampilan menggunakan Bootstrap 4</li>
            <li>Pemroraman dasar <code>PHP</code></li>
            <li>Proses CRUD <code>create, read, update, delete</code></li>
            <li>Halaman dinamis dengan <code>Methode GET</code></li>
            <li>Login User dengan password <code>HASH</code></li>
            <li>Register User</li>
            <li>Fungsi simpan data</li>
            <li>Fungsi edit data </li>
            <li>Fungsi hapus data</li>
            <li>Fungsi cari data</li>
            <li>Fungsi pagination</li>
            <li>Fungsi cetak data dengan <code>FPDF</code></li>
        </ul>
        </p>
    </div>
</div>