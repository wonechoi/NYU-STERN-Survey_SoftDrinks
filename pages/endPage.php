<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "endPage"){
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
				<div class="logoDiv logo"> </div>
				<div style="padding-left: 3%; padding-right: 3%; margin-top:10%;">
					<p class="question" style="font-size:20px;"> We thank you for your time spent taking this survey.
						<br> Your response has been recorded. </p>
				</div>
			</div>
		</main>
	</body>

	</html>
	<?php
	session_unset(); 
	session_destroy();	
	}
?>