<?php ob_start() ?>

<html
    <head>
        <title>Laporan Data Siswa</title>

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
                <td width="50" align="center"><h3>Laporan Data Siswa SMAN 1 Banjarmasin</h3><br><h5>Jl. Raya Banjarmasin KM. 1</h5></td>
                <td width="25" align="center"></td>
            </tr>
        </table>
    <hr>
    <h3 style="text-align: center">Laporan Data Siswa</h3>

    <table id="customers">
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Jenkel</th>
        <th>Kelas</th>
        <th>Alamat</th>
    </tr>
    <?php
        include "../pengaturan/koneksi.php";
        $query = "SELECT * FROM view_siswa";
        $data = mysqli_query($konek, $query);
        while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $d['nis']; ?></td>
        <td><?php echo $d['nama_siswa']; ?></td>
        <td><?php echo $d['tempat_lahir']; ?>, <?php echo date("d F Y", strtotime($d['tanggal_lahir'])) ?></td>
        <td><?php echo $d['jk']; ?></td>
        <td><?php echo $d['nama_kelas']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
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

