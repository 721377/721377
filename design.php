<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>login</title>
</head>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");


  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  :root {
    /* Colors */
    --pink: #ff0066;
    --lightpink: #ffcce0;
    --blue: #f6a000;
    --lightblue: #fcac176c;
    --color: #4d4d4d;
    --custom: #f6a000;
  }

  body {
    color: #4d4d4d;
  }

  .img-box img {
    width: 100%;
    height: 100%;
  }


  section {
    position: relative;
    min-height: 100vh;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.5;
  }



  section .container {
    position: relative;
    width: 900px;
    height: 550px;
    background-color: white;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    overflow: hidden;
  }

  section .user {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
  }

  section .img-box {
    position: relative;
    width: 50%;
    height: 100%;
    transition: all 500ms ease-in-out;
  }

  section .img-box img {
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
  }

  section .form-box {
    position: relative;
    width: 50%;
    height: 100%;
    background-color: white;
    transition: 500ms ease-in-out;
  }

  section .form-box .top {
    position: absolute;
    top: 14px;
    right: 14px;
  }

  section .form-box .top p {
    font-size: 13px;
  }

  section .form-box .top span {
    color: var(--custom);
    cursor: pointer;
  }

  section form {
    position: absolute;
    top: 55%;
    left: 50%;
    width: 100%;
    max-width: 300px;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  section form .form-control:first-child {
    text-align: center;
  }

  section form .form-control:first-child input {
    font-family: "Poppins", sans-serif;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 10px 0;
    margin-bottom: 10px;
    text-indent: 16px;
    width: 100%;
    color: var(--color);
    outline: none;
  }

  section form .form-control:first-child input[type="submit"] {
    display: block;
    text-align: center;
    width: 100%;
    border: none;
    outline: none;
    cursor: pointer;
    background-color: var(--custom);
    color: white;
    transition: 0.5s;
  }

  section form .form-control:first-child input[type="submit"]:hover {
    background-color: var(--lightblue);
  }

  section form .form-control:first-child h2 {
    width: 100%;
    font-weight: 400;
    font-size: 26px;
  }

  section form .form-control:first-child p {
    font-size: 15px;
    margin-bottom: 20px;
  }

  section form .form-control:first-child span {
    font-size: 13px;
    display: block;
    text-align: right;
    margin-bottom: 20px;
  }

  section form .form-control:first-child div {
    position: relative;
  }

  section form .form-control:first-child .icon {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 1rem;
    cursor: pointer;
  }

  section form .form-control:last-child {
    text-align: center;
  }

  section form .form-control:last-child p {
    position: relative;
    display: inline-block;
    font-size: 14px;
  }

  section form .form-control:last-child p::after {
    content: "";
    position: absolute;
    right: -50px;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 2px;
    background-color: #ddd;
  }

  section form .form-control:last-child p::before {
    content: "";
    position: absolute;
    left: -50px;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 2px;
    background-color: #ddd;
  }

  section form .form-control:last-child .icons {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
  }

  section form .form-control:last-child .icon {
    cursor: pointer;
  }

  section form .form-control:last-child .icon:not(:last-child) {
    margin-right: 15px;
  }

  /* Functionality */

  section .container .signup {
    pointer-events: none;
  }

  section .container.active .signup {
    pointer-events: initial;
  }

  section .container .signup .form-box {
    top: 100%;
  }

  section .container.active .signup .form-box {
    top: 0;
  }

  section .container .signup .img-box {
    top: -100%;
  }

  section .container.active .signup .img-box {
    top: 0;
  }

  section .container .login .form-box {
    top: 0;
  }

  section .container.active .login .form-box {
    top: 100%;
  }

  section .container .login .img-box {
    top: 0;
  }

  section .container.active .login .img-box {
    top: -100%;
  }



  @media (max-width: 996px) {
    section .container {
      max-width: 400px;
    }

    section .container .img-box {
      display: none;
    }

    section .container .form-box {
      width: 100%;
    }

    section .container.active .login .form-box {
      top: -100%;
    }
  }

  @media (max-width: 567px) {
    section {
      padding: 0 30px;
    }
  }

  .login-with-google-btn {
    transition: box-shadow 0.3s;
    padding: 12px 16px 12px 42px;
    border: none;
    border-radius: 3px;
    box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
    color: #4d4d4d;
    font-size: 14px;
    font-weight: 500;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: 12px 11px;
    text-decoration: none;
    width: 100%;
  }

  .login-with-google-btn:hover {
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
  }

  .login-with-google-btn:active {
    background-color: #ddd;
  }

  .login-with-google-btn:disabled {
    filter: grayscale(100%);
    background-color: #ddd;
    border: 1px solid #fff;
    cursor: not-allowed;
  }
</style>

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
              <input type="Email" required name="email" placeholder="Enter Email" />

              <div>
                <input type="password" required name="pass" placeholder="Password" />
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
              <input type="text" name="fullname" required placeholder="Enter Your Fullname" />

              <input type="email" name="email" required placeholder="Enter Email" />
              <input type="text" name="address" placeholder="Enter your address" />
              <input type="text" name="phone" placeholder="Phone number" />

              <div>
                <input type="password" name="password" required placeholder="Password" />
                <div class="icon form-icon">
                  <img src="./images/eye.svg" alt="" />
                </div>
              </div>
              <div>
                <input type="password" name="cpassword" required placeholder="Confirm Password" />
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
  <script>
    // Toggle Form
    const container = document.querySelector(".container");
    const inputs = document.querySelectorAll(".form-box input[type = 'password']");
    const icons = [...document.querySelectorAll(".form-icon")];
    const spans = [...document.querySelectorAll(".form-box .top span")];


    spans.map((span) => {
      span.addEventListener("click", (e) => {
        const color = e.target.dataset.id;
        container.classList.toggle("active");


      });
    });

    Array.from(inputs).map((input) => {
      icons.map((icon) => {
        icon.innerHTML = `<img src="img/eye.svg" alt="" />`;

        icon.addEventListener("click", () => {
          const type = input.getAttribute("type");
          if (type === "password") {
            input.setAttribute("type", "text");
            icon.innerHTML = `<img src="img/eye.svg" alt="" />`;
          } else if (type === "text") {
            input.setAttribute("type", "password");
            icon.innerHTML = `<img src="images/eye.svg" alt="" />`;
          }
        });
      });
    });
  </script>
</body>

</html>


</body>

</html>