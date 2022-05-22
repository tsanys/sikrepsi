<?php

    require "../assets/fpdf184/fpdf.php";
    include "../pengaturan/koneksi.php";

    $pdf = new FPDF('P', 'cm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->setTitle('Laporan Data Kelas SMAN 1 Banjarmasin');

    $pdf->Image('../img/logo-big.png', 1, 1, 2, 2);

    $pdf->cell(19, 1, 'SMAN 1 Banjarmasin', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->cell(19, 1, 'Jl. Raya Banjarmasin KM. 1', 0, 1, 'C');
    $pdf->line(1, 3, 20, 3);
    $pdf->ln(2);
    $pdf->setFont('Arial', 'B', 10);
    $pdf->cell(19, 1, 'Laporan Data Kelas', 0, 1, 'C');
    $pdf->ln(1);
    $pdf->cell(3, 1, '', 0, 0, 'C');
    $pdf->setFillColor(255, 40, 20);
    $pdf->cell(3, 1, 'ID Kelas', 1, 0, 'C', 1);
    $pdf->cell(5, 1, 'Nama Kelas', 1, 0, 'C', 1);
    $pdf->cell(5, 1, 'Jumlah Siswa', 1, 1, 'C', 1);
    $pdf->setFont('Arial', '', 10);
    $query = "SELECT * FROM view_kelas";
    $data = mysqli_query($konek, $query);
    while($d = mysqli_fetch_array($data)){
        $pdf->cell(3, 1, '', 0, 0, 'C');
        $pdf->cell(3, 1, $d['id_kelas'], 1, 0, 'C');
        $pdf->cell(5, 1, $d['nama_kelas'], 1, 0, 'C');
        $pdf->cell(5, 1, $d['jumlah'], 1, 1, 'C');
    }
    $pdf->Output();
?>


