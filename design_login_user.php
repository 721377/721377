<?php
if (isset($_GET['error'])) {
    $error[] = $_GET['error'];
}
if (isset($_GET['errorlog'])) {
    $errorlog[] = $_GET['errorlog'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/user_login.css">
    <title>login</title>
</head>


<body>
    <section>
        <div class="container">
            <div class="user login">
                <div class="img-box">
                    <img src="images/chop.jpeg" alt="" />
                </div>
                <div class="form-box">
                    <div class="top">
                        <p>
                            Not a member?
                            <span data-id="#ff0066">Register now</span>
                        </p>
                    </div>
                    <form action="" method="post">
                        <div class="form-control">
                            <h2>hello!</h2>
                            <p>Welcome back .</p>
                            <input type="email" placeholder="Enter Email " name="email" />
                            <div>
                                <input type="password" placeholder="Password" name="pass" />
                                <div class="icon form-icon">
                                    <!-- <img src="./images/eye.svg" alt="" /> -->
                                </div>
                            </div>
                            <span>Recovery Password</span>
                            <input type="Submit" name="log" value="Login" />
                        </div>
                        <div class="form-control">
                            <p>Or continue with</p>
                            <div class="icons">
                                <a type="button" name="sub" class="login-with-google-btn" href="<?php echo $client->createAuthUrl(); ?>">
                                    Sign in with Google </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Register -->
            <div class="user signup">
                <div class="form-box">
                    <div class="top">
                        <p>
                            Already a member?
                            <span data-id="#1a1aff">Login now</span>
                        </p>
                    </div>
                    <form action="" method="post">
                        <div class="form-control">
                            <h2>Welcom!</h2>
                            <p>It's good to have you.</p>
                            <input type="text" placeholder="Fullname" name="fullname" />
                            <input type="email" placeholder="Enter Email" name="email" />
                            <input type="text" placeholder="Enter Address" name="address" />
                            <input type="text" placeholder="Enter your phone number" name="phone" />
                            <div>
                                <input type="password" placeholder="Password" name="password" />
                                <div class="icon form-icon">
                                    <img src="./images/eye.svg" alt="" />
                                </div>
                            </div>
                            <div>
                                <input type="password" placeholder="Confirm Password" name="cpassword" />
                                <div class="icon form-icon">
                                    <img src="./images/eye.svg" alt="" />
                                </div>
                            </div>
                            <input type="Submit" name="submit" value="Register" />
                        </div>

                    </form>
                </div>
                <div class="img-box">
                    <img src="images/register.png" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- IndexJs -->
    <script src="login_user_js.js"></script>
</body>

</html>


</body>

</html>