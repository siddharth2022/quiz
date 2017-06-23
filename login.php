<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | CSI quiz corner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
      .outer {
    display: table;
    position: absolute;
    height: 100%;
    width: 100%;
  }

  .middle {
    display: table-cell;
    vertical-align: middle;
  }

  .inner {
    margin-left: auto;
    margin-right: auto; 
    width: /*whatever width you want*/;
  }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header" >
		<div class="row">
		  <div class="col-md-9">
		    <a href="#" class="thumbnail">
		      <img src="images/dditlogo.jpg" alt="image error">
		    </a>
		  </div>
		</div>
            </div>
        </div>
 </nav>
<?php
  include("config.php");
  session_start();

if(!(isset($_COOKIE['quiz_id']))) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=quiz_home.php\">";
}
else {
    $quiz_id=$_COOKIE['quiz_id'];
}

  if(isset($_COOKIE['user'])) {
    setcookie("user", "", time()-3600, "/");
    //echo "<meta http-equiv=\"refresh\" content=\"0;URL=start.php\">";
  }
?>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    
    
<div class="outer">
<div class="middle">
<div class="inner">    
<div class="containerbody">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
		<div class="row">
			<div class="col-md-6">
				<a href="" class="thumbnail">
				      <img src="images/csi.jpg" alt="image error" />
				    </a>
			</div>
			<div class="col-md-6">
			    	<h4>Login</h4>

			    <form id="form" name="form" method="post" action="">
				    <input type="text" id="username" name="username" class="form-control input-sm chat-input" placeholder="username" />
				    </br>
				    <input type="password" name="password" id="password" class="form-control input-sm chat-input" placeholder="password" />
				    </br>
				    <div class="wrapper">
				    <span class="group-btn">
					<input class="btn btn-primary btn-md" type="submit" value="Login">
				    </span>
				    </div>
			    </form>
            		</div>
               </div>

        </div>
    </div>
</div>

</div>
</div>
</div>

<?php
//when submitt check from database and re
     if((isset($_POST['username'])))
     {
      $stmt = $DB->prepare("SELECT id,fname,lname,username FROM q{$quiz_id}_users WHERE username=? AND password=?");

      $username=$_POST['username'];
      $password=$_POST['password'];

      $stmt->bind_param("ss", $username, $password);

      $stmt->execute();
      $stmt->bind_result($user_id,$user_fname,$user_lname,$user_username);
      //if row found set userid as cookie
      if($stmt->fetch()) {

	  setcookie("user", $user_id, time() + (86400 * 30), "/");


	  echo "<meta http-equiv=\"refresh\" content=\"0;URL=start.php\">";
      }

      $stmt->close();
    }
?>
</body>

</html>
