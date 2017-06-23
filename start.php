<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Start | CSI Quiz Corner</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">

</script>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</head>

<body>

<?php
include("config.php");
session_start();
?>
    <?php
	if(!isset($_COOKIE['quiz_id'])) {
           echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz_home.php\">";
        }

        if(!isset($_COOKIE['user'])) {
           echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
        }

        $st_time = $_COOKIE['quiz_id']."_".$_COOKIE['user']."_start_time";
        if(isset($_COOKIE[$st_time])) {
           echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz.php\">";
        }

    ?>


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
		<div class="row">
		  <div class="col-md-2">
		    <a href="#" class="thumbnail">
		      <img src="images/ddulogo.jpg" alt="...">
		    </a>
		  </div>


            </div>

        </div>
 </nav>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="containerbody">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
<h1 style="text-align:center;color: white;text-shadow: 2px 2px 3px #0000ff;">
<?php
  $stmt = $DB->prepare("SELECT name FROM master WHERE id=?");
  $stmt->bind_param("s",$_COOKIE['quiz_id']);
  $stmt->execute();
  $stmt->bind_result($name);
  if($stmt->fetch()) {
    echo $name;
  }
?>
</h1>
<!--<h3 style="text-align:center;color: white;text-shadow: 2px 2px 3px #000000;">the battle of brains</h3>-->
<br>
<hr>
            <div class="form-login">

<h4><strong>Welcome !</strong></h4>
<br>
<h5>Please read following instructions carefully before starting the test...</h5>
<br>
<ul>
	<li>Total time to complete the quiz is 60 minutes and all the questions should be answered within this time limit.</li>
<br>
	<li>Once submitted, the answers cannot be updated.</li>
<br>
	<li>There is no negaive marking.</li>
<br>
	<li>All the questions carry equal weightage.</li>
<br>
	<li>If participant is caught in any in-disciplinary actions, he will be disqualified.</li>
</ul>

<br>

<form id="form" name="form" method="post" action="quiz.php">
<div class="wrapper">
<span class="group-btn">
<input class="btn btn-primary btn-md" type="submit" name="start_quiz" value="Start Quiz">
</span>
</form>


            </div>
            </div>

        </div>
    </div>
</div>
</body>

</html>
