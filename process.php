<html>
<head></head>
<body>
<?php
/*
1. Set finished flag
2. Set time taken
3. Update score
*/

include("config.php");

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

if(isset($_POST['time'])) {

    $table = "q".$quiz_id."_users";
    $table_main = "q".$quiz_id."_main"; 
//     echo $table;
    
    $finish_flag = mysqli_query($DB,"UPDATE {$table} SET finished=1 WHERE id={$user_id}");
    
    $time_taken = mysqli_query($DB,"UPDATE {$table} SET time_taken={$_POST['time']} WHERE id={$user_id}");
    
    //update score
      //calculate
      $answer = mysqli_query($DB,"SELECT * FROM {$table_main} WHERE 1");
      while($row = mysqli_fetch_assoc($answer))
      {
	$num = "{$row['no']}";
	if(isset($_POST[$num])) {
	  if(intval($row['answer']) == intval($_POST[$num])) {
	    $q = mysqli_query($DB,"UPDATE q{$quiz_id}_users SET score=score+1 WHERE id={$user_id}");
	  }
	  else {
// 	    echo "{$row['no']} incorrect";
	  }
	}
      }
    //updated
    
    //delete cookies
      setcookie("{$quiz_id}_{$user_id}_start_time", time(), time()-7200, "/");
      setcookie("user", time(), time()-7200, "/");
      setcookie("quiz_id", time(), time()-7200, "/");
    //cookies deleted	
    echo "finished";
}
else {
  echo "Invalid";
}

   echo "<meta http-equiv=\"refresh\" content=\"0;URL=finish.php\">"; 
        
?>
</body>
</html>