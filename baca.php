<!DOCTYPE html>
<html lang="en">
<head>
  <title>Buku Telepon</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  </style>
</head>
    <body>
        <div class="container">
            <h2>Daftar Buku Telepon</h2>
            <table class="table table-bordered">
<?php

$file = "data.txt";
$data = file_get_contents($file);

$baris = explode("[R]", $data);

echo "<tr>";
echo "  <td>ID</td>";
echo "  <td>NAMA</td><td>EMAIL</td>";
echo "  <td>PHONE</td><td>ALAMAT</td><td>EDIT</td><td>DELETE</td>";
echo "</tr>";
for($i =0; $i<count($baris)-1; $i++) {
    //echo $b . "<br>";

    $col = explode("|F|", $baris[$i]);

    echo "<tr>";
    echo "  <td>" . "BT" . $col[0] . "</td>";
    echo "  <td>" . $col[1] . "</td>";
    echo "  <td>" . $col[2] . "</td>";
    echo "  <td>" . $col[3] . "</td>";
    echo "  <td>" . $col[4] . "</td>";
    echo '  <td> <a href="edit.php?id='.$col[0].'">Edit</a> </td>'; 
    echo '  <td> <a href="delete.php?row='.$i.'">Delete</a> </td>'; 
    echo "</tr>";
}

?>
        </table>
    </div>
</body>
</html>