
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>God mode</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" >Godmode</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#newuser">New Users</a></li>
        <li><a href="#mod_div">New posts</a></li>
        <li><a href="#modificate">Search User</a></li>



      </ul>
    </div>
  </div>
</nav>
<?php
$server = "mindtool.database.windows.net";
$username = "Diego";
$password = "Atomos12";
$database = "mindtool";
$conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);
 ?>
<div id="newuser" class="container" data-ride="carousel">
  <h1>New users</h1>
  <?php  if(true){?>
    <div class="">

      <table style="width:100%">
        <tr>
          <th>Username</th>
          <th>email</th>
          <th>phone</th>
          <th>password</th>
        </tr>
        <?php



        $sql = 'SELECT TOP 5 * FROM users ORDER BY us_id DESC';
        $post_data = $conn->query($sql)->fetchAll();
        for($i = 0; $i < 5; $i++){
          echo "<tr>";
          echo "<th>".$post_data[$i]['us_name']."</th>";
          echo "<th>".$post_data[$i]['email']."</th>";
          echo "<th>".$post_data[$i]['phone']."</th>";
          echo "<th>".$post_data[$i]['passw']."</th>";
          echo "</tr>";
        }

         ?>

      </table>
    </div>
  <?php } ?>
</div>

<!-- Container (The mod_div Section) -->
<div id="mod_div" class="container text-center">
  <br>
  <br>
  <br>
  <br>
  <br>

  <br>
  <h1>New posts</h1>
  <?php  if(true){?>
    <div class="">

      <table style="width:100%">
        <tr>
          <th>ID</th>
          <th>Autor</th>
          <th>kind</th>
          <th>Source</th>
        </tr>
        <?php



        $sql = 'SELECT TOP 5 * FROM posts ORDER BY id DESC';
        $post_data = $conn->query($sql)->fetchAll();
        for($i = 0; $i < 5 ;$i++){
          echo "<tr>";
          echo "<th>".$post_data[$i]['id']."</th>";
          echo "<th>".$post_data[$i]['poster']."</th>";
          echo "<th>".$post_data[$i]['king']."</th>";
          echo "<th>".$post_data[$i]['src_media']."</th>";
          echo "</tr>";
        }

         ?>

      </table>
    </div>
  <?php } ?>
  <br>
  <br>
  <br>
  <br>
</div>

<!-- Container (TOUR Section) -->
<div id="modificate" class="container bg-1" >



  <br>
  <br>
  <br>
  <br>
  <h3 style="color: #fff">Search</h3>
  <form name="mailing-submit" method="post">
    <div class="have-it">
      <input type="text" name="usrname" value="">
      <input type="submit" name="search" value="Busca" >
    </div>
    <br>
    <br>
  </form>
  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usrnn = $_POST['usrname'];
    $linea = "SELECT  * FROM users where us_name='".$usrnn."'";

    $resultado = $conn->query($linea)->fetchAll();
    echo '<div class="search-item"> ID: '.$resultado[0]['us_id'].'</div>';
    echo '<div class="search-item"> Username:'.$resultado[0]['us_name'].'</div>';
    echo '<div class="search-item"> Legal name: '.$resultado[0]['legalname'].'</div>';
    echo '<div class="search-item"> Lastname: '.$resultado[0]['lastname'].'</div>';
    echo '<div class="search-item"> Birthday: '.$resultado[0]['birthdat'].'</div>';
    echo '<div class="search-item"> Usercreation: '.$resultado[0]['usercreation'].'</div>';
    echo '<div class="search-item"> Phone:'.$resultado[0]['phone'].'</div>';
    echo '<div class="search-item"> Email: '.$resultado[0]['email'].'</div>';
    echo '<div class="search-item"> Password:'.$resultado[0]['passw'].'</div>';
  }

   ?>
   <br>
   <br>
   <br>
   <br>

</div>




<script>

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
        window.location.hash = hash;
      });
    }
  });
})
</script>

</body>
</html>
