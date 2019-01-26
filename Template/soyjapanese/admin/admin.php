<?php
session_start();


$dsn = 'mysql:dbname=Soy japanese;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT * FROM `reservation`';
$data = [];
$stmt = $dbh->prepare($sql);
$stmt->execute($data);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reservation list</title>
</head>
<body>
  <header>
    <h3>Reservation list</h3>
  </header>
  <?php while($row = $stmt->fetch()):?>
  <p>Name:<?php echo $row['name']; ?></p>
  <p>Date:<?php echo $row['date']; ?></p>
  <p>time:<?php echo $row['time']; ?></p>
  <p>Phonenumber:<?php echo $row['phone']; ?></p>
  <p>Guest:<?php echo $row['guest']; ?></p>
  <p style="border-bottom: 3px solid lightgray;">Content:<?php echo $row['comments'];?></p>
<?php endwhile; ?>
</body>
</html>
