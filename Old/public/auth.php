<?php if (isset($_SESSION["name"])) {
    session_unset();
    session_destroy();
    session_abort();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up/ Login</title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
</head>

<body>
    <main role="main" class="authenticate">
        <div class="auth">
            <div class="main-wrap">
                <div class="auth-container">
                    <div class="img-wrap">
                        <img src="assets/images/poster-maker1.png" alt="">
                    </div>
                    <div class="auth-wrap">
                        <div class="auth-heading">
                            <div class="heading-wrap">
                                <h1 class="heading">
                                    Welcome
                                </h1>
                            </div>
                        </div>
                        <div class="auth-interface">
                            <p class="instructions">
                                If you already have an existing account, click on login. If not click on Sign-up to
                                create an account.
                            </p>
                            <div class="auth-btns">
                                <div class="auth-login"><a href="#" id="loginBtn">Login</a></div>
                                <div class="hr-with-text-center">
                                    <hr>
                                    <span>OR</span>
                                </div>
                                <div class="auth-signup"><a href="#" id="signUpBtn">Sign Up</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="signup" id="signup">
            <div class="signup-wrap">
                <div class="signup-head"><i class="fas fa-times" id="close-modal1"></i></div>
                <form action="signup.php" method="get">
                    <div class="form-input">
                        <input type="text" name="name" placeholder="Your Name" />
                    </div>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="Your Email" />
                    </div>
                    <div class="form-input">
                        <input type="text" name="contact" placeholder="Contact Number" />
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" placeholder="Create Username" onkeydown="return isValid(event)"/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="createpass" placeholder="Create Password">
                    </div>

                    <div class="form-input"><input type="password" name="passreenter" placeholder="Re-enter Password"></div>

                    <div class="form-input submit">
                        <input type="submit" value="Sign Up">
                        <input type="reset" value="Clear">
                    </div>
                </form>
            </div>
        </div>
        <div class="login" id="login">
            <div class="login-wrap">
                <div class="login-head"><i class="fas fa-times" id="close-modal2"></i></div>
                <form action="login.php" method="get">
                    <div class="form-input">
                        <input type="text" name="usrname" placeholder="Username" />
                    </div>
                    <div class="form-input">
                        <input type="password" name="pass" placeholder="Password">
                    </div>
                    <div class="form-input submit">
                        <input type="submit" value="Log In">
                        <input type="reset" value="Clear">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include "includes/layouts/footer.php"; ?>
    <script src="assets/js/custom.js"></script>
</body>

</html>