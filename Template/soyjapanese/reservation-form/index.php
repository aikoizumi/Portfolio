<?php
session_start();

$errors =[];

if(isset($_GET['action']) && $_GET['action'] == 'rewrite'){
      $_POST['input_name'] = $_SESSION['test_myself']['name'];
      $_POST['input_number'] = $_SESSION['test_myself']['number'];
      $_POST['input_people'] = $_SESSION['test_myself']['people'];
      $_POST['input_date'] = $_SESSION['test_myself']['date'];
      $_POST['input_time'] = $_SESSION['test_myself']['time'];
      $_POST['input_content'] = $_SESSION['test_myself']['content'];
//check.phpのphpの遷移が行われないように
         $errors['rewrite'] = true;
      }

if(!empty($_POST)){

  $name = $_POST['input_name'];
  $number = $_POST['input_number'];
  $people = $_POST['input_people'];
  $date = $_POST['input_date'];
  $time = $_POST['input_time'];
  $content = $_POST['input_content'];

  if ($name == ''){
    $errors['name'] = 'blank';
  }
  if ($number ==''){
    $errors['number'] = 'blank';
  } 
  if ($people ==''){
    $errors['people'] = 'blank';
  } 
  if ($date ==''){
    $errors['date'] = 'blank';
  }


  if(empty($errors)){
         $_SESSION['test_myself']['name'] = $name;
         $_SESSION['test_myself']['number'] = $number;
         $_SESSION['test_myself']['people'] = $people;
         $_SESSION['test_myself']['date'] = $date;
         $_SESSION['test_myself']['time'] = $time;
         $_SESSION['test_myself']['content'] = $content;

      header('Location: check.php');
      exit();
  }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<!----POST----->
<form method="POST" action="index.php">
<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<h5>*we will ensure to contact you if the party is over 6 people.</h5>
						</div>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<div class="booking-form">
							<form>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<input class="form-control" type="text" name="input_name">
											<span class="form-label">Name</span>
											<?php if(isset($errors['name']) && $errors['name'] == 'blank'):?>
												<p style="color:red;">Confirm your name</p>
											<?php endif;?>
											</div>
										</div>
									</div>
										<div class="col-md-4">
										  <div class="form-group">
											  <input class="form-control" type="date" name="input_date" required>
											  <span class="form-label">Date</span>
										</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="tel" name="input_number">
											<span class="form-label">Phone</span>
											<?php if(isset($errors['number']) && $errors['number'] == 'blank'):?>
												<p style="color:red;">Confirm your number</p>
											<?php endif;?>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<span class="form-label">Time</span>
											<select class="form-control" name="input_time">
												<option selected="unselected">unselected</option>
												<option>18:00</option>
												<option>18:15</option>
												<option>18:30</option>
												<option>18:45</option>
												<option>19:00</option>
												<option>19:15</option>
												<option>19:30</option>
												<option>19:45</option>
												<option>20:00</option>
												<option>20:15</option>
												<option>20:30</option>
												<option>20:45</option>
												<option>21:00</option>
												<option>Other</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<span class="form-label">Guests</span>
											<select class="form-control" name="input_people">
												<option selected="unselected">unselected</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
												<option>11</option>
												<option>12</option>
												<option>13</option>
												<option>14</option>
												<option>over 15</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea type="content" name="input_content" class="form-control" row="5" placeholder="QUESTION OR REQUIEST" style="height:150px" id="content"></textarea>
										</div>
									</div>
								</div>
								<!--
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="date" required>
											<span class="form-label">Check In</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="date" required>
											<span class="form-label">Check Out</span>
										</div>
									</div>
								</div>--->
								<div class="form-btn">
									<button class="submit-btn">Book Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>