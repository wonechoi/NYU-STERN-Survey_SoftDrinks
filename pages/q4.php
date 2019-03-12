<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "q4"){
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
					$("#Q4Text").keyup(function () {
						var text = $("#Q4Text").val();
						if (text == null || text == "") {
							$("#other").attr("checked", false);
						}
						else {
							$("#other").attr("checked", true);
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
					<p class="question"> Where did you buy soft drinks in the past two weeks? Please check all that apply. </p>
					<form action="../survey.php" method="post">
						<input type="hidden" name="qNum" value="Q4">
						<label for="groceryStores" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="Q4[]" id="groceryStores" value="Grocery stores" required> &nbsp;Grocery stores </div>
						</label>
						<label for="convenienceStores" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="Q4[]" id="convenienceStores" value="Convenience Stores" required> &nbsp;Convenience Stores </div>
						</label>
						<label for="otherRetailerStores" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="Q4[]" id="otherRetailerStores" value="Other retailer stores" required> &nbsp;Other retailer stores </div>
						</label>
						<label for="onlineShopping" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="Q4[]" id="onlineShopping" value="Online shopping" required> &nbsp;Online shopping </div>
						</label>
						<label for="other" class="answerDiv">
							<div>
								<input type="checkbox" class="answerInput" name="Q4[]" id="other" value="other" required> &nbsp;Other (Please specify)
								<input type="text" id="Q4Text" name="Q4Text" style="vertical-align: middle;" size="30" maxlength="30" placeholder="max 30 characters"> </div>
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