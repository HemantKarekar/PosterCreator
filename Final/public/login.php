<?php
$name = $_GET["usrname"];
$pass = $_GET["pass"];
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <main role="main">
        <?php include "includes/db.php";
        $result = $con->query("SELECT * FROM users");
        $f = 0b00;
        while ($row = $result->fetch_assoc()) {
            if ($name == $row['username'] && $pass == $row['password']) {
                $f = 0b11;
                echo $row['username'].$row['password'];
                $_SESSION["username"] = $name;
                $_SESSION["name"] = $row['name'];
                $target;
                if($name == "Admin"){
                    $target = "admin.php";
                }
                else{
                    $target = "index.php";
                }
                echo "<script>location.href='".$target."';</script>";
            } 
            else {
                echo "Login Failed".$name.$pass;
            }
        }
        ?>
    </main>
</body>

</html>