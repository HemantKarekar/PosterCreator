<?php
$host = "localhost";
$username = "alogicda_alogicd";
$password ="pass@word1";
$dbname ="alogicda_postermaker";
$con = mysqli_connect($host,$username,$password,$dbname);

if($con){
    // echo "Success";
}
else{
    echo "Failed to Connect to Database";
}
?>