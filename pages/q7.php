<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "q7"){
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
				<div class="logoDiv"> </div>
				<div style="padding-left: 3%; padding-right: 3%;">
					<p class="question"> On the following pages, you will read various scenarios about a shopping trip. Imagine that you are buying carbonated soft drinks. Please choose the products that you would want to buy, and decide on the quantities for each product that you choose given a fixed budget. </p>
					<form action="../survey.php" method="post">
						<input type="hidden" name="qNum" value="Q7">
						<div style="text-align: right; margin-top: 3%;">
							<button type="submit" class="nextButtonDiv"> <i class="fas fa-arrow-alt-circle-right nextButton"></i> </button>
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