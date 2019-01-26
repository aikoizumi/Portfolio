<?php
session_start();

$dsn = 'mysql:dbname=Soy japanese;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->query('SET NAMES utf8');

 if(!isset($_SESSION['test_myself'])){
   header('Location: index.php');
   exit();
}

   $name = $_SESSION['test_myself']['name'];
   $number = $_SESSION['test_myself']['number'];
   $people = $_SESSION['test_myself']['people'];
   $date = $_SESSION['test_myself']['date'];
   $time = $_SESSION['test_myself']['time'];
   $content = $_SESSION['test_myself']['content'];

  if(!empty($_POST)){
   
  $sql = 'INSERT INTO `reservation`(`name`,`date`,`phone`,`time`,`guest`,`comments`) VALUES(?,?,?,?,?,?);';
  $data = [$name,$date,$number,$time,$people,$content];
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);

  header('Location: thanks.php');
  exit();
  }
  ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>check.reservation</title>
    <!DOCTYPE html>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>reservation</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="booking-form">
    <h2 style="border-bottom:2px solid lightgray;">Check form</h2>
      <span class ="" style="font-size: 20px;">Your name</span>
        <p style="margin-left:20px;"><?php echo $name;?></p>
      <div class = ""style="font-size: 20px;">Phone</div>
        <p style="margin-left:20px;"><?php echo $number;?></p>
      <div class="" style="font-size: 20px;">People</div>
        <p style="margin-left:20px;"><?php echo $people;?></p>
      <div class="" style="font-size: 20px;">Date</div>
        <p style="margin-left:20px;"><?php echo $date;?></p>
      <div class="" style="font-size: 20px;">Time</div>
        <p style="margin-left:20px;"><?php echo $time;?></p>
      <div class="" style="font-size: 20px;">Content</div>
        <p style="margin-left:20px;"><?php echo $content;?></p>
      <form method="POST" action="check.php">
      <a href="index.php?action=rewrite" class="btn btn-default" style="float:right">&laquo;&nbsp;Back</a>
      <input type="hidden" name="action" value="submit">

      <input style = "float:right" type="submit" class="btn btn-primary" value="submit">
  </div>
    </form>
<script>
 

</script>
</body>