<?php
// se hace la conexión a MySQL
$dbServerName = "remotemysql.com";
$dbUsername = "61SJ7Ttitv";
$dbPassword = "Z1FDENNtgA";
$dbName = "61SJ7Ttitv";
//se hace la conexión a SQL Server
$db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);


//for ms sql


if(isset($_POST['submitbutton']) && $_POST['submitbutton']) {

  $myusername =$_POST['user'];
  $mypassword = $_POST['passwo'];
  $myemail = $_POST['email'];
  $mypname =$_POST['pname'];
  $mylastname = $_POST['lastname'];
  $myphone = $_POST['phone'];
  $mybirth = $_POST['birth'];
  $sql = "INSERT INTO users (name, passw, email,legalname,lastname,phone,birthdat)VALUES ('$myusername', '$mypassword', '$myemail', '$mypname','$mylastname','$myphone','$mybirth')";
  $result = mysqli_query($db, $sql);
  $db->close();

  $server = "mindtool.database.windows.net";
  $username = "Diego";
  $password = "Atomos12";
  $database = "mindtool";
  $conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);
    //Establishes the connection
  $tsql = "INSERT INTO users (us_name, passw, email,legalname,lastname,phone,birthdat)VALUES (?,?,?,?,?,?,?)";

  $stmt= $conn->prepare($tsql);
  $stmt->execute([$myusername, $mypassword,$myemail,$mypname,$mylastname,$myphone,$mybirth]);


  if ($result ) {

    header("location: initx.php");
    echo "New record created successfully";
  } else {
      echo "Error: ";
  }


}



 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>
    <title></title>
  </head>
  <body>
    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
              <form class="" action="" method="post">

		            <!--      Wizard container        -->
		            <div class="wizard-container">
                  <div class="card wizard-card" data-color="orange" id="wizardProfile">

                    <div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Sign Up</h3>
					                     <p class="category">Create a profile and fill it with your information.</p>
                  	</div>

                    <br/>



                    <div id="sign"class="row ">


                    <div class="formget" >
                      <div class="">
                        <input class="formember" type="text" name="user" value="" placeholder="Usuario">
                      </div>
                      <div class="">
                        <input class="formember" type="text" name="email" value="" placeholder="Email">
                      </div>
                      <div class="">
                        <input type="password" class="formember" type="text" name="passwo" value=""  placeholder="Password">
                      </div>
                    </div>

                  </div>
                  <div id="sign2"class="row ">


                  <div class="formget ">
                    <div class="">
                      <input class="formember" type="text" name="pname" value="" placeholder="Personal Name">
                    </div>
                    <div class="">
                      <input type="text" class="formember" type="text" name="lastname" value=""  placeholder="Lastname">
                    </div>
                    <div class="">
                      <input type="text" class="formember" type="text" name="phone" value=""  placeholder="Phone number">
                    </div>
                  </div>

                </div>
                <div id="sign3" class="row ">


                <div class="formget">
                  <div class="">
                    <input class="formember" type="text" name="birth" value="" placeholder="Birthday YYYY-MM-DD">
                  </div>
                  <div class="">
                    <input type="text" class="formember" type="text" name="" value=""  placeholder="Profession">
                  </div>
                  <div class="">
                    <input type="text" class="formember" type="text" name="" value=""  placeholder="Nationality">
                  </div>
                </div>

              </div>

                    <br/>
                    <div class="card-feet">
                        <div class="sign-low">
                          <button id="btn-home" onclick="window.location.href='index.php'" class="btn btn-outline-dark" type="button" name="button">Home</button>
                          <button id="btn-previous"onclick="sesion.previous();" class="btn btn-outline-dark" type="button" name="button">Previous</button>
                        </div>
                        <div class="sign-low">
                          <button id="btn-next" class="btn btn-primary  pull-right" type="button" name="button" onclick="sesion.next();">Next</button>

                          <input id="btn-finish" class='btn btn-primary btn-finish pull-right' type="submit" name='submitbutton' value="Finish"   ></input>

                        </div>
                    </div>

                </div>
              </div>
            </div>
          </form>
        </div>
  </div>

  </body>
  <script type="text/javascript">
    document.getElementById('btn-previous').style.display='none';
    document.getElementById('btn-finish').style.display='none';
    document.getElementById('sign2').style.display='none';
    document.getElementById('sign3').style.display='none';
    var sesion = new signsession();
  </script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>

  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/demo.js" type="text/javascript"></script>
  <!--  <script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script> -->



	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
</html>
