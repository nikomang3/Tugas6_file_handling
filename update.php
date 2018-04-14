<?php

    $file = "data.txt";
    $all_data = file_get_contents($file);

    $file_edit = 'idedit.txt';
    $id_edit = file_get_contents($file_edit);

    $nama = $_POST['namaedit'];
    $email = $_POST['emailedit'];
    $phone = $_POST['phoneedit'];
    $alamat = $_POST['alamatedit'];

    $dataedit = $nama  . "|F|" . 
                $email . "|F|" .
                $phone . "|F|" .
                $alamat . "[R]";

    $row = explode("[R]", $all_data);
    $data_update = "";
    $databaru = "";
    
    for($i =0; $i < count($row) - 1; $i++) {
        $kolom = explode("|F|", $row[$i]);
        if ($kolom[0] == $id_edit){
            $data_update .= $id_edit . '|F|' . $dataedit;
            $databaru .= $data_update;
        }
        else {
            $databaru .= $row[$i] . "[R]";
        }
    }

    file_put_contents($file, $databaru);

    header('location:baca.php');