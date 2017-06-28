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
  session_start();
  if(isset($_GET['id'])) {
    $_GET['id'] = intval($_GET['id']);
    $id = intval($_GET['id']);
  }
  if(isset($_GET['uid'])) {
    $_GET['uid'] = intval($_GET['uid']);
    $uid = $_GET['uid'];
  }
?>


<?php

  if(!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
  }
?>

<?php
  if(isset($_POST['update'])) {
  $qid = intval($_POST['qid']);
  $uid = intval($_POST['uid']);
    $update = $DB->prepare("UPDATE q{$qid}_users SET fname=?, lname=?, username=?, password=?, start_time=?, finished=?, score=? WHERE id=?");
    if($_POST['start_time'] == "" || $_POST['start_time'] == "0") { $_POST['start_time'] = NULL; }
    $update->bind_param("ssssiiii",$_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password'],$_POST['start_time'],$_POST['finished'],$_POST['score'],$uid);
    
    $update->execute();
  }
?>

<script type="text/javascript">
function quiz_selected(id)
{
  document.location="monitor_quiz.php?id="+id;
}
</script>

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
	<div class="menu-item active">
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
	<?php if(isset($_GET['uid'])) { ?>
	<div class="row">
	  <div class="col-xs-11"><br>
	    <form action="" method="post">
	      <table class="table">
		
		<?php
		  $get_data = mysqli_query($DB,"SELECT * FROM q{$id}_users WHERE id={$uid}");
		  
		  while($row = mysqli_fetch_assoc($get_data)) {
		?>
		<tr>
		  <td style="width: 3em;">
		  <input type="text" name="id" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['id']; ?>" disabled>
		  </td>
		  
		  <td style="width: 7em;">
		  <input type="text" name="fname" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['fname']; ?>">
		  </td>
		  
		  <td style="width: 7em;">
		  <input type="text" name="lname" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['lname']; ?>">
		  </td>
		  
		  <td style="width: 12em;">
		  <input type="text" name="username" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['username']; ?>">
		  </td>
		  
		  <td style="width: 5.5em;">
		  <input type="text" name="password" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['password']; ?>">
		  </td>
		  
		  <td style="width: 8em;">
		  <input type="text" name="start_time" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['start_time']; ?>">
		  </td>
		  
		  <td style="width: 4em;">
		  <input type="text" name="finished" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['finished']; ?>">
		  </td>
		  
		  <td style="width: 4em;">
		  <input type="text" name="score" style="border: 1px solid #d0d0d0; width: 100%; text-align: center;" 
		  value="<?php echo $row['score']; ?>">
		  </td>
		  
		</tr>
		
		<tr>
		  <td>
		    <input type="hidden" name="qid" value="<?php echo $id; ?>">
		  </td>
		  <td>
		    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
		  </td>
		  <td></td><td></td><td></td><td></td><td></td>
		  <td><input type="submit" value="Update" name="update"></td>
		</tr>
		<?php } ?>
	      </table>
	    </form>
	  </div>
	</div>
	<?php } ?>
	<div class="row">
	  <div class="col-xs-11"><br><Br>
	    <table class="table table-bordered">
	    
	      <tr>
		<th>ID</th><th>First name</th><th>Last name</th><th>Username</th><th>Password</th>
		<th>Start time</th><th>Finished</th><th>Score</th>
	      </tr>
	      
	      <?php
		$table = "q{$_GET['id']}_users";
		$get_result = mysqli_prepare($DB,"SELECT id,fname,lname,username,password,start_time,finished,score FROM {$table} WHERE 1 ORDER BY score DESC, time_taken ASC");

// 		mysqli_stmt_bind_param($get_result,'s',$table);
		$i=1;
		mysqli_stmt_execute($get_result);
		mysqli_stmt_bind_result($get_result,$id,$fname,$lname,$username,$password,$start_time,$finished,$score);
		while(mysqli_stmt_fetch($get_result)) {
		  echo "<tr class='clickable-row' data-href='?id={$_GET['id']}&uid={$id}'>
		  <td>{$id}</td>
		  <td>{$fname}</td>
		  <td>{$lname}</td>
		  <td>{$username}</td>
		  <td>{$password}</td>
		  <td>{$start_time}</td>
		  <td>{$finished}</td>
		  <td>{$score}</td>
		  </tr>";
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

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});

</script>

</body>
</html>