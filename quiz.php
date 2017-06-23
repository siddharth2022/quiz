<!DOCTYPE html>
<html lang="en">
<?php

  include("config.php");
  session_start();

  $get_name = mysqli_query($DB,"SELECT * FROM master WHERE id={$_COOKIE['quiz_id']}");
  while($row=mysqli_fetch_assoc($get_name)) {
    $quiz_name = $row['name'];
  }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $quiz_name;?> | CSI Quiz Corner</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">
    
    
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    
</head>

<body>
<!--
1. If user submited, exit
2. check if timer is already set.
3. If timer set, continue.
4. Else, set timer now.
-->

<?php

  if(!isset($_COOKIE['quiz_id'])) {
           echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz_home.php\">";
        }
        else {
	  $quiz_id = $_COOKIE['quiz_id'];
        }

        if(!isset($_COOKIE['user'])) {
           echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
        }
        else {
	  $user_id = $_COOKIE['user'];
	}

  $check = mysqli_query($DB, "SELECT * FROM q{$quiz_id}_users WHERE id={$user_id}");
  while($row = mysqli_fetch_assoc($check)) {

    //if sumitted once
    if($row['finished']==1) {
      die("Go home buddy ..! It's over.");
    }

    //check whether to set cookie
    $timer_cookie = "{$quiz_id}_{$user_id}_start_time";
    if($row['start_time']) {
	//if cookie deleted or tampered
	if(!(isset($_COOKIE[$timer_cookie])) || (intval($row['start_time']) != intval($_COOKIE[$timer_cookie]))) {
// 	echo "<script type='text/javascript'>alert('f');</script>";
	setcookie("{$quiz_id}_{$user_id}_start_time", $row['start_time'], time()+7200, "/");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz.php\">";
      }
    }
    else {
      //if not started tet
      setcookie("{$quiz_id}_{$user_id}_start_time", time(), time()+7200, "/");
      $t = time();
      $set_start_time = mysqli_query($DB, "UPDATE q{$quiz_id}_users SET start_time={$t} WHERE id={$user_id}");
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz.php\">";
    }
  }
?>

<?php
  $timer_cookie = "{$quiz_id}_{$user_id}_start_time";
  //echo $timer_cookie;
  if(isset($_COOKIE[$timer_cookie])) {
    $time_gone= intval(time()) - intval($_COOKIE[$timer_cookie]);
    //echo intval(time())." - ".intval($_COOKIE[$timer_cookie]);
  }
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
		<div class="row">
		  <div class="col-md-2">
		    <!--<a href="#" class="thumbnail">-->
		      <img src="images/dditlogo.jpg" alt="..." style="height: 100px; width: 120px;">
		    <!--</a>-->
		  </div>
		</div>
  </div>
	<div class="timer nav navbar-nav navbar-right" style="margin-top:0px;color: #ffffff;">
	  <span>Time &nbspleft :</span>
	  <!--<span class="min" id="min"> </span>
	  <span> : </span>
	  <span class="sec" id="sec"> </span>-->
	  <span id="display_timer"></span>
	</div>
 </nav>

 <!-- Sidebar -->
    <div id="sidebar-wrapper" class="">
        <nav id="spy">
          <ul class="sidebar-nav nav">
                <li class="sidebar-brand "> <a href="" class="text-muted"><span class="fa fa-home solo">Home</span></a>

                </li>
           <?php 
            $total_ques = mysqli_num_rows(mysqli_query($DB,"SELECT * FROM q{$quiz_id}_main")); 
            for ($x = 1; $x <= $total_ques; $x++)
            {
            ?>
           
                <li class="sidebar-brand "> <a href="<?php echo "#".$x ?>" ><span id="<?php echo "cb_".$x?>"><?php echo "Question.".$x ?></span></a>

                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>


<div class="containerbody">
<div class="row">
<div class="col-md-8 col-md-offset-3">
    <form id="f" action="process.php" method="post" onsubmit="return submi();">
<center>
<h1 class="text">
<?php echo $quiz_name; ?>
</h1>
</center>
<!--<h3 style="text-align:center;color: white;text-shadow: 2px 2px 3px #000000;">the battle of brains</h3>-->
<br>
<hr>


<?php
      $get_ques = mysqli_query($DB,"SELECT * FROM q{$quiz_id}_main WHERE 1");
      while($ques = mysqli_fetch_assoc($get_ques)) {
    ?>
    <legend id="<?php echo "{$ques['no']}"?>" class=""></legend>
    <div class="jumbotron ques">
    <h3 >Question <?php echo "{$ques['no']}"?></h3>
    
	  <p><?php echo "{$ques['question']}"; ?></p>

	    <div class="radio">
	      <label><input type="radio" value="1" name="<?php echo "{$ques['no']}"; ?>"><?php echo "{$ques['o1']}"; ?></label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" value="2" name="<?php echo "{$ques['no']}"; ?>"><?php echo "{$ques['o2']}"; ?></label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" value="3" name="<?php echo "{$ques['no']}"; ?>"><?php echo "{$ques['o3']}"; ?></label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" value="4" name="<?php echo "{$ques['no']}"; ?>"><?php echo "{$ques['o4']}"; ?></label>
	      
            <div class="checkbox text-primary text-center">  <label><input type="checkbox"  name="<?php echo "cb_"."{$ques['no']}"; ?>" value="true">Mark for Review</label></div>
	    </div>
	    </div>
  <hr>
  <?php
  }
  ?>
  <div class="text-center"><input type="submit" class="btn btn-success btn-lg" value="Submit" name="submitted"></div>
  
  <input type="hidden" id="time" name="time" value="<?php echo $time_gone;?>">

</form>

    </div></div></div>




<!-- THE QUIZ  -->

<!-- THE QUIZ ENDS HERE -->

<script src="js/jquery.js"></script>
<script src="js/jquerycookie.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/cookies.js"></script>
    <script type="text/javascript">

    function submi()
    {
      return confirm("Are you sure you want to submit ?");
    }

    function subm()
    {
  //alert("Quiz over;");
//   alert(document.getElementById("f"));
      document.getElementById("f").submit();
    }
    </script>
<!-- timer handler -->
<script type="text/javascript">

function disp(totalSec)
{
  var hours = parseInt( totalSec / 3600 ) % 24;
  var minutes = parseInt( totalSec / 60 ) % 60;
  var seconds = totalSec % 60;

var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

document.getElementById("display_timer").innerHTML = result;
}

function inc_sec()
{
  var current_value = document.getElementById("time").value;
  current_value = parseInt(current_value);
  current_value++;
  document.getElementById("time").value = current_value;

  <?php
    $get_time = mysqli_query($DB,"SELECT duration FROM master WHERE id={$quiz_id}");
    if($get_time_row = mysqli_fetch_assoc($get_time)) {
      $max_time = $get_time_row['duration'];
      echo $max_time;
    }
  ?>

  var max_time = <?php echo $max_time; ?>;
  if(current_value >= parseInt(max_time) ) {
     subm();
  }

  disp(max_time-current_value);
  t = setTimeout(function() {inc_sec()}, 1000);
}
inc_sec();
</script>
<!-- timer handler end -->

</body>
</html>
