<?php session_start() ?>
<?php require 'handle.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="styles.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 100px auto;
        }

        th,
        td {
            width: 18%;
            height: 50px;
            vertical-align: center;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT * FROM `file` WHERE 1";
    $result = mysqli_query($conn, $sql);
    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php if (isset($_GET['filename'])) {
        $filename = $_GET['filename'];

        $sql = "DELETE FROM `file` WHERE filename='$filename'";
        mysqli_query($conn, $sql);
        echo 'Delete Successfully!';
        echo '<script>window.location="index.php";</script>';
        die();
    } ?>

    <h4>Filename</h4>
    <?php $i = 1;
    foreach ($files as $file) : ?>
        <div style="margin-left: 5%; ">
            <label><?php echo $i++ . '-' ?></label>
            <label><?php echo $file['filename']; ?></label>
            <a href="index.php?filename=<?php echo $file['filename'] ?>">Delete</a>
        </div>
    <?php endforeach; ?>

    <!-- Upload -->
    <div style="margin-left: 40%; margin-top: 50px;">
        <!-- <form action="index.php" class="form" method="POST">
            <h2 class="form-heading">Create File</h2>
            <label>Filename</label>
            <input type="text" name="filename">
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="createFile" value="Create" style="width: 100px;" />
            <?php require 'handle.php'; ?>
        </form> -->
        <form action="index.php" class="form" method="POST" enctype="multipart/form-data">
            <h2 class="form-heading">Upload File</h2>
            <div class="form-group">
                <label for="InputFile">File input</label>
                <input type="file" name="file" id="InputFile">
            </div>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="upload" value="Upload" style="width: 100px;" />
        </form>
    </div>

</body>

</html>