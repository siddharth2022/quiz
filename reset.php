<?php
  include("config.php");
  
  $q = mysqli_query($DB,"UPDATE q{$_COOKIE['quiz_id']}_users SET start_time=NULL,finished=0, score=0 WHERE id={$_COOKIE['user']}");
  setcookie("{$_COOKIE['quiz_id']}_{$_COOKIE['user']}_start_time", time(), time()-7200, "/");
  setcookie("user", time(), time()-7200, "/");
  setcookie("quiz_id", time(), time()-7200, "/");
  
  echo "done";
  
?>