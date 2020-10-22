<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']; ?></title>
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
                <a class="link" href="profile.php"><?php echo $_SESSION['name']; ?></a>
                <span class="separator">></span>
                <span class="current">Reset Password</span>
            </div>
        </div>
        <hr>
    </div>
    <div class="widget">
        <div class="wrap">
            <div class="card">
                <div class="card-body">
                    <div class="lock-fa-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="title-block">
                        <h3 class="title">Trouble Logging In?</h3>
                    </div>
                    <div class="msg-block">
                        <div class="msg">Enter you email, phone or username and we'll send you a link to get back into your account</div>
                    </div>
                    <div class="form">
                        <form action="" method="post">
                            <input type="text">
                            <input type="submit" value="Send Login Link">
                        </form>
                    </div>
                    <div class="separator">
                        <hr>
                        <p class="text">OR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>