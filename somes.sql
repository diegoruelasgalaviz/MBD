create table some_enterprise (
id int not null AUTO_INCREMENT,
logo varchar(255) not null,
title varchar(255) not null,
link varchar(255) not null,
content text not null,
post_creation date not null,
primary key (id) );


CREATE TABLE Audit_us (
  AuditID INTEGER NOT NULL AUTO_INCREMENT ,
  ip_incharge varchar(255) ,
  User_na VARCHAR(50) ,
  date_occur timestamp DEFAULT CURRENT_TIMESTAMP,
  Column_modified VARCHAR(200),
  last_val VARCHAR(200),
  Actual_value vARCHAR(200),
  PRIMARY KEY (AuditID)
)







$tsql = "INSERT INTO users (us_name, passw, email,legalname,lastname,phone,birthdat)VALUES (?,?,?,?,?,?,?)";

$stmt= $conn->prepare($tsql);
$stmt->execute([$myusername, $mypassword,$myemail,$mypname,$mylastname,$myphone,$mybirth]);
//--------------------

$sql = "INSERT INTO users (name, passw, email,legalname,lastname,phone,birthdat)VALUES ('$myusername', '$mypassword', '$myemail', '$mypname','$mylastname','$myphone','$mybirth')";
$result = mysqli_query($db, $sql);





for ($i = 0; $i < sizeof($set_mar); $i++) {
  $mar_name = $set_mar[$i]['name'];
   $set_mar[$i]['address'],$set_mar[$i]['lat'],$set_mar[$i]['lng'],$set_mar[$i]['type']
  $sql = "INSERT INTO markers (name, address, lat,lng,type)VALUES ('$mar_name',?,?,?,?)";

  $result = mysqli_query($db, $sql);
}

for ($i = 0; $i < sizeof($set_audit); $i++) {

  $sql = "INSERT INTO Audit_us (ip_incharge, date_occur)VALUES (?,?)";

  $result = mysqli_query($db, $sql);
}

for ($i = 0; $i < sizeof($set_some); $i++) {

  $sql = "INSERT INTO some_enterprise (logo, title, link, content, post_creation)VALUES (?,?,?,?,?,?,?)";

  $result = mysqli_query($db, $sql);
}






$dbServerName = "remotemysql.com";
$dbUsername = "61SJ7Ttitv";
$dbPassword = "Z1FDENNtgA";
$dbName = "61SJ7Ttitv";
//se hace la conexión a SQL Server
$db = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

$mar_sql = 'SELECT * FROM markers ';
$us_sql = 'SELECT * FROM users ';
$post_sql = 'SELECT * FROM posts ';
$some_sql = 'SELECT * FROM some_enterprise ';
$audit_sql = 'SELECT * FROM Audit_us ';

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
print_r($set_mar);
print_r($set_us);
print_r($set_post);
print_r($set_some);
print_r($set_audit);
$db->close();


$server = "mindtool.database.windows.net";
$username = "Diego";
$password = "Atomos12";
$database = "mindtool";
$conn = new PDO("sqlsrv:server=$server ; Database = $database", $username, $password);
  //Establishes the connection

$query = 'SELECT * FROM markers ';
$query = 'SELECT * FROM users ';
$query = 'SELECT * FROM posts ';
$query = 'SELECT * FROM some_enterprise ';
$query = 'SELECT * FROM Audit_us ';
$result = $conn->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC)

//--------------------












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
