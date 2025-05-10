<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="CSS/login_page.css" />
  <link rel="icon shortcut" href="imgs/Genz_logo.ico" />

  <title>Sign Page | GenZ</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="register_handle.php" method="post">
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registeration</span>
        <input type="text" placeholder="First name" name="first_name" />
        <small style="color: red; ">
          <?php if (isset($_SESSION["errors"]["first_name"])) {
            echo $_SESSION["errors"]["first_name"];
          } ?></small>
        <input type="text" placeholder="Last name" name="last_name" />
        <small style="color: red; ">
          <?php if (isset($_SESSION["errors"]["last_name"])) {
            echo $_SESSION["errors"]["last_name"];
          } ?></small>
        <input type="text" placeholder="Email" name="email" />
        <small style="color: red; ">
          <?php if (isset($_SESSION["errors"]["email"])) {
            echo $_SESSION["errors"]["email"];
          } ?></small>
        <input type="number" placeholder="Phone number" name="phone" />
        <div class="pw">
          <input type="password" placeholder="Password" name="pw" id="pw" />
          <input type="checkbox" id="togglepw">
          <label for="togglepassword">Show</label>
        </div>
        <small style="color: red; ">
          <?php if (isset($_SESSION["errors"]["pw"])) {
            echo $_SESSION["errors"]["pw"];
          } ?></small>
        <div class="pw">
          <input type="password" placeholder="Confirmation Password" name="pc" id="pc" />
          <input type="checkbox" id="togglepc">
          <label for="togglepassword">Show</label>
        </div>
        <small style="color: red; ">
          <?php if (isset($_SESSION["errors"]["pc"])) {
            echo $_SESSION["errors"]["pc"];
          }
          if (!empty($_GET["msg"]) && $_GET["msg"] == "some error") {
            echo "some erorr in register";
          }
          ?>
        </small>
        <input type="submit" value="register" class="button">
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="login_handle.php" method="post">
        <h1>Sign In</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email password</span>
        <input type="email" placeholder="Email" name="email" />
        <div class="pw">
          <input type="password" placeholder="Password" name="password" id="password" />
          <input type="checkbox" id="togglepassword">
          <label for="togglepassword">Show</label>
        </div>
        <a href="forget_pass.html">Forget Your Password?</a>
        <small style="color: red;">
          <?php
          if (!empty($_GET["msg2"]) && $_GET["msg2"] == "some error") {
            echo "some erorr in login";
          }elseif (isset($_GET["msg2"]) == "no_user") {
            echo "No user ";
          }
          ?>
        </small>
        <input type="submit" value="sign in" class="button">
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h2>Welcome to our web site!</h2>
          <p>Enter your personal details to use all of site features</p>
          <button class="button" id="login">log In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Welcome back!</h1>
          <p>
            Register with your personal details to use all of site features
          </p>
          <button class="button" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="login_page.js"></script>
  <p id="ded" class="txt">@Developed by GenZ Team ^_^</p>

</body>

</html>
<?php
$_SESSION["errors"] = null;
$_GET["msg2"] = null;
?>