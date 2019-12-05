<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="app.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
  </head>

  <body>

    <div class="main-page">


      <div class="menu-bar" >
        <div class="Item-bar">
          <img onclick="window.location='index.php'"class="logo-Item" src="img_413537.png" alt="">
          <h6 class="title-letter" >Mindtool</h6>
        </div>
        <div class="Item-bar1">
          <img  src="icons8-idea-50.png"  onclick="window.location.href='initx.php'"class="icon-serves" alt>
          <img src="icons8-apretón-de-manos-50.png" onclick="window.location.href='entercontact.php'"class="icon-serves"  alt="">
          <img src="icons8-internship-24.png" onclick="window.location.href='envolved.php';"class="icon-serves" alt="">
        </div>
        <div class="card-feet ler" style="">
          <div class="" style="padding-right: 10px;">
            <img class="profile-pic" src="yo.jpg" alt="Diego Ruelas">
          </div>
          <div class="">
            <p><?php
              echo $_SESSION['login_user'];
             ?></p>
          </div>


        </div>
        <br/>
    </div>
    <br/>
    <br/>
    <form class="" action="" method="post">
      <div class="wizard-container post" >
        <input class="form-control" type="text" name="src_media" value="" placeholder="posting image src">
        <input class="btn btn-info" type="submit" name="post" value="post">
      </div>
      <br>
      <br>
      <br>
    </form>
  </form>
  <?php

  $dbServerName = "remotemysql.com";
  $dbUsername = "61SJ7Ttitv";
  $dbPassword = "Z1FDENNtgA";
  $dbName = "61SJ7Ttitv";
  //se hace la conexión a SQL Server

  //form my sql

  $server = "mindtool.database.windows.net";
  $username = "Diego";
  $password = "Atomos12";
  $database = "mindtool";
  $conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $src = $_POST['src_media'];
    $men = 16;
    $one = 1;
    $db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    $sql = "INSERT INTO posts (poster,king,src_media) VALUES ('$men', $one , '$src')";
    $result = mysqli_query($db, $sql);
    $db->close();


      //Establishes the connection
      $tsql = "INSERT INTO posts (poster,king,src_media) VALUES (?,?,?)";

      $stmt= $conn->prepare($tsql);
      $stmt->execute([$men, $one,$src]);



  }
  ?>
<?php

$lotsql = 'SELECT TOP 10 * FROM posts ORDER BY ID DESC';
$post_data = $conn->query($lotsql)->fetchAll();

 ?>
  <?php for ($i = 0; $i < 10; $i++) { ?>
    <div class="wizard-container post">
      <div class="card wizard-card " data-color="orange" id="wizardProfile">
        <div class="wizard-header post-bar">


          <div class="image-content">
            <img class="profile-pic" src="yo.jpg" alt="Diego Ruelas">
          </div>

          <div class="poster-name">


              <?php

                if($i==1){
                  echo "Diego Ruelas";
                }else if($i==2){
                  echo "Sr Luis Campos";
                }else if($i ==3){
                  echo "Carlos Campos";
                }else {
                  echo "Luis Campos";
                }
              ?>

          </div>

          <div class="settings">

          </div>

        </div>
        <div class="main-idea text-center" id="default-post">
          <?php

          $where = $post_data[$i]['src_media'];

          echo '<img class="image-post" src=' .$where.' alt=""/>';
          ?>

        </div>
        <div class="post-desc" style="display: none;">
          <h3>Este es un post.</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>

        <div class="coment-bar">
          <div class="tag-interest-item" >
            <img onclick="postyl.interesting();"id="interest-pointer"src="icons8-idea-50.png" class="coment-bar-item-interest1" style="width: 33px; height: 27px;"alt="">
            <img class="coment-bar-item-interest " src="866474_comment_512x512.png" style="width: 30px; height: 36px;" alt="">
            <img class="coment-bar-item-interest" src="email-sent-send-outgoing-512.png " style="width: 30px; height: 32px;" alt="">

            <img class="coment-bar-item-interest "src="830417_arrows_512x512.png" style="width: 35px; height: 30px; margin-left: 420px;" alt="share">



          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>

  <?php } ?>



      </div>

      <br>
      <br>
      <br>
  </body>
  <script type="text/javascript">
    var postyl = new postclass();
  </script>
</html>
