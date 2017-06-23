<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | CSI quiz corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="js/jquery.js"></script>
  <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
		<div class="row">
		  <div class="col-md-9">
		    <a href="#" class="thumbnail">
		      <img src="images/dditlogo.jpeg" alt="image error">
		    </a>
		  </div>
            </div>

        </div>
 </nav>

<?php
include("config.php");
session_start();

if(isset($_COOKIE['quiz_id'])) {
  setcookie("quiz_id", "", time()-3600, "/");
}
if(isset($_SESSION['user'])) {
  setcookie("user", "", time()-3600, "/");
}

if(isset($_POST['login_quiz'])) {
  //$_SESSION['quiz_id'] = $_POST['quiz_id'];
  setcookie("quiz_id", $_POST['quiz_id'], time() + (86400 * 30), "/");
  //redirect to login.php
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";

}
?>

<div class="containerbody">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
		<div class="row">
		  <a href="" class="thumbnail">
				      <img src="images/csi.jpg" alt="image error" style="width: 50%; height: 50%">
		  </a>
		</div>
		<div class="row">
			<!--<div class="col-md-3">
				<a href="" class="thumbnail">
				      <img src="csi.jpg" alt="image error">
				    </a>
			</div>-->
			<div class="col-md-12" style="border-left: 0px solid #ffffff;">
			    	<h4>Select Quiz</h4>

			      <div class="container-fluid">

				<?php
				
				  $fetch_quiz = mysqli_query($DB,"SELECT * FROM master WHERE available=1 ORDER BY id DESC");

				  while($row = mysqli_fetch_assoc($fetch_quiz))
				  {
//       echo "<li class=\"list-group-item\">";
//       echo "{$row['name']}"." -- "."<form action='' method='post'><input type='hidden' name='quiz_id' value='{$row['id']}'><input type='submit' value='Enter' name='login_quiz'></form>";
//       echo "</li>";
//     }
				?>

				<div class="row quiz-list-row">
				  <div class="col-xs-9 quiz-name">
				    <?php echo $row['name']; ?>
				  </div>
				  <div class="col-xs-3">
				  <form action='' method='post'>
					<input type='hidden' name='quiz_id' value='<?php echo $row['id'];?>'>
					<input type='submit' class=' quiz-select-button' value='Enter' name='login_quiz'>
					</form>
				  </div>
				</div>
				<?php
				}
				?>
			      </div>
			</div>
               </div>

        </div>
    </div>
</div>





</body>

</html>
