<?php
	session_start();
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "demoQ"){
		header("Location:./".$_SESSION['order'].".php");
		exit;
	}else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include('../partials/header.html'); ?>
			<script>
				$(document).ready(function () {
					var checkBoxes = $(':checkbox[required]');
					checkBoxes.change(function () {
						if (checkBoxes.is(':checked')) {
							checkBoxes.removeAttr('required');
						}
						else {
							checkBoxes.attr('required', 'required');
						}
					});
					$("#demoQ1Text").keyup(function () {
						var text = $("#demoQ1Text").val();
						if (text == null || text == "") {
							$("#other").attr("checked", false);
						}
						else {
							$("#other").attr("checked", true);
						}
					});
					$("#demoQ2Text").keyup(function () {
						var text = $("#demoQ2Text").val();
						if (text == null || text == "") {
							$("#other1").attr("checked", false);
						}
						else {
							$("#other1").attr("checked", true);
						}
					});
				});
			</script>
	</head>

	<body>
		<main role="main">
			<div class="mainContainer">
				<div class="logoDiv"> </div>
				<div style="padding-left: 3%; padding-right: 3%;">
					<p class="question"> In this set of questions, you will be asked for how you made purchase decisions, some demographic information and your MTurk Worker ID. </p>
					<p>
						<br>
						<br>
						<br> </p>
					<form action="../survey.php" method="post">
						<input type="hidden" name="qNum" value="demoQ">
						<p class="question"> Please recall the task that you chose products to buy and how much of each in the context of buying carbonated soft drinks and having in mind of relaxing at home over the weekend. Which factors did you consider when making the purchase decision? Please select all that apply. </p>
						<label for="brands" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ1[]" id="brands" value="Brands" required> &nbsp;Brands</div>
						</label>
						<label for="flavors" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ1[]" id="flavors" value="Flavors" required> &nbsp;Flavors </div>
						</label>
						<label for="calorieLevel" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ1[]" id="calorieLevel" value="Calorie Level" required> &nbsp;Calorie Levels </div>
						</label>
						<label for="yourPreference" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ1[]" id="yourPreference" value="Your Preference" required> &nbsp;Your Preference </div>
						</label>
						<label for="other" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ1[]" id="other" value="other" required> &nbsp;Other (Please specify)
								<input type="text" id="demoQ1Text" name="demoQ1Text" style="vertical-align: middle;" size="60" maxlength="200" placeholder="max 200 characters"> </div>
						</label>
						<p>
							<br>
							<br> </p>
						<p class="question"> Please recall the task that you chose products to buy and how much of each in the context of buying carbonated soft drinks and inviting ten friends to your home on Gameday to watch the game together while eating dinner. Which factors did you consider when making the purchase decision? Please select all that apply. </p>
						<label for="brands1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="brands1" value="Brands" required> &nbsp;Brands</div>
						</label>
						<label for="flavors1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="flavors1" value="Flavors" required> &nbsp;Flavors </div>
						</label>
						<label for="calorieLevel1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="calorieLevel1" value="Calorie Level" required> &nbsp;Calorie Levels </div>
						</label>
						<label for="yourPreference1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="yourPreference" 1 value="Your Preference" required> &nbsp;Your Preference </div>
						</label>
						<label for="friendsPrferences1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="friendsPrferences1" value="Friends Prferences" required> &nbsp;Friends' Preferences </div>
						</label>
						<label for="numberofFriends1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="numberofFriends1" value="Number of Friends" required> &nbsp;The Number of Friends </div>
						</label>
						<label for="other1" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="demoQ2[]" id="other1" value="other" required> &nbsp;Other (Please specify)
								<input type="text" id="demoQ2Text" name="demoQ2Text" style="vertical-align: middle;" size="60" maxlength="200" placeholder="max 200 characters"> </div>
						</label>
						<p>
							<br>
							<br> </p>
						<p class="question"> What best describes your gender identity? </p>
						<label for="Female" class="answerDiv" style="margin-top:2%;">
							<div>
								<input type="radio" class="answerInput" name="demoQ3" id="Female" value="Female"> &nbsp;Female </div>
						</label>
						<label for="Male" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ3" id="Male" value="Male"> &nbsp;Male </div>
						</label>
						<label for="Others" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ3" id="Others" value="Others"> &nbsp;Others </div>
						</label>
						<label for="notToSay" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ3" id="notToSay" value="Prefer not to say"> &nbsp;Prefer not to say </div>
						</label>
						<p>
							<br>
							<br> </p>
						<p class="question"> What is your age? </p>
						<label for="1824" class="answerDiv" style="margin-top:2%;">
							<div>
								<input type="radio" class="answerInput" name="demoQ4" id="1824" value="18-24 Years old"> &nbsp;18-24 Years old </div>
						</label>
						<label for="2534" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ4" id="2534" value="25-34 Years old"> &nbsp;25-34 Years old </div>
						</label>
						<label for="3544" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ4" id="3544" value="35-44 Years old"> &nbsp;35-44 Years old </div>
						</label>
						<label for="4554" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ4" id="4554" value="45-54 Years old"> &nbsp;45-54 Years old </div>
						</label>
						<label for="5564" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ4" id="5564" value="55-64 Years old"> &nbsp;55-64 Years old </div>
						</label>
						<label for="65" class="answerDiv">
							<div>
								<input type="radio" class="answerInput" name="demoQ4" id="65" value="65 years old or older"> &nbsp;65 years old or older </div>
						</label>
						<p>
							<br>
							<br> </p>
						<p class="question"> Please provide your MTurk Worker ID. </p>
						<div class="answerDiv" style="margin-top:2%;">
							<input type="text" name="demoQ5" id="mTurkID"> </div>
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