<?php

$file = "data.txt";

$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];

$data = $nama  . "|F|" . 
        $email . "|F|" .
        $phone . "|F|" .
        $alamat . "[R]";

$handle = fopen($file, "a+");
fwrite($handle, $data);
fclose($handle);

$isi_file = file_get_contents($file);
$row = explode("[R]", $isi_file);
$data_lengkap = "";

for($i =0; $i < count($row) - 1; $i++) {
        if(count($row)==2){
                $id = 1;
                $data_lengkap .= $id . '|F|' . $row[$i] . '[R]';
        }
        else if ($i == count($row) - 2){
                $kolom = explode("|F|", $row[$i-1]);
                $data_lengkap .= $kolom[0]+1 . '|F|' . $row[$i] . '[R]';
        }
        else{
                $data_lengkap .= $row[$i] . '[R]';
        }
}
file_put_contents($file, $data_lengkap);

header('location:baca.php');