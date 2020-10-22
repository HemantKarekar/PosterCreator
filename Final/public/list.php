<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates List</title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "includes/layouts/header.php";?>
    <main role="main" class="templates">
        <div class="pagination">
            <div class="pag-wrap">
                <div class="item">
                    <a class="link" href="index.php">Home</a>
                    <span class="separator">></span>
                    <span class="current">Templates</span>
                </div>
            </div>
            <hr>
        </div>
        <div class="section-heading">
            <h1 class="heading">Choose From our Templates</h1>
            <hr class="divider">
        </div>
        <div class="container templates-grid">
            <div class="row">
                <?php
                $dir = "assets/images/templates/edit";
                $titles = array(
                    "Depression & Hypertension",
                    "Depression & Diabetes",
                    "Depression & Suicide",
                    "MDD (Major Depressive Disorder)",
                    "Depression & Anxiety",
                );
                $files = scandir($dir);
                for ($j = 2; $j < sizeof($files); $j++) {
                    echo "<div class='col-3 template'>" .
                        "<a href='editor.php?template=" . $files[$j] . "'>"
                        . "<img src='" . $dir . "/" . $files[$j] . "'></a>"
                        . "<p>" . $titles[$j-2]."</p>"
                        . "</div>";
                }
                ?>
            </div>
        </div>
    </main>
    <?php include "includes/layouts/footer.php"; ?>

</body>