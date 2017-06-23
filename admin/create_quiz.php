
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin | CSI quiz corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</head>

<body>


<?php
  include("config.php");
  session_Start();
?>

<?php

  if(!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
  }
?>

<div class="container-fluid wrapper">
<!--   header -->
  <!--<div class="row header">
    <div class="col-xs-2">
    Quiz Corner
    </div>
  </div>-->
  
  <div class="row main-body">
    <div class="col-xs-3 left-panel">
      <center>
      <img src="csilogo.png" width="50%" height="50%">
      <h4>CSI Quiz Corner</h4>
      </center>
      <hr>
      
      <!--<div class="container-fluid">
      <div class="row">
      <div class="col-xs-10 col-xs-offset-1" style="border: 0px solid #ffffff;">-->
      <div class="nav-menu">
	<a href="create_quiz.php">
	<div class="menu-item active">
	  <span class="glyphicon glyphicon-plus"></span> Create new
	</div>
	</a>
	<a href="edit_quiz.php">
	<div class="menu-item ">
	  <span class="glyphicon glyphicon-pencil"></span> Edit
	</div>
	</a>
	<a href="monitor_quiz.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-time"></span> Monitor
	</div>
	</a>
	<a href="view_quiz.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-list-alt"></span> Have a look
	</div>
	</a>
	<a href="logout.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-off"></span> Logout
	</div>
	</a>
      </div>
      <!--</div>
      </div>
      </div>
      
      -->
      
      
    </div>
 
    <div class="col-xs-9 bcontent" style="border: 0px solid #000000; height: 100%;">
<!--     content goes here -->
      <div class="container-fluid" style="margin-left: 3em;">
	<div class="row">
	  <div class="col-xs-6 col-xs-offset-3">
	    <div class="panel panel-default">
	    <div class="panel-body">
	    <form class="create-form" action="" method="post">
	      <input class="form-text" type="text" name="q_name" id="q_name" placeholder="Name" required><br><Br>
	      <input class="form-text" type="text" name="q_noques" id="q_noques" placeholder="No. of questions"><br><Br>
	      <input class="form-text" type="text" name="q_duration" id="q_duration" placeholder="Duration" required><Br><br>
	      <input class="form-submit" type="submit" value="Create">
	    </form>
	    </div>
	    </div>
	  </div>
	</div>
      </div>
<!--    footer
      <div class="container-fluid" style="position: absolute; bottom: 0px; color: #c0b0b0;">
	<div class="row">
	  <div class="col-xs-4 col-xs-offset-9">
	    Developed by : <strong>Harsh Sodiwala</strong>
	  </div>
	</div>
      </div>
 /footer -->
    </div>
  </div>
<!--   header end -->
</div>

</body>
</html>


<?php
  if(isset($_POST['q_name'])) {
    
    //give entry in master_table
    $insert_master = $DB->prepare("INSERT INTO master (name,no_questions,duration) VALUES (?,?,?)");
    
    $insert_master->bind_param("sii",$name,$noques,$duration);
    $name=$_POST['q_name'];
    $noques=$_POST['q_noques'];
    $duration=$_POST['q_duration'];
    
    $insert_master->execute();
    $insert_master->close();
    //create seperate table
      //get_id
	$id_query = mysqli_query($DB,"SELECT id from master WHERE 1 ORDER BY id");
	while($row = mysqli_fetch_array($id_query))
	{
	    $new_id=$row['id'];
	}
      //id_received
      
      //give t_id
	$table_name = "q{$new_id}";
	echo $table_name;
	$insert_master_tname = $DB->prepare("UPDATE master SET table_name=? where id=?");
	$insert_master_tname->bind_param("si",$table_name,$new_id);
	$insert_master_tname->execute();
	$insert_master_tname->close();
      //t_id given
      
    
    $table_name_main = $table_name."_main";
    $create_table_main = $DB->prepare("CREATE TABLE {$table_name_main} (no INT, question TEXT, o1 TEXT, o2 TEXT, o3 TEXT, o4 TEXT, answer INT)");
    $create_table_main->execute();
    $create_table_main->close();
    
    $table_name_users = $table_name."_users";
    $create_table_users = $DB->prepare("CREATE TABLE {$table_name_users} (id INT AUTO_INCREMENT PRIMARY KEY, fname TEXT, lname TEXT, username TEXT, password TEXT, start_time INT DEFAULT NULL, time_taken INT DEFAULT NULL, finished INT DEFAULT 0, score INT DEFAULT 0)");
    $create_table_users->execute();
    $create_table_users->close();
    
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_quiz.php?id={$new_id}\">";
  }
?>

