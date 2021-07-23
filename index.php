<?php
include('./app/connect.php');
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $query_exec = mysqli_query($connection, $query);
    if($query_exec){
        $count = mysqli_num_rows($query_exec);
        $row = mysqli_fetch_row($query_exec);
        if($count){
            $_SESSION["user"] = $row[0];
            header("location: booking.php");
        } else {
            $message = "Invalid email/password";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Template</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">

    <!-- Custom Css --> 
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/theme-10.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png">
    <link rel="apple-touch-icon" href="./images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./images/icon-114x114.png">


  </head>
  <body>
    <div class="main">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div class="ugf-container-wrap">
              <div class="ugf-container">
                <div class="ugf-content">
                  <div class="logo">
                    <a href="#"><img height="56" src="./images/bmslogo.png" alt=""></a>
                  </div>
                  <h3>Welcome back!</h3>
                  <p>Let’s login to your account</p>
                  <form method="POST" action="">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control" placeholder="example@domain.com" id="input-mail" required>
                      <label for="input-mail">Email Address</label>
                    </div>
                    <div class="form-group pass-block">
                      <input name="password" type="password" class="form-control" placeholder="********" id="inputPass" required>
                      <label for="inputPass">Password</label>
                      <div class="pass-toggler-btn">
                        <i id="eye" class="lar la-eye"></i>
                        <i id="eye-slash" class="lar la-eye-slash"></i>
                      </div>
                    </div>
                    <button type="submit" class="btn">Login Account</button>
                  </form>
                </div>
                <div class="ugf-bg bg-1">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>
  </body>
</html>
