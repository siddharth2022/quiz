
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

<div class="container-fluid wrapper">
<!--   header -->
  <!--<div class="row header">
    <div class="col-xs-2">
    Quiz Corner
    </div>
  </div>-->
  
  <div class="row main-body">
    <div class="col-xs-3 left-panel">
      <center><h2>Admin</h2></center>
      <hr>
      
      <div class="nav-menu">
	<a href="create_quiz.php">
	<div class="menu-item active">
	  Create new
	</div>
	</a>
	<a href="edit_quiz.php">
	<div class="menu-item">
	  Edit
	</div>
	</a>
	<a href="view_quiz.php">
	<div class="menu-item">
	  Have a look
	</div>
	</a>
	<a href="logout.php">
	<div class="menu-item">
	  Logout
	</div>
	</a>
      </div>
      
    </div>
 
    <div class="col-xs-9 bcontent" style="border: 0px solid #000000;">
<!--     content goes here -->
      <form action="" method="post">
	<input type="text" name="q_name" id="q_name" placeholder="Name"><br><Br>
	<input type="text" name="q_noques" id="q_noques" placeholder="No. of questions"><br><Br>
	<input type="text" name="q_duration" id="q_duration" placeholder="Duration"><Br><br>
	<input type="submit" value="Create">
      </form>
    </div>
  </div>
<!--   header end -->
</div>

</body>
</html>


<?php
  include("config.php");
  session_Start();
?>


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
    
//     echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz.php\">";
  }
?>

