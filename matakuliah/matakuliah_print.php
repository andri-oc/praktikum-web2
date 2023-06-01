<?php
require('../fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN SEMUA DATA MATAKULIAH', 0, 10, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'No.', 1, 0);
$pdf->Cell(20, 6, 'Kode', 1, 0);
$pdf->Cell(50, 6, 'Nama Matakuliah', 1, 0);
$pdf->Cell(100, 6, 'Sks', 1, 0);
$pdf->Cell(30, 6, 'Semester', 1, 1);
$pdf->SetFont('Arial', '', 10);
include '../connection.php';
$no = 1;
$result = mysqli_query($con, "SELECT * FROM matakuliah");
while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 6, $no++, 1, 0);
    $pdf->Cell(20, 6, $data['kode'], 1, 0);
    $pdf->Cell(50, 6, $data['nama'], 1, 0);
    $pdf->Cell(100, 6, $data['sks'], 1, 0);
    $pdf->Cell(30, 6, $data['semester'], 1, 1);
}
$pdf->Output();
