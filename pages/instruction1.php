<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "instruction1"){
		header("Location:./".$_SESSION['order'].".php");
		exit;
	}else {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('../partials/header.html'); ?>
	</head>
<body>
	<main role="main">
		<div class="mainContainer">	
			<div class="logoDiv">
			</div>
			<div style="padding-left: 3%; padding-right: 3%;">
				<p class="question">
					In this set of questions, you will be asked for some background information about your purchase behavior.
				</p>
				
				<form action="../survey.php" method="post">
					<input type="hidden" name="qNum" value="instruction1">
					<div style="text-align: right; margin-top: 3%;">
						<button type="submit" class="nextButtonDiv">
							<i class="fas fa-arrow-alt-circle-right nextButton"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</main>
</body>
</html>
<?php
	}
?>