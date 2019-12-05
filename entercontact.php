<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js"></script>
    <title>Mindtool</title>
    <meta name="keywords" content="Mindtool,Social,entrepeunership,Post">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title></title>
  </head>
  <body>
    <div class="menu-bar" >
      <div class="Item-bar">
        <img onclick="window.location='index.php'"class="logo-Item" src="img_413537.png" alt="">
        <h6 class="title-letter">Mindtool</h6>
      </div>
      <div class="Item-bar1">
        <img  src="icons8-idea-50.png"  onclick="window.location.href='initx.php'" class="icon-serves" alt>
        <img src="icons8-apretón-de-manos-50.png"  onclick="window.location.href='entercontact.php'"class="icon-serves"  alt="">
        <img src="icons8-internship-24.png"  onclick="window.location.href='envolved.php';"class="icon-serves" alt="">
      </div>
      <div class="card-feet" style="">
        <div class="" style="padding-right: 10px;">
          <img class="profile-pic" src="yo.jpg" alt="Diego Ruelas">
        </div>
        <div class="">
          <p>Diego Ruelas</p>
        </div>


      </div>
      <br/>
  </div>
  <br>
  <br>
<div class="main-forms">
  <div class="verified-query">
    <input type="text" class="form-control" style="width: 600px;"name="" value="">
    <button type="button" class="btn btn-primary"name="button">Buscar</button>
  </div>
</div>
<br>
<br>
<br>
<?php
$server = "mindtool.database.windows.net";
$username = "Diego";
$password = "Atomos12";
$database = "mindtool";
$conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);

?>
  <?php
  $lotsql = 'SELECT * FROM some_enterprise';
  $post_data = $conn->query($lotsql)->fetchAll();
   ?>
<?php for($i=0; $i<3; $i++){ ?>

<div class="enterprise-post-page">
    <div class="card text-center enter-post">
    <div class="card-body">
      <h5 class="card-title"><?php echo $post_data[$i]['title']  ?></h5>
      <div class="content-card-getit">

          <p class="text-about"> <?php echo $post_data[$i]['content']  ?></p>
          <?php echo '<img class="enterlogo" src=' .$post_data[$i]['logo'] .' alt=""/>'; ?>


      </div>

<button onclick="" class="btn btn-primary">Go!</button> 


    </div>
    <div class="card-footer text-muted">
      <?php echo $post_data[$i]['post_creation']  ?>
    </div>
  </div>
</div>
<br>
<br>
<?php } ?>
  </body>
</html>
