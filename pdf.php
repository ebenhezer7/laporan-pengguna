<?php
    require_once __DIR__ . './vendor/autoload.php';


    $mpdf = new \Mpdf\Mpdf();
    include ('./input-config.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM pengguna ");
    while ($row = mysqli_fetch_array($data)){
        $tabledata .="
            <tr>
            <td>".$row["id_user"]."</td>
            <td>".$row["user_name"]."</td>
            <td>".$row["alamat_user"]."</td>
            <td>".$row["umur_user"]."</td>
            <tr>
        ";
        $no++;
    }
    $waktu_cetak = date('d M Y - H:i:s');
    $table = "
        <h1>laporan data user</h1>
        <h6>waktu cetak : $waktu_cetak</h6>
        <table cellpadding=5 border=1 cellsapcing=0>
            <tr>
                <th>ID USER</th>
                <th>NAMA USER</th>
                <th>ALAMAT USER</th>
                <th>UMUR USER</th>
            </tr>
            $tabledata
        </table>
    ";
    $mpdf->WriteHTML("$table");
    $mpdf->Output();
?>