<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "q2"){
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
					<p class="question"> Do you consume soft drinks? </p>
					<form action="../survey.php" method="post">
						<input type="hidden" name="qNum" value="Q2">
						<label for="yes" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q2" id="yes" value="Yes" required> &nbsp;Yes </div>
						</label>
						<label for="no" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q2" id="no" value="No"> &nbsp;No </div>
						</label>
						<label for="dontKnow" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q2" id="dontKnow" value="Dont know"> &nbsp;Don't know </div>
						</label>
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