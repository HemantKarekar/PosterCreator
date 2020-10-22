<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name'];?></title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "includes/layouts/header.php";
    if (!isset($_SESSION["name"])) {
        echo "<script>location.href = 'auth.php'</script>";
    }
    ?>
    <div class="pagination">
        <div class="pag-wrap">
            <div class="item">
                <a class="link" href="index.php">Home</a>
                <span class="separator">></span>
                <span class="current">Profile</span>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>