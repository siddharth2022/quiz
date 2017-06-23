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

<script type="text/javascript">
function quiz_selected(id)
{
  document.location="view_quiz.php?id="+id;
}
</script>

<body>
<?php
  include("config.php");
  session_start();
  if(isset($_GET['id'])) {
    $_GET['id'] = intval($_GET['id']);
  }
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
      <img src="csi.jpg" width="50%" height="50%">
      <h4>CSI Quiz Corner</h4>
      </center>
      <hr>
      
      <div class="nav-menu">
	<a href="create_quiz.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-plus"></span> Create new
	</div>
	</a>
	<a href="edit_quiz.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-pencil"></span> Edit
	</div>
	</a>
	<a href="monitor_quiz.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-time"></span> Monitor
	</div>
	</a>
	<a href="view_quiz.php">
	<div class="menu-item active">
	  <span class="glyphicon glyphicon-list-alt"></span> Have a look
	</div>
	</a>
	<a href="logout.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-off"></span> Logout
	</div>
	</a>
      </div>
      
    </div>
 
    <div class="col-xs-9 bcontent" style="border: 0px solid #000000;">
<!--     content goes here -->
      <div class="container-fluid">
	<div class="row">
	  <div class="col-xs-11">
	    <div class="form-group">
	      <label for="quiz">Select quiz</label>
	      <select class="form-control" name="quiz" id="quiz" onchange="quiz_selected(this.value)">
		<?php
		  $query = mysqli_query($DB,"SELECT * FROM master WHERE 1 ORDER BY id DESC");
		  while($row = mysqli_fetch_assoc($query))
		  {
		    if(isset($_GET['id']) && ($_GET['id']==$row['id'])) {
		      echo "<option value={$row['id']} selected>{$row['name']}</option>";
		    }
		    echo "<option value={$row['id']}>{$row['name']}</option>";
		  }
		?>
	      </select>
	    </div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-xs-11"><br><Br>
	    <table class="table table-bordered">
	      <tr>
		<th>#</th><th>Name</th><th>Score</th>
	      </tr>
	      <?php
		$table = "q{$_GET['id']}_users";
		$get_result = mysqli_prepare($DB,"SELECT id,fname,lname,score FROM {$table} WHERE 1 ORDER BY score DESC, time_taken ASC");

// 		mysqli_stmt_bind_param($get_result,'s',$table);
		$i=1;
		mysqli_stmt_execute($get_result);
		mysqli_stmt_bind_result($get_result,$id,$fname,$lname,$score);
		while(mysqli_stmt_fetch($get_result)) {
		  echo "<tr><td>{$i}</td><td>{$fname} {$lname}</td><td>{$score}</td></tr>";
		  $i+=1;
		}
	      ?>
	    </table>
	  </div>
	</div>
      </div>
    </div>
  </div>
<!--   header end -->
</div>
<script type="text/javascript">
var last = document.getElementById("quiz").value;
<?php
if(!(isset($_GET['id']))) {
?>
quiz_selected(last);
<?php
}
?>
</script>
</body>
</html>