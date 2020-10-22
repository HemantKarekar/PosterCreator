<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/fabric.min.js"></script>
    <title>Studio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/layouts.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "includes/layouts/header.php" ?>
    <main role="main" class="editor">
        <div class="pagination">
            <div class="pag-wrap">
                <div class="item">
                    <a class="link" href="index.php">Home</a>
                    <span class="separator">></span>
                    <span class="current">Editor</span>
                </div>
            </div>
            <hr>
        </div>

        <div class="container editor-wrap py-3">
            <div class="row">
                <div class="col-12">
                    <div class="controller">
                        <div class="heading">
                            <h1>Enter Your Details</h1>
                        </div>
                        <form class="control-form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-wrap row">
                                <div class="col-sm">
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
                                <div class="form-group p-3 col-sm">
                                    <div class="form-control">
                                        <label class="title" for="addText">Add Details:</label>
                                        <!--<div class="guides">
                                            <small>
                                                <b>Guides:</b>
                                                <br>Double Click the Text Element to Edit Text
                                                <br>Select the Text Element First When Editing Text
                                            </small>
                                        </div>-->
                                    </div>
                                    <div class="form-control">
                                        <input type="text" maxlength="25" name="postHeading" id="drName" placeholder="Name:">
                                    </div>
                                    <div class="form-control">
                                        <input type="text" maxlength="25" name="postHeading" id="clinicName" placeholder="Clinic Name:">
                                    </div>
                                    <div class="form-control">
                                        <input type="text" maxlength="15" name="postHeading" id="addPlace" placeholder="Place:">
                                    </div>
                                    <div class="form-control">
                                        <input type="text" maxlength="10" name="postHeading" id="addPhno" placeholder="Mob: ">
                                    </div>
                                    <div class="form-control">
                                        <div id="fontEditor" style="padding: 20px;">
                                            <label class="title" for="addText">Select Color:</label>
                                            <div class="ed">
                                                <input type="color" name="textColor" id="fontColor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container templates-grid">
                    <div class="title">
                        <h1 class="p-3" style="text-align: center;">Choose From Our Templates</h1>
                    </div>
                    <hr>
                    <div class="row">
                        <div class='col-lg-2 col-sm-6 template'>
                            <a href="#editD"><img src="assets\images\templates\edit\temp1.jpg" alt="" id="template1"></a>
                            <p>Depression & Anxiety</p>
                        </div>
                        <div class='col-lg-2 col-sm-6 template'>
                            <a href="#editD"><img src="assets\images\templates\edit\temp2.jpg" alt="" id="template2"></a>
                            <p>Depression & Diabetes</p>
                        </div>
                        <div class='col-lg-2 col-sm-6 template'>
                            <a href="#editD"><img src="assets\images\templates\edit\temp3.jpg" alt="" id="template3"></a>
                            <p>Depression & Hypertension</p>
                        </div>
                        <div class='col-lg-2 col-sm-6 template'>
                            <a href="#editD"><img src="assets\images\templates\edit\temp4.jpg" alt="" id="template4"></a>
                            <p>MDD (Major Depressive Disorder)</p>
                        </div>
                        <div class='col-lg-2 col-sm-6 template'>
                            <a href="#editD"><img src="assets\images\templates\edit\temp5.jpg" alt="" id="template5"></a>
                            <p>Depression & Suicide</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                    <div class="view" id="editD">
                        <div class="title">
                            <h1 class="pt-3">Download Your Poster Now</h1>
                        </div>
                        <div class="btn-wrap">
                            <a id="downloadCanvas" class="download" href="#">Download</a>
                        </div>
                        <canvas id="preview" width="792" height="1008"></canvas>
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