<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <script src="app.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="wrapper">

      <div class="log-divspace">
        <br/>
        <br/>

        <img onclick="window.location.href='index.php'" class="wreck" src="img_413537.png" alt="">
        <br/>
        <br/>
        <form class="log-form"  method="post">
          <div class="">
            <input onclick="" class="formember" type="text" name="username" value="" placeholder="User">
          </div>
          <div class="">
            <input class="formember" type="password" name="password" value="" placeholder="Password">
          </div>
          <div class="">
            <input  class="btn btn-primary button-center" type="submit" name="button" value="Log in"></input>
          </div>

        </form>
        <div class="sign-away">
          <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
        <br/>
      </div>



    </div>
    <?php
      $dbServerName = "remotemysql.com";
      $dbUsername = "61SJ7Ttitv";
      $dbPassword = "Z1FDENNtgA";
      $dbName = "61SJ7Ttitv";

      // create connection
      $db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

      // check connection


       if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form

          $myusername = mysqli_real_escape_string($db,$_POST['username']);
          $mypassword = mysqli_real_escape_string($db,$_POST['password']);

          $sql = "SELECT us_id FROM users WHERE name = '$myusername' and passw = '$mypassword'";
          $result = mysqli_query($db,$sql);





          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

          $count = mysqli_num_rows($result);
          echo $count;
          // If result matched $myusername and $mypassword, table row must be 1 row

          if($count == 1) {

             $_SESSION['login_user'] = $myusername;
             
             header("location: initx.php");
             echo "Good";
          }else {
             $error = "Your Login Name or Password is invalid";
             echo $error;
          }
       }
    ?>


  </body>
</html>
