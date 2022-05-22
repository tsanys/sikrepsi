<?php ob_start() ?>

<html
    <head>
        <title>Laporan Data Guru</title>

        <style>
            h3{
                text-align: center;
                text-transform: uppercase;
            }
            #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }
            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers tr:hover {background-color: #ddd;}
            #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(36, 36, 36);
            color: white;
            }
            </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td width="25" align="center"><img src="http://localhost/sikrepsi893/img/logo-big.png" width="60%"></td>
                <td width="50" align="center"><h3>Laporan Data Guru SMAN 1 Banjarmasin</h3><br><h5>Jl. Raya Banjarmasin KM. 1</h5></td>
                <td width="25" align="center"></td>
            </tr>
        </table>
    <hr>
    <h3 style="text-align: center">Laporan Data Guru</h3>

    <table id="customers">
    <tr>
        <th>Nama</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>NIP</th>
        <th>Alamat</th>
        <th>No Telepon</th>
    </tr>
    <?php
        include "../pengaturan/koneksi.php";
        $query = "SELECT * FROM tb_guru893";
        $data = mysqli_query($konek, $query);
        while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?= $d['nama_lengkap']; ?></td>
        <td><?= $d['tempat_lahir']; ?>, <?= date("d F Y", strtotime($d['tanggal_lahir'])) ?></td>
        <td><?= $d['nip']; ?></td>
        <td><?= $d['alamat']; ?></td>
        <td><?= $d['no_telepon']; ?></td>
    </tr>
    <?php
        }
    ?>
    </table>
    </body>
</html>

<?php
    $html = ob_get_contents();
    ob_end_clean();

    require_once('../assets/dompdf/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    use Dompdf\Options;
    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new DOMPDF($options);
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_data_siswa.pdf', array('Attachment' => 0));
?>

