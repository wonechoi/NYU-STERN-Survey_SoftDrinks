<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "q5"){
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
					<p class="question"> How many people are in your household (including yourself)? </p>
					<form action="../survey.php" method="post">
						<input type="hidden" name="qNum" value="Q5">
						<label for="1person" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q5" id="1person" value="1 person" required> &nbsp;1 person </div>
						</label>
						<label for="2people" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q5" id="2people" value="2 people"> &nbsp;2 people </div>
						</label>
						<label for="3people" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q5" id="3people" value="3 people"> &nbsp;3 people </div>
						</label>
						<label for="4people" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q5" id="4people" value="4 people"> &nbsp;4 people </div>
						</label>
						<label for="5people" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q5" id="5people" value="5 people"> &nbsp;5 people </div>
						</label>
						<label for="morePeople" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q5" id="morePeople" value="More than 5 people"> &nbsp;More than 5 people </div>
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