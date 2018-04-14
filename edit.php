<?php
    $file = "data.txt";
    $data = file_get_contents($file);

    $row_edit = $_GET['id'];
    $row = explode("[R]", $data);

    $id; $nama; $email; $phone; $alamat; 
    for($i = 0; $i < count($row) - 1; $i++) {
        $kolom = explode("|F|", $row[$i]);
        if($kolom[0] == $row_edit) {
            $id = $kolom[0];
            $nama = $kolom[1];
            $email = $kolom[2];
            $phone = $kolom[3];
            $alamat = $kolom[4];
        }
    }

    $file_edit = "idedit.txt";
    $handle_edit = fopen($file_edit, "w");
    fwrite($handle_edit, $id);
    fclose($handle_edit);

    echo '<!DOCTYPE html>';
    echo '<html>';
        echo '<head>
            <title>Form Input Buku Telepon</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <style>
                    #judul1{
                            text-align: center; 
                    }
                    #isi1{
                            background-color: lightgray;
                            padding: 10px;
                    }
            </style>
        </head>';
        echo'<body>';
            echo '<div class="container">'.
            '<div class="col-md-6 col-sm-6" id="isi1">'.
                    '<h3 id="judul1"> Update data dari '.$nama. ': </h3><br>'.
                    '<form action="update.php" method="POST">'.
                            '<label class="col-md-2 col-sm-3 col-xs-3" for="">Nama: </label>'.
                            '<input type="text" name="namaedit" value="' . $nama . '" ' . 'required><br>'.
                            '<label class="col-md-2 col-sm-3 col-xs-3" for="">Email: </label>'.
                            '<input type="email" name="emailedit" value="'. $email. '"' . '><br>'.
                            '<label class="col-md-2 col-sm-3 col-xs-3" for="">Telepon: </label>'.
                            '<input type="tel" name="phoneedit" value="'. $phone . '" ' . 'required><br>'.
                            '<label class="col-md-2 col-sm-3 col-xs-3" for="">Alamat: </label>'.
                            '<input type="text" name="alamatedit" value="'. $alamat . '"'. '><br><br>'.
                            '<input type="submit" class="btn btn-primary" value="Update">'.
                    '</form></div></div>';
        echo '</body>';
    echo '</html>';
    
?>
