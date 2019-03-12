<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(isset($_SESSION['order'])) {
		header("Location:./".$_SESSION['order'].".php");
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
				<div class="logoDiv logo"> </div>
				<div style="padding-left: 3%; padding-right: 3%;">
					<h3 style="margin-bottom: 3%;"> IBR INTRO (later on)</h3>
					<p class="question"> &nbsp;&nbsp;&nbsp;&nbsp;This is a study about understanding consumer preferences and behavior in the carbonated soft drinks market. Carbonated soft drinks are non-alcoholic beverages that contain carbonated water, a sweetener, and a natural or artificial flavoring. For examples, Coke, Pepsi, Mountain Dew, Dr Pepper, and cream soda are classified as carbonated soft drinks. </p>
					<p class="question"> &nbsp;&nbsp;&nbsp;&nbsp;In the following sections, we ask several questions about your carbonated soft drink consumption behavior and ask you to choose products given different scenarios. </p>
					<p class="question"> &nbsp;&nbsp;&nbsp;&nbsp;We thank you in advance for investing your time to allow us to have a better understanding of the carbonated soft drinks market. </p>
					<p class="question">
						<br>Do you consent to participate in this research project? </p>
					<form action="../survey.php" method="post">
						<input type="hidden" name="qNum" value="Q1">
						<label for="agree" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q1" id="agree" value="I agree" required> &nbsp;I agree </div>
						</label>
						<label for="disagree" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="Q1" id="disagree" value="I disagree"> &nbsp;I disagree </div>
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