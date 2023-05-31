<?php
require('../fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN SEMUA DATA MAHASISWA', 0, 10, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'No.', 1, 0);
$pdf->Cell(20, 6, 'NIM', 1, 0);
$pdf->Cell(50, 6, 'Nama Lengkap', 1, 0);
$pdf->Cell(100, 6, 'Alamat', 1, 0);
$pdf->Cell(50, 6, 'Email', 1, 0);
$pdf->Cell(30, 6, 'Telepon', 1, 1);
$pdf->SetFont('Arial', '', 10);
include '../connection.php';
$no = 1;
$result = mysqli_query($con, "SELECT * FROM mahasiswa");
while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 6, $no++, 1, 0);
    $pdf->Cell(20, 6, $data['nim'], 1, 0);
    $pdf->Cell(50, 6, $data['nama'], 1, 0);
    $pdf->Cell(100, 6, $data['alamat'], 1, 0);
    $pdf->Cell(50, 6, $data['email'], 1, 0);
    $pdf->Cell(30, 6, $data['telepon'], 1, 1);
}
$pdf->Output();
