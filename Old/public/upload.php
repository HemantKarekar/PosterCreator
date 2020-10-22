<?php
$sender_dir = "assets/images/sender/";
$bg_dir = "assets/images/bg/";
$brands_dir = "assets/images/brands/";
$bg = $_FILES["posterBg"];
$doctorImg = $_FILES["doctorImg"];
$companyBrand = $_FILES["companyBrand"];
$sender_path = $sender_dir . basename($doctorImg["name"]);
$bg_path = $bg_dir . basename($bg["name"]);
$brand_path = $brands_dir . basename($companyBrand["name"]);
echo $target_file;



function imgUpload($file_name,$file_path)
{
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submitbtn"])) {
    $check = getimagesize($file_name["tmp_name"]);
    if ($check !== false) {
      echo "<br>File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "<br>File is not an image.";
      $uploadOk = 0;
    }

    /* 
    list($width, $height, $type, $attr) = getimagesize($bg["tmp_name"]);
    if($width> 200 || $height > 200){
      $uploadOk =0;
      echo "<br>File size should be 200px X 200px";}
    */
  }

  // Check if file already exists
  if (file_exists($file_path)) {
    echo "<br>Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  /*if ($bg["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;}*/

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($file_name["tmp_name"], $file_path)) {
      echo "<br>The file " . basename($file_name["name"]) . " has been uploaded.";
    } else {
      echo "<br>Sorry, there was an error uploading your file.";
    }
  }
}
imgUpload($doctorImg,$sender_path);
imgUpload($bg,$bg_path);
imgUpload($companyBrand,$brand_path);
header("Location:post.php?n=" . $_POST['doctorName'] 
. "&dr=" . basename($doctorImg["name"])
. "&bg=" . basename($bg["name"])
. "&brand=" . basename($companyBrand["name"]));