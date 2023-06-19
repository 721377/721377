<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div class="login_main" style="margin-top:1%;">

        <form action="user_register_code.php" method="POST" enctype="multipart/form-data">
            <h1>Register Now!</h1>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>


            <input type="text" name="first_name" placeholder="first name ">
            <input type="text" name="last_name" placeholder="last name ">
            <input type="email" placeholder="Enter Email Address... " name="email">
            <input type="text" placeholder="Enter Email Address... " name="address">
            <input type="text" placeholder="Enter Email Phone... " name="phone">


            <div class="pss">
                <input class="password_register" type="password" placeholder="Password" name="password">
                <input class="password_register" type="password" placeholder="Repeat Password" name="cpassword">
            </div>


            <input type="submit" name="submit" value="register now">

            <div class="line"></div>


            <div class="links">
                <a href="">Forgot Password?</a>
                <a href="login.php">Already have an account? Login!</a>
            </div>

        </form>




    </div>

</body>

</html>