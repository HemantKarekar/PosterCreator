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
        error_reporting(0);
        $name = $_GET["name"];
        $email = $_GET["email"];
        $contact = $_GET["contact"];
        $uname = $_GET["username"];
        $pass = $_GET["passreenter"];
        $result = $con->query("SELECT * FROM users");
        $isUnique=true;
        while ($row = $result->fetch_assoc()) {
            if ($uname == $row['username']) {
                $isUnique=false;
            break;
            }
        }
        if ($isUnique){
            $query = "INSERT INTO users(name, email, contact_no, username, password) VALUES('$name','$email','$contact','$uname','$pass')";
            $con->query($query) or die(mysqli_error($con));
            echo "<script>alert('You have Successfully Registered Yourself. Please Log In Now!!!');</script>"; 
        } else{
            echo "<script>alert('Username Already exists. Please Sign Up Again using different Name!!!');</script>";
        }
        
        echo "<script>location.href='auth.php';</script>";

        ?>
    </main>
</body>

</html>