<?php
if (!isset($_SESSION)) {
    session_start();
}
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'command') or die('Connection fail!');
mysqli_set_charset($conn, "utf8");

//Upload file
// if (isset($_POST['createFile'])) {
//     $filename = $_POST['filename'];

//     if (empty($filename)) {
//         echo 'Filename not invalid!';
//     } else {
//         $sql = "SELECT * FROM `file` WHERE filename = '$filename'";

//         // Thực thi câu truy vấn
//         $result = mysqli_query($conn, $sql);

//         if (mysqli_num_rows($result) > 0) {
//             echo '<script language="javascript">alert("Filename has existed!"); window.location="index.php";</script>';
//             // Dừng chương trình
//             die();
//         } else {
//             $sql = "INSERT INTO `file`(`filename`) VALUES ('$filename')";
//             mysqli_query($conn, $sql);
//             echo '<script> window.location="index.php";</script>';
//             die();
//         }
//     }
// }

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
