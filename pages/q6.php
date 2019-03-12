<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "q6"){
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
				});
			</script>
	</head>

	<body>
		<?php
		$imgList = array(
			array("aw.png","A&W"), array("aw_diet.png","Diet A&W"), array("coke.png","Coke Classic"),
			array("coke_diet.png","Diet Coke"), array("dr_pepper.png","Dr Pepper"), 
			array("dr_pepper_diet.png","Diet Dr Pepper"), array("fanta_grape.png","Fanta Grape"), array("fanta_orange.png","Fanta Orange"), array("mountain_dew.png","Mountain Dew"),
			array("mountain_dew_diet.png","Diet Mountain Dew"), array("pepsi.png","Pepsi"), 
			array("pepsi_diet.png","Diet Pepsi"), array("sprite.jpg","Sprite"), array("spritezero.png","Sprite Zero"));
			
		$rNumList = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13);
		shuffle($rNumList);
	
	?>
			<main role="main">
				<div class="mainContainer">
					<div class="logoDiv"> </div>
					<div style="padding-left: 3%; padding-right: 3%;">
						<p class="question"> Please recall the soft drinks that you consumed over the last two weeks. </p>
						<p class="question"> Please select all of the carbonated soft drinks that you consumed over the last two weeks from the list below. </p>
						<form action="../survey.php" method="post" style="width:100%;">
							<input type="hidden" name="qNum" value="Q6">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-5">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[0]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[0]][1]; ?>" value="<?php echo $imgList[$rNumList[0]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[0]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[0]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[1]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[1]][1]; ?>" value="<?php echo $imgList[$rNumList[1]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[1]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[1]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[2]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[2]][1]; ?>" value="<?php echo $imgList[$rNumList[2]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[2]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[2]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[3]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[3]][1]; ?>" value="<?php echo $imgList[$rNumList[3]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[3]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[3]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[4]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[4]][1]; ?>" value="<?php echo $imgList[$rNumList[4]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[4]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[4]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[5]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[5]][1]; ?>" value="<?php echo $imgList[$rNumList[5]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[5]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[5]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[6]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[6]][1]; ?>" value="<?php echo $imgList[$rNumList[6]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[6]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[6]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[7]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[7]][1]; ?>" value="<?php echo $imgList[$rNumList[7]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[7]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[7]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[8]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[8]][1]; ?>" value="<?php echo $imgList[$rNumList[8]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[8]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[8]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[9]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[9]][1]; ?>" value="<?php echo $imgList[$rNumList[9]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[9]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[9]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[10]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[10]][1]; ?>" value="<?php echo $imgList[$rNumList[10]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[10]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[10]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[11]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[11]][1]; ?>" value="<?php echo $imgList[$rNumList[11]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[11]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[11]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[12]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[12]][1]; ?>" value="<?php echo $imgList[$rNumList[12]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[12]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[12]][1]; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-5" style="margin: 1%">
									<div class="thumbnail">
										<label for="<?php echo $imgList[$rNumList[13]][1]; ?>">
											<input type="checkbox" class="answerInput" name="Q6[]" id="<?php echo $imgList[$rNumList[13]][1]; ?>" value="<?php echo $imgList[$rNumList[13]][1]; ?>" required> <img src="../img/<?php echo $imgList[$rNumList[13]][0]; ?>" class="drinkPics" /> </label>
										<div style="font-size:16px; font-weight: 200; text-align: center;">
											<?php echo $imgList[$rNumList[13]][1]; ?>
										</div>
									</div>
								</div>
							</div>
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