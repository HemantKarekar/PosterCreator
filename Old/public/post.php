<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = $_GET["n"];
    $ph = $_GET["dr"];
    $bg = $_GET["bg"];
    ?>
    <canvas id="main" width="1024" height="1280"></canvas>

    <script>
        var canvas = document.getElementById("main");
        var context = canvas.getContext("2d");

        var bg = new Image;
        var photo = new Image;
        var photo1 = new Image;
        bg.onload = function() {
            context.drawImage(bg, 0, 0);
            context.font = "50px Arial";
            context.fillText('<?php echo $name;  ?>', 50, 950);
            context.fillStyle = "black";
            
            //DOCTOR IMAGE
            photo.onload = function() {
                $x = 600;
                $y = 800;
                width = 200;
                height = photo.height * (width/photo.width)
                context.drawImage(photo, $x,$y,width,height);
            }
            photo.src = "assets/images/sender/"+"<?php echo $ph;?>";

            //BRAND LOGO
            photo1.onload = function() {
                width = 400;
                height = photo1.height * (400/photo1.width)
                context.drawImage(photo1, 30, 30,width,height);
            }
            photo1.src = "assets/images/sender/"+"<?php echo $ph;?>";
            
            console.log(nam);
        }

        bg.src = "assets/images/bg/"+"<?php echo $bg;?>";
    </script>
</body>

</html>