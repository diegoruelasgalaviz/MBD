<?php

function mystosq(){
  $dbServerName = "remotemysql.com";
  $dbUsername = "61SJ7Ttitv";
  $dbPassword = "Z1FDENNtgA";
  $dbName = "61SJ7Ttitv";
  //se hace la conexión a SQL Server
  //Extract
  $db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

  $mar_sql = 'SELECT * FROM markers ';
  $us_sql = 'SELECT * FROM users ';
  $post_sql = 'SELECT * FROM posts ';
  $some_sql = 'SELECT * FROM some_enterprise ';
  $audit_sql = 'SELECT * FROM Audit_us ';

  //transform
  $result_mar = mysqli_query($db,$mar_sql);
  for ($set_mar = array (); $row = $result_mar->fetch_assoc(); $set_mar[] = $row);
  $result_us = mysqli_query($db,$us_sql);
  for ($set_us = array (); $row = $result_us->fetch_assoc(); $set_us[] = $row);
  $result_post = mysqli_query($db,$post_sql);
  for ($set_post = array (); $row = $result_post->fetch_assoc(); $set_post[] = $row);
  $result_some = mysqli_query($db,$some_sql );
  for ($set_some = array (); $row = $result_some->fetch_assoc(); $set_some[] = $row);
  $result_audit = mysqli_query($db,$audit_sql);
  for ($set_audit = array (); $row = $result_audit->fetch_assoc(); $set_audit[] = $row);

  $db->close();
  //print_r($set_mar);
  //print_r($set_us);
  //print_r($set_post);
  //print_r($set_some);
  //print_r($set_audit);

  $server = "mindtool.database.windows.net";
  $username = "Diego";
  $password = "Atomos12";
  $database = "mindtool";
  $conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);



  $query = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'users'";

  $query_mar = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'markers'";
  $query_post = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'posts'";
  $query_some = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'some_enterprise'";
  $query_audit = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'Audit_us'";




  $result_get = $conn->query($query);

//Load
  $row = $result_get->fetch(PDO::FETCH_ASSOC);
  if($row['counter']<1){
    $tablecre = "CREATE TABLE users(
    	us_id int IDENTITY(1,1) primary key NOT NULL,
    	us_name varchar(255) NOT NULL,
    	legalname varchar(255) NOT NULL,
    	lastname varchar(255) NOT NULL,
    	birthdat date NULL,
    	usercreation DATETIME DEFAULT GETDATE(),
    	phone varchar(20) NULL,
    	email varchar(50) NOT NULL,
    	passw varchar(255) NULL,
    )";
    $makeit = $conn->query($tablecre);

  }else{
    $tablecleaner = "truncate table users";
    $makeit = $conn->query($tablecleaner);
  }

  $result_get = $conn->query($query_mar);

  $row = $result_get->fetch(PDO::FETCH_ASSOC);
  if($row['counter']<1){
    $tablecre = "CREATE TABLE markers (
  id INT NOT NULL identity(1,1) PRIMARY KEY ,
  marker_name VARCHAR( 60 ) NOT NULL ,
  addres VARCHAR( 80 ) NOT NULL ,
  lat real NOT NULL ,
  lng real NOT NULL ,
  typen VARCHAR( 30 ) NOT NULL
  ) ";
    $makeit = $conn->query($tablecre);
  }else{
    $tablecleaner = "truncate table markers";
    $makeit = $conn->query($tablecleaner);
  }

  $result_get = $conn->query($query_post);

  $row = $result_get->fetch(PDO::FETCH_ASSOC);
  if($row['counter']<1){
    $tablecre = "CREATE TABLE dbo.posts(
	id int NOT NULL IDENTITY(1,1) primary key ,
	poster int NOT NULL,
	king int NOT NULL,
	src_media varchar(255) NOT NULL
  ) ";
  $makeit = $conn->query($tablecre);
  }else{
    $tablecleaner = "truncate table posts";
    $makeit = $conn->query($tablecleaner);
  }

  $result_get = $conn->query($query_audit);

  $row = $result_get->fetch(PDO::FETCH_ASSOC);
  if($row['counter']<1){
    $tablecre = "CREATE TABLE Audit_us
    (
      AuditID INTEGER NOT NULL IDENTITY(1, 1) PRIMARY KEY,
      ip_incharge varchar(255) ,
      User_na VARCHAR(50) ,
      date_occur DATETIME DEFAULT GETDATE()  ,
      Column_modified VARCHAR(255) ,
      last_value VARCHAR(255),
      Actual_value vARCHAR(255),
    ) ";
    $trigger = "CREATE TRIGGER Historial ON dbo.users
    FOR INSERT, UPDATE, DELETE
    AS
    begin
    	declare @ipincome varchar(255)
    	SELECT @ipincome = client_net_address
        FROM sys.dm_exec_connections
        WHERE Session_id = @@SPID;

    	insert into Audit_us (ip_incharge)values(@ipincome)
    end";
    $makeit = $conn->query($tablecre);
    $completeit = $conn->query($trigger);
  }else{
    echo "existe";
  }

  $result_get = $conn->query($query_some);
  $row = $result_get->fetch(PDO::FETCH_ASSOC);
  if($row['counter']<1){
    $tablecre = "CREATE table some_enterprise
    (
    	id int not null primary key identity(1,1),
    	logo varchar(255) not null,
    	title varchar(255) not null,
    	link varchar(255) not null,
    	content text not null,
    	post_creation date not null

    )";
  $makeit = $conn->query($tablecre);
  }else{
    echo "existe";
  }



  //end table creations
  for ($i = 0; $i < sizeof($set_us); $i++) {

    $tsql = "INSERT INTO users (us_name, passw, email,legalname,lastname,phone,birthdat)VALUES (?,?,?,?,?,?,?)";

    $stmt= $conn->prepare($tsql);
    $stmt->execute([$set_us[$i]['name'], $set_us[$i]['passw'],$set_us[$i]['email'],$set_us[$i]['legalname'],$set_us[$i]['lastname'],$set_us[$i]['phone'],$set_us[$i]['birthdat']]);
  }


  for ($i = 0; $i < sizeof($set_post); $i++) {

    $tsql = "INSERT INTO posts (poster, king,src_media)VALUES (?,?,?)";

    $stmt= $conn->prepare($tsql);
    $stmt->execute([$set_post[$i]['poster'],$set_post[$i]['king'],$set_post[$i]['src_media']]);
  }

  for ($i = 0; $i < sizeof($set_mar); $i++) {

    $tsql = "INSERT INTO markers (marker_name, addres, lat,lng,typen)VALUES (?,?,?,?,?)";

    $stmt= $conn->prepare($tsql);
    $stmt->execute([$set_mar[$i]['name'], $set_mar[$i]['address'],$set_mar[$i]['lat'],$set_mar[$i]['lng'],$set_mar[$i]['type']]);
  }

  for ($i = 0; $i < sizeof($set_audit); $i++) {

    $tsql = "INSERT INTO Audit_us (ip_incharge, date_occur)VALUES (?,?)";

    $stmt= $conn->prepare($tsql);
    $stmt->execute([$set_audit[$i]['ip_incharge'], $set_audit[$i]['date_occur']]);
  }

  for ($i = 0; $i < sizeof($set_some); $i++) {

    $tsql = "INSERT INTO some_enterprise (logo, title, link, content, post_creation)VALUES (?,?,?,?,?,?,?)";

    $stmt= $conn->prepare($tsql);
    $stmt->execute([$set_some[$i]['logo'], $set_some[$i]['title'], $set_some[$i]['link'], $set_some[$i]['content'],$set_some[$i]['post_creation']]);
  }
}

function sqtomy(){
  $server = "mindtool.database.windows.net";
  $username = "Diego";
  $password = "Atomos12";
  $database = "mindtool";
  $conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);



  $mar_sql = 'SELECT * FROM markers ';
  $us_sql = 'SELECT * FROM users ';
  $post_sql = 'SELECT * FROM posts ';
  $some_sql = 'SELECT * FROM some_enterprise ';
  $audit_sql = 'SELECT * FROM Audit_us ';



  $result_mar = $conn->query($mar_sql);
  for ($set_mar = array (); $row = $result_mar->fetch(PDO::FETCH_ASSOC); $set_mar[] = $row);
  $result_us = $conn->query($us_sql);
  for ($set_us = array (); $row = $result_us->fetch(PDO::FETCH_ASSOC); $set_us[] = $row);
  $result_post = $conn->query($post_sql);
  for ($set_post = array (); $row = $result_post->fetch(PDO::FETCH_ASSOC); $set_post[] = $row);
  $result_some = $conn->query($some_sql );
  for ($set_some = array (); $row = $result_some->fetch(PDO::FETCH_ASSOC); $set_some[] = $row);
  $result_audit = $conn->query($audit_sql);
  for ($set_audit = array (); $row = $result_audit->fetch(PDO::FETCH_ASSOC); $set_audit[] = $row);

  //print_r($set_mar);
  //print_r($set_us);
  //print_r($set_post);
  //print_r($set_some);
  //print_r($set_audit);


  //print_r($set_us);
  $dbServerName = "remotemysql.com";
  $dbUsername = "ZBzXHQuchV";
  $dbPassword = "EELkq0smk6";
  $dbName = "ZBzXHQuchV";

  $db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

  $query = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'users'";

  $query_mar = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'markers'";
  $query_post = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'posts'";
  $query_some = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'some_enterprise'";
  $query_audit = "SELECT count(*) as counter FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_NAME = 'Audit_us'";


    $result_get =  mysqli_query($db,$query);


    $row = $result_get->fetch_assoc();
    if($row['counter']<1){
      $tablecre = "CREATE TABLE users(
      	us_id int AUTO_INCREMENT  NOT NULL,
      	name varchar(255) NOT NULL,
      	legalname varchar(255) NOT NULL,
      	lastname varchar(255) NOT NULL,
      	birthdat date NULL,
      	usercreation date DEFAULT CURRENT_TIMESTAMP,
      	phone varchar(20) NULL,
      	email varchar(50) NOT NULL,
      	passw varchar(255) NULL,
        primary key(us_id)
      )";
      $makeit = mysqli_query($db,$tablecre);

    }else{

    }


    $result_get =  mysqli_query($db,$query_mar);

    $row = $result_get->fetch_assoc();
    if($row['counter']<1){
      $tablecre = "CREATE TABLE markers (
    id INT NOT NULL AUTO_INCREMENT  ,
    name VARCHAR( 60 ) NOT NULL ,
    address VARCHAR( 80 ) NOT NULL ,
    lat real NOT NULL ,
    lng real NOT NULL ,
    type VARCHAR( 30 ) NOT NULL,
    PRIMARY KEY (id)
    ) ";
      $makeit = mysqli_query($db,$tablecre);
    }else{

    }

    $result_get =  mysqli_query($db,$query_post);

    $row = $result_get->fetch_assoc();
    if($row['counter']<1){
      $tablecre = "CREATE TABLE posts(
      	id int NOT NULL AUTO_INCREMENT  ,
      	poster int NOT NULL,
      	king int NOT NULL,
      	src_media varchar(255) NOT NULL,
        primary key (id)
      )";
      $makeit = mysqli_query($db,$tablecre);
    }else{

    }


    $result_get =  mysqli_query($db,$query_audit);

    $row = $result_get->fetch_assoc();
    if($row['counter']<1){
      $tablecre = "CREATE TABLE Audit_us (
        AuditID INTEGER NOT NULL AUTO_INCREMENT ,
        ip_incharge varchar(255) ,
        User_na VARCHAR(50) ,
        date_occur timestamp DEFAULT CURRENT_TIMESTAMP,
        Column_modified VARCHAR(200),
        last_val VARCHAR(200),
        Actual_value vARCHAR(200),
        PRIMARY KEY (AuditID)
      )";
      $makeit = mysqli_query($db,$tablecre);
    }else{
      $tablecleaner = "truncate table Audit_us";
      $makeit = mysqli_query($db,$tablecleaner);
    }


    $result_get =  mysqli_query($db,$query_some);

    $row = $result_get->fetch_assoc();

    if($row['counter']<1){
      $tablecre = "CREATE table some_enterprise (
      id int not null AUTO_INCREMENT,
      logo varchar(255) not null,
      title varchar(255) not null,
      link varchar(255) not null,
      content text not null,
      post_creation date not null,
      primary key (id) ;
      )";
      $makeit = mysqli_query($db,$tablecre);
    }else{

    }



    for ($i = 0; $i < sizeof($set_us); $i++) {

      $name_i = $set_us[$i]['us_name'];
      $pass =  $set_us[$i]['passw'];
      $ema =  $set_us[$i]['email'];
      $leg = $set_us[$i]['legalname'];
      $lasn = $set_us[$i]['lastname'];
      $pho = $set_us[$i]['phone'];
      $birt = $set_us[$i]['birthdat'];
      $sql = "INSERT INTO users (name, passw, email,legalname,lastname,phone,birthdat)VALUES ('$name_i','$pass','$ema','$leg','$lasn','$pho','$birt')";
      echo $sql;
      $result = mysqli_query($db, $sql);

    }

    for ($i = 0; $i < sizeof($set_post); $i++) {

      $posta = $set_post[$i]['poster'];
      $burg = $set_post[$i]['king'];
      $media = $set_post[$i]['src_media'];
      $sql = "INSERT INTO posts (poster, king,src_media)VALUES ('$posta','$burg','$media')";

      $result = mysqli_query($db, $sql);

    }

    for ($i = 0; $i < sizeof($set_mar); $i++) {

      $mar_name = $set_mar[$i]['marker_name'];
      $add = $set_mar[$i]['addres'];
      $lata = $set_mar[$i]['lat'];
      $longa = $set_mar[$i]['lng'];
      $tipo = $set_mar[$i]['typen'];
      $sql = "INSERT INTO markers (name,address,lat,lng,type)VALUES ('$mar_name','$add','$lata','$longa','$tipo')";

      $result = mysqli_query($db, $sql);

    }


    for ($i = 0; $i < sizeof($set_some); $i++) {

      $log = $set_some[$i]['logo'];
      $title_ip = $set_some[$i]['title'];
      $zelda = $set_some[$i]['link'];
      $cont = $set_some[$i]['content'];
      $posty = $set_some[$i]['post_creation'];
      $tsql = "INSERT INTO some_enterprise (logo, title, link, content, post_creation)VALUES ('$log','$title_ip','$zelda','$cont','$posty')";

      $result = mysqli_query($db, $tsql);

    }


    for ($i = 0; $i < sizeof($set_audit); $i++) {

      $ip_guilt = $set_audit[$i]['ip_incharge'];
      $ocurre = $set_audit[$i]['date_occur'];
      $sql = "INSERT INTO Audit_us (ip_incharge, date_occur)VALUES ('$ip_guilt','$ocurre')";

      $result = mysqli_query($db, $sql);

    }

    $db->close();
}

sqtomy()




 ?>
