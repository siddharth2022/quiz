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
  
  <style type="text/css">
  body
  {
    background-color: #f2635f;
  }
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
  
  ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #e5e5e5;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #e5e5e5;
    opacity:  1;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #e5e5e5;
    opacity:  1;	
  }
  :-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    #e5e5e5;
  }
  </style>
</head>

<body>
<?php
  include("config.php");
  session_start();
?>
<div class="outer">
<div class="middle">
<div class="inner">

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4 login-box">
      <div class="container-fluid">
	<div class="row">
	  <div class="col-xs-6 col-xs-offset-3" style=" border: 0px solid #ff0000;">
	    <img src="csilogo.png" style="height: 100%; width: 100%;">
	  </div>
	</div>
	<hr>
	<div class="row">
	  <form action="" method="post" class="admin-login-form">
	    <input type="password" name="password" class="text-input" placeholder="PASSWORD"><br>
	    <div class="wrong-pass">
	      <?php
		if(isset($_POST['password'])) {
		  if($_POST['password'] == "knock") {
		    $_SESSION['admin']=1;
		    echo "<meta http-equiv=\"refresh\" content=\"0;URL=create_quiz.php\">";
		  }
		  else
		  {
		    echo "Access denied ..!";
		  }
		}
	      ?>
	    </div>
	    
	    <input type="submit" name="login" value="LOGIN" class="submit-btn">
	  </form>
	</div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>

</body>
</html>