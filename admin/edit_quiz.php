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

function update_duration(time)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
//       alert(window.location.href+"&action=updatetimer&time="+time);
      alert("updated");
    }
  };
  xhttp.open("GET", ""+window.location+"&action=updatetimer&time="+time, true);
  xhttp.send();
}

function enab()
{
//   alert("K");
  document.getElementById("duration").disabled=false;
}
</script>

<body>

<body>
<?php
include("config.php");
session_start();
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
      
      <div class="nav-menu">
	<a href="create_quiz.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-plus"></span> Create new
	</div>
	</a>
	<a href="edit_quiz.php">
	<div class="menu-item active">
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
	    <a href="subjective_answers.php">
  <div class="menu-item">
    <span class="glyphicon glyphicon-check"></span> Subjective Answers
  </div>
  </a>
	<a href="logout.php">
	<div class="menu-item">
	  <span class="glyphicon glyphicon-off"></span> Logout
	</div>
	</a>
      </div>
      
      
    </div>
    <div class="col-xs-9 bcontent" style="border: 0px solid #000000; margin-top: -2em;">
<!--     content goes here -->

    <?php
	if(isset($_GET['id'])) {
	$getid = intval($_GET['id']);
	$_GET['id'] = intval($_GET['id']);
	$qx = "q{$getid}";
    ?>
    
    <div class="container-fluid">
      <div class="row">
	<div class="col-xs-12" style="color: #707070;">
	  <h4>
	  <?php
	    $get_name = mysqli_query($DB,"SELECT name FROM master WHERE id={$_GET['id']}");
	    if($row = mysqli_fetch_assoc($get_name)) {
		echo $row['name'];
	    }
	  ?>
	  </h4><hr>
	</div>
      </div>
      <div class="row">
	<div class="col-xs-4">
	  <div class="panel panel-default">
	    <div class="panel-heading">Update users Data</div>
	    <div class="panel-body">
	      <form name="import" method="post" enctype="multipart/form-data">
	      <input type="file" name="user_file" /><br />
	      <input type="submit" name="users" value="Submit" />
	      </form>
	      <hr>
		<center><a href="?id=<?php echo $_GET['id']; ?>&action=clear_users"><button type="button" class="btn btn-default">Clear</button></a> </center>
	    </div>
	  </div>
	</div>
	<div class="col-xs-4">
	  <div class="panel panel-default">
	    <div class="panel-heading">Upload questions</div>
	    <div class="panel-body">
	      <form name="import" method="post" enctype="multipart/form-data">
	      <input type="file" name="ques_file" /><br />
	      <input type="submit" name="questions" value="Submit" />
	      </form>
	      <hr>
		<center><a href="?id=<?php echo $_GET['id']; ?>&action=clear_questions"><button type="button" class="btn btn-default">Clear</button></a> </center>
	    </div>
	  </div>
	</div>
	
	<div class="col-xs-4">
	  <div class="panel panel-default" >
	    <div class="panel-heading">Operation</div>
	    <div class="panel-body">
	      
	      <?php 
		$get_status = mysqli_query($DB,"SELECT available,duration FROM master WHERE id={$_GET['id']}");
		if($r = mysqli_fetch_assoc($get_status)) {
		  $stat = $r['available'];
		  $duration=$r['duration'];
		}
		
		if($stat==1) {
	      ?>
	      <center><a href="?id=<?php echo $_GET['id']; ?>&action=disable"><button type="button" class="btn btn-default" style="width: 80%;">Disable</button></a> </center>
	      <br>
	      <?php } else { ?>
	      <center><a href="?id=<?php echo $_GET['id']; ?>&action=enable"><button type="button" class="btn btn-default" style="width: 80%;">Enable</button></a> </center>
	      <br>
	      <?php } ?>
	      
	      <center><a href="?id=<?php echo $_GET['id']; ?>&action=delete"><button type="button" class="btn btn-default" style="width: 80%;">Delete</button></a> </center>
	      <br>
	      
	      <center><div style="width: 80%;">
		<span onclick="enab();"><b> -> </b></span><input type="text" id="duration" style="width: 50%;" value="<?php echo $duration; ?>"  disabled>
		<input type="submit" style="width: 35%" value="Update" onclick="update_duration(document.getElementById('duration').value);">
	      </div></center>
	    </div>
	  </div>
	</div>
	
	
      </div>
      <div class="row">
	<div class="col-xs-9">
	    
	</div>
      </div>
    </div>
<?php
}
function password() {
    $array = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $arr_length = strlen($array) - 1;
    for ($i = 0; $i<6; $i++) {
        $n = rand(0, $arr_length);
        $pass[] = $array[$n];
    }
    return implode($pass);
  }
/*
$hostname = "localhost";
$username = "root";
$password = "bhargav";
$database = "quiz_master";
$conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
mysql_select_db("$database", $conn) or die(mysql_error());
*/
if(isset($_GET['action']))
{
  if($_GET['action']=="clear_users") {
      $stmt = mysqli_query($DB,"TRUNCATE TABLE q{$_GET['id']}_users");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=?id={$_GET['id']}\">"; 
  }
  
  if($_GET['action']=="clear_questions") {
      $stmt = mysqli_query($DB,"TRUNCATE TABLE q{$_GET['id']}_main");
      $stmt = mysqli_query($DB,"TRUNCATE TABLE q{$_GET['id']}_answers");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=?id={$_GET['id']}\">"; 
  }
  
  if($_GET['action']=="disable") {
      $stmt = mysqli_query($DB,"UPDATE master SET available=0 WHERE id={$_GET['id']}");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_quiz.php?id={$_GET['id']}\">"; 
  }
  
  if($_GET['action']=="enable") {
      $stmt = mysqli_query($DB,"UPDATE master SET available=1 WHERE id={$_GET['id']}");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_quiz.php?id={$_GET['id']}\">"; 
  }
  
  if($_GET['action']=="delete") {
      $stmt = mysqli_query($DB,"DELETE FROM master WHERE id={$_GET['id']}");
      $stmt_u = mysqli_query($DB,"DROP TABLE q{$_GET['id']}_main");
      $stmt_q = mysqli_query($DB,"DROP TABLE q{$_GET['id']}_users");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_quiz.php\">"; 
  }
  
  if($_GET['action']=="updatetimer") {
      $stmt = mysqli_query($DB,"UPDATE master SET duration={$_GET['time']} WHERE id={$_GET['id']}");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=edit_quiz.php?id={$_GET['id']}\">"; 
  }
}
//Update user data
if(isset($_POST["users"]))
{
$file = $_FILES['user_file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$name = $filesop[0];
$project = $filesop[1];
$username = $project."".$name;
$password = password();

$sql = mysqli_query($DB,"INSERT INTO {$qx}_users (fname, lname,username, password) VALUES ('$name','$project','$username','$password')");
$sql = mysqli_query($DB,"INSERT INTO {$qx}_answers (score) VALUES (0)");
$c = $c + 1;
}

if($sql){
echo "<div class='alert alert-success'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>You database has been imported successfully. You have inserted ". $c ." recoreds </div>";
}else{
echo "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Sorry, there was some problem uploading or processing your file.</div>";
}

}
//Update questions
if(isset($_POST["questions"]))
{
$file = $_FILES['ques_file']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
$no = $filesop[0];
$name = $filesop[1];
$project = $filesop[6];
$o1 = $filesop[2];
$o2 = $filesop[3];
$o3 = $filesop[4];
$o4 = $filesop[5];
$tag = $filesop[7];
$project = intval($project);
$sql = mysqli_query($DB,"INSERT INTO {$qx}_main (no,question,o1,o2,o3,o4,answer,tag) VALUES ($no,'$name','$o1','$o2','$o3','$o4',$project,$tag)");
if($tag == 1)
{
	$sub2 = mysqli_query($DB,"ALTER TABLE {$qx}_answers ADD a{$no} TEXT ");
}
$c = $c + 1;
}

if($sql){
echo "<div class='alert alert-success'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>You database has been imported successfully. You have inserted ". $c ." recoreds </div>";
}else{
echo "<div class='alert alert-danger'><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Sorry, there was some problem uploading or processing your file.</div>";
}

}
?>


  <center>  <div class="container-fluid">
      <div class="row">
	<div class="col-xs-4 <?php if(!(isset($_GET['id']))) { echo "col-xs-offset-4"; } ?>">
	<div class="panel panel-default">
	<div class="panel-heading">Click to edit</div>
	<div class="panel-body">
	<?php
	  $fetch_quiz_query = mysqli_query($DB,"SELECT * FROM master WHERE 1 ORDER BY id DESC");
	  echo "<ul class='list-group edit-list'>";
	  while($row = mysqli_fetch_assoc($fetch_quiz_query))
	  {
	    echo "<a href='?id={$row['id']}'><li class='list-group-item'>";
	    echo "{$row['name']}</td>";
	    echo "</li></a>";
	   }
	  echo "</ul>";
	?>
	</div>
	</div>

	</div>
	<?php if(isset($_GET['id'])) { ?>
	<div class="col-xs-8">
	  <div class="panel panel-default" style="padding: 10px;">
	    <ul class="nav nav-tabs">
	      <li class="active"><a data-toggle="tab" href="#users">Users</a></li>
	      <li><a data-toggle="tab" href="#ques">Questions</a></li>
	    </ul>
	    <div class="tab-content">
	      <div id="users" class="tab-pane fade in active" >
		<?php
		  $get_users = mysqli_query($DB,"SELECT * FROM q{$_GET['id']}_users WHERE 1");
		  echo "<br><table class=\"table table-bordered\" style=\"font-weight: normal; font-size: 1.1em; letter-spacing: 1px;\">";
		  echo "<th>ID</th><th>Username</th><th>Password</th>";
		  while($row = mysqli_fetch_assoc($get_users)) {
		    echo "<tr>";
		    echo "<td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['password']}</td>";
		    echo "</tr>";
		  }
		  echo "</table>";
		?>
	      </div>
	      <div id="ques" class="tab-pane fade" style="font-weight: normal; overflow-y: scroll; height:450px;">
		<?php
		  $get_questions = mysqli_query($DB,"SELECT * FROM q{$_GET['id']}_main WHERE 1");
		  echo "<br><table border='0' style='width: 100%;'>";
		  while($row = mysqli_fetch_assoc($get_questions)) {
		    ?>
		      <tr style="border-bottom: 1px solid #d0d0d0;">
			<td style="padding: 3px; width: 2em; text-align: center; vertical-align: top;">
			<?php echo $row['no']; ?>
			</td>
			
			<td style="padding: 3px;">
			  <div class="container-fluid">
			    <div class="row">
			      <div class="col-xs-12">
				<?php echo $row['question']; ?>
			      </div>
			    </div>
			    <br>
			    <?php if($row['tag']==0) { ?>
			    <div class="row">
			      <?php if($row['answer']==1) {echo "<b>";}?><div class="col-xs-3">1. <?php echo $row['o1'];?></div><?php if($row['answer']==1) {echo "</b>";}?>
			      
			      <?php if($row['answer']==2) {echo "<b>";}?><div class="col-xs-3">1. <?php echo $row['o2'];?></div><?php if($row['answer']==2) {echo "</b>";}?>
			      
			      <?php if($row['answer']==3) {echo "<b>";}?><div class="col-xs-3">1. <?php echo $row['o3'];?></div><?php if($row['answer']==3) {echo "</b>";}?>
			      
			      <?php if($row['answer']==4) {echo "<b>";}?><div class="col-xs-3">1. <?php echo $row['o4'];?></div><?php if($row['answer']==4) {echo "</b>";}?>
			    </div>
			    <?php } ?>
			  </div>
			</td>
		      </tr>
		    <?php
		  }
		  echo "</table>";
		?>
	      </div>
	    </div>
	  </div>
	</div>
	<?php } ?>
      
    </div>
    </center>
    </div>
  </div>
<!--   header end -->
</div>

</body>
</html>