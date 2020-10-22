<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home<?php echo " - " . $_SESSION["name"];?></title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php if (!isset($_SESSION["name"])) {
        echo "<script>location.href = 'auth.php'</script>";
    }
    include "includes/layouts/header.php"; ?>
    <main role="main" class="main">
        <section>
            <h1 class="section-heading">
                Welcome, 
                <span>
                <?php
                    echo $_SESSION["name"];?>
                </span>
            </h1>
            <div class="section-body">
                <div class="cat-wrap">
                    <div class="cats">
                        <div class="cat">
                            <a href="list.php" class="couple">
                                <div class="cat-icon"><i class="far fa-file"></i></div>
                                <h1 class="cat-heading">Choose</h1>
                            </a>
                        </div>
                        <div class="cat">
                            <a href="editor.php" class="couple">
                                <div class="cat-icon"><i class="fas fa-pencil-alt"></i></div>
                                <h1 class="cat-heading">Create</h1>
                            </a>
                        </div>
                    </div>
                    <div class="cat-desc">
                        <div class="desc">Choose from our Templates OR Create Custom Design</div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php include "includes/layouts/footer.php"; ?>
</body>

</html>