<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "checkQ"){
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
		<?php
		$optionList = array("Coke", "Dr Pepper", "Pepsi", "Mountain Dew");
		shuffle($optionList);
	?>
			<main role="main">
				<div class="mainContainer">
					<div class="logoDiv"> </div>
					<div style="padding-left: 3%; padding-right: 3%;">
						<p class="question"> To show that you read instructions. Click next button and do not click on any carbonated soft drinks. </p>
						<form action="../survey.php" method="post">
							<input type="hidden" name="qNum" value="checkQ">
							<label for="<?php echo $optionList[0]; ?>" class="answerDiv">
								<div>
									<input type="radio" class="answerInput" name="checkQ" id="<?php echo $optionList[0]; ?>" value="<?php echo $optionList[0]; ?>"> &nbsp;
									<?php echo $optionList[0]; ?>
								</div>
							</label>
							<label for="<?php echo $optionList[1]; ?>" class="answerDiv">
								<div>
									<input type="radio" class="answerInput" name="checkQ" id="<?php echo $optionList[1]; ?>" value="<?php echo $optionList[1]; ?>"> &nbsp;
									<?php echo $optionList[1]; ?>
								</div>
							</label>
							<label for="<?php echo $optionList[2]; ?>" class="answerDiv">
								<div>
									<input type="radio" class="answerInput" name="checkQ" id="<?php echo $optionList[2]; ?>" value="<?php echo $optionList[2]; ?>"> &nbsp;
									<?php echo $optionList[2]; ?>
								</div>
							</label>
							<label for="<?php echo $optionList[3]; ?>" class="answerDiv">
								<div>
									<input type="radio" class="answerInput" name="checkQ" id="<?php echo $optionList[3]; ?>" value="<?php echo $optionList[3]; ?>"> &nbsp;
									<?php echo $optionList[3]; ?>
								</div>
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