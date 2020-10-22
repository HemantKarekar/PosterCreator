<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["name"]; ?>'s Dashboard</title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("includes/layouts/header.php");
    if (!isset($_SESSION["name"])) {
        echo "<script>location.href = 'auth.php'</script>";
    }
    ?>
    <main role="main" class="admin">
        <div class="pagination">
            <div class="pag-wrap">
                <div class="item">
                    <a class="link" href="index.php">Home</a>
                    <span class="separator">></span>
                    <span class="current">Dashboard</span>
                </div>
            </div>
            <hr>
        </div>
        <div class="panel">
            <div class="section-heading">
                <h1 class="heading">
                    Welcome,
                    <span>
                        <?php echo $_SESSION["name"]; ?>
                    </span>
                </h1>
            </div>
            
            <div class="users-grid">
                <div class="table">
                    <div class='row'>
                        <div class='cell'>Name</div>
                        <div class='cell'>Email</div>
                        <div class='cell'>Contact Number</div>
                        <div class='cell'>Username</div>
                        <div class='cell'>Password</div>
                    </div>
                    <?php include "includes/db.php";
                    $result = $con->query("SELECT * FROM users");
                    $f = 0b00;
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='row'>";
                        echo "<div class='cell'>" . $row["name"] . "</div>";
                        echo "<div class='cell'>" . $row["email"] . "</div>";
                        echo "<div class='cell'>" . $row["contact"] . "</div>";
                        echo "<div class='cell'>" . $row["username"] . "</div>";
                        echo "<div class='cell'>" . $row["password"] . "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/layouts/footer.php"); ?>
</body>

</html>