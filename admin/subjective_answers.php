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
  document.location="subjective_answers.php?id="+id;
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
  <div class="row">
    <div class="col-xs-11"><br><Br>
    <form method="post" onSubmit="return confirm('Do you really want to submit the form?');">
      <table class="table table-bordered">
        <tr>
  
        </tr>
        <?php
    
    $table_main = "q{$_GET['id']}_main";

    $get_result = mysqli_query($DB,"SELECT * FROM {$table_main} WHERE tag=1");
    while($row = mysqli_fetch_assoc($get_result))
    {
      echo "<tr><td><h4><strong>Q.{$row['no']}</strong></h4></td><td><h4><strong>{$row['question']}</strong></h4></td></tr>";
      $col = "a{$row['no']}";
      $table_answers = "q{$_GET['id']}_answers";
      $get_answers = mysqli_query($DB,"SELECT id,{$col} FROM {$table_answers} ");
      while($row_users = mysqli_fetch_row($get_answers))
      {
        echo "<tr><td>id. {$row_users[0]}</td><td>{$row_users[1]}</td><td><input type=\"checkbox\" name=\"submission[]\" value=\"{$row_users[0]}\"></td></tr>";
      }
      

    }
//    mysqli_stmt_bind_param($get_result,'s',$table);
  
        ?>
        
      </table>
      <div class="text-center" style="margin-bottom: 25px;">
      <input class="btn btn-lg  btn-primary" type="submit" name="submit" value="Done">
      </div>
      </form>
    </div>
  </div>
      </div>
    </div>
  </div>
  <?php
    if(isset($_POST['submit']))
    {
      $table_users = "q{$_GET['id']}_users";
        foreach ($_POST['submission'] as $submission) {

          $insert_score_id = $DB->prepare("UPDATE {$table_users} SET score=score+1 where id=?");
          $insert_score_id->bind_param("i",$new_id);
          $new_id=$submission;
          $insert_score_id->execute();
          $insert_score_id->close();
          
          }
  }
  ?>
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