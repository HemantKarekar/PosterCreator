<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/fabric.min.js"></script>
    <title><?php echo $_SESSION['name']; ?>'s Studio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/layouts.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "includes/layouts/header.php";
    /* if (!isset($_SESSION["name"])) {
        echo "<script>location.href = 'auth.php'</script>";
    } */
    ?>
    <main role="main" class="editor">
        <div class="pagination">
            <div class="pag-wrap">
                <div class="item">
                    <a class="link" href="index.php">Home</a>
                    <span class="separator">></span>
                    <a class="link" href="list.php">Templates</a>
                    <span class="separator">></span>
                    <span class="current">Editor</span>
                </div>
            </div>
            <hr>
        </div>

        <div class="container editor-wrap py-3">
            <div class="row">
                <div class="col-5">
                    <div class="controller">
                        <div class="heading">
                            <h1>Customize Your Poster</h1>
                        </div>
                        <form class="control-form" action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-wrap">
                                <!-- <div class="form-group p-3">
                                    <div class="form-control">
                                        <label class="title">Choose Canvas Size (Height x Width):</label>
                                        <div class="control-group">
                                            <input type="checkbox" name="asprat" id="isRatioMaintained" checked> <label for="isRatioMaintained">Maintain Aspect Ratio</label>
                                            <div class="size-group">
                                                <div class="resize-control">
                                                    <input type="number" name="height" id="custH" placeholder="Height">x
                                                    <input type="number" name="width" id="custW" placeholder="Width" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->
                                <div>
                                    <div class="form-group p-3" id="createBg">
                                        <div class="form-control">
                                            <label class="title" for="posterBg">Insert Background Image:</label>
                                        </div>
                                        <div class="form-control">
                                            <input type="file" name="posterBg" id="posterBg" accept="images/*">
                                        </div>
                                    </div>
                                    <div class="form-group p-3" id="doctorImg">
                                        <div class="form-control">
                                            <label class="title" for="companyBrand">Insert Doctor Image:</label>
                                        </div>
                                        <div class="form-control">
                                            <input type="file" name="companyBrand" id="companyBrand" accept="images/*">
                                        </div>
                                        <small>
                                            <b>Guides:</b>
                                            <br>Select the Image to Resize
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group p-3">
                                    <div class="form-control">
                                        <label class="title" for="addText">Add Doctor Name:</label>
                                        <div class="guides">
                                            <small>
                                                <b>Guides:</b>
                                                <br>Double Click the Text Element to Edit Text
                                                <br>Select the Text Element First When Editing Text
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <textarea name="postHeading" id="addText" rows="1" cols="50"></textarea>
                                    </div>
                                    <div class="form-control">
                                        <select name="" id="align">
                                            <option value="left" selected><i class="fas fa-align-left"></i>Left</option>
                                            <option value="center"><i class="fas fa-align-center"></i>Center</option>
                                            <option value="right"><i class="fas fa-align-right"></i>Right</option>
                                        </select>
                                    </div>
                                    <div class="form-control">
                                        <div id="fontEditor" style="padding: 20px;">
                                            <div class="ed">
                                                <input type="text" name="product" id="fontSize" value="106" size=3 />
                                                <select name="" id="fontFace">
                                                    <option value="Montserrat" data-value="Montserrat">Montserrat</option>
                                                    <option value="Arial" data-value="Arial">Arial</option>
                                                    <option value="Open Sans" data-value="Open Sans">Open Sans</option>
                                                    <option value="Orbitron" data-value="Orbitron">Orbitron</option>
                                                    <option value="Poppins" data-value="Poppins">Poppins</option>
                                                    <option value="Calibri" data-value="Calibri">Calibri</option>
                                                    <option value="Times New Roman" selected data-value="Times New Roman">Times New Roman</option>
                                                </select>
                                            </div>
                                            <div class="ed">
                                                <input type="color" name="textColor" id="fontColor">
                                                <input type="button" value="B" id="bold"></input>
                                                <input type="button" value="U" id="underline"></i></input type="button">
                                                <input type="button" value="I" id="italic"></input type="button">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="btn-wrap">
                            <a id="downloadCanvas" class="download" href="#">Download</a>
                        </div>
                    </div>

                </div>
                <div class="col-7">
                    <div class="view">

                        <canvas id="preview" width="792" height="1008" style="width:600px;height:600px;"></canvas>
                        <!-- <canvas id="download" width="792" height="1008" style="width:600px;height:600px;"></canvas> -->

                    </div>
                </div>
            </div>


        </div>
    </main>
    <?php include "includes/layouts/footer.php"; ?>
    <script src="assets/js/canvas.js"></script>
    <script>
        var bgPanel = document.getElementById("createBg");
        var drImg = document.getElementById("doctorImg");

        var str = window.location.href.split("?")[1];
        if (str == '' || str === undefined) {
            bgPanel.style.display = "block";
        } else {
            bgPanel.style.display = "none";
        }
    </script>
</body>

</html>