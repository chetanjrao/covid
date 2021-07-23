<?php
include('./app/connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_SESSION["user"];
    $date = $_POST["date"];
    $state = $_POST["state"];
    $district = $_POST["district"];
    $query = "INSERT INTO bookings VALUES (NULL, $user, NULL, $state, $district, '$date')";
    print($query);
    $query_exec = mysqli_query($connection, $query);
    print($query_exec);
    if($query_exec){
        header("location: confirm.php");
    } else {
        $message = "Invalid email/password";
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
    <link rel="stylesheet" type="text/css" href="css/theme-10.css">

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
                  </div>
                  <h3>Booking Form</h3>
                  <p>Enter your details and complete booking process</p>
                  <div class="steps">
                    <span class="step processing"></span>
                  </div>
                  <form action="" method="POST">
                    <div class="form-group">
                      <input type="date" name="date" class="form-control" id="date" required>
                      <label for="inputName">Date</label>
                    </div>
                    <div class="form-group">
                      <select name="state" class="form-control" placeholder="e.g. +99 123 456 789" id="inputPhone" required>
                          <?php
                            $query = "SELECT * FROM states WHERE is_deleted=0";
                            $query_exec = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_array($query_exec, MYSQLI_ASSOC)){
                          ?>
                          <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                          <?php } ?>
                      </select>
                      <label for="inputPhone">Choose State</label>
                    </div>
                    <div class="form-group">
                      <select name="district" class="form-control" placeholder="e.g. +99 123 456 789" id="inputPhone" required>
                          <?php
                            $query = "SELECT * FROM districts WHERE is_deleted=0";
                            $query_exec = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_array($query_exec, MYSQLI_ASSOC)){
                          ?>
                          <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                          <?php } ?>
                      </select>
                      <label for="inputPhone">Choose District</label>
                    </div>
                    <button type="submit" class="btn">Complete Booking</button>
                  </form>
                </div>
                <div class="ugf-bg bg-3">
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
