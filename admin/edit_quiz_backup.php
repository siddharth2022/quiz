<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin | CSI quiz corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<?php
include("config.php");
session_start();
?>

<?php
if(isset($_GET['id'])) {

$qx = "q{$_GET['id']}";
?>

<div class="panel panel-default">
  <div class="panel-heading">User Data</div>
  <div class="panel-body">
    
    <form name="import" method="post" enctype="multipart/form-data">
<input type="file" name="user_file" /><br />
<input type="submit" name="users" value="Submit" />
</form>


  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Questions</div>
  <div class="panel-body">
    
    <form name="import" method="post" enctype="multipart/form-data">
<input type="file" name="ques_file" /><br />
<input type="submit" name="questions" value="Submit" />
</form>


  </div>
</div>
<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$database = "quiz_master";
$conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
mysql_select_db("$database", $conn) or die(mysql_error());


if(isset($_POST["users"]))
{
$file = $_FILES['user_file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$name = $filesop[0];
$project = $filesop[1];

$sql = mysql_query("INSERT INTO {$qx}_users (fname, lname) VALUES ('$name','$project')");
$c = $c + 1;
}

if($sql){
echo "You database has imported successfully. You have inserted ". $c ." recoreds";
}else{
echo "Sorry! There is some problem.";
}

}

if(isset($_POST["questions"]))
{
$file = $_FILES['ques_file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$name = $filesop[0];
$project = $filesop[1];
$project = intval($project);
$sql = mysql_query("INSERT INTO {$qx}_main (question, answer) VALUES ('$name','$project')");
$c = $c + 1;
}

if($sql){
echo "You database has imported successfully. You have inserted ". $c ." recoreds";
}else{
echo "Sorry! There is some problem.";
}

}
?>
    

<?php
}
?>

<?php
$fetch_quiz_query = mysqli_query($DB,"SELECT * FROM master WHERE 1");
echo "<ul class='list-group'>";
while($row = mysqli_fetch_assoc($fetch_quiz_query))
{
  echo "<li class='list-group-item'>";
  echo "<a href='?id={$row['id']}'>{$row['name']}</a></td>";
  echo "</li>";
}
echo "</ul>";
?>

</body>

</html>