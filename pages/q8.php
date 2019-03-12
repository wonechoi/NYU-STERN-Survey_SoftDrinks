<?php
	session_start();
			//echo "2nd page:".$_SESSION['order'];
	if(!isset($_SESSION['order'])) {
		header("Location:./q1.php");
	}
	else if($_SESSION['order'] != "q8"){
		header("Location:./".$_SESSION['order'].".php");
		exit;
	}else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include('../partials/header.html'); ?>
			<script>
				var drinkList = [
				["A&W", 2.99, "AnW"], ["Coke Classic", 3.79, "coke_classic"], ["Dr Pepper", 3.79, "dr_pepper"], ["Fanta Grape", 3.79, "fanta_grape"], ["Fanta Orange", 3.79, "fanta_orange"], ["Mountain Dew", 3.49, "mountain_dew"], ["Pepsi", 3.49, "pepsi"], ["Sprite", 3.79, "sprite"]
			];
				var cart = []; // [drinkNum, name, quantity, subPrice, columnName]
				var budget;
				var subTotal = 0;
				$(document).ready(function () {
					budget = Number($("#budget").html());
					$(".minusButton").click(function () {
						drinkNum = $(this).closest(".drink").attr("id");
						minusDrink(drinkNum);
					});
					$(".plusButton").click(function () {
						drinkNum = $(this).closest(".drink").attr("id");
						plusDrink(drinkNum);
					});
					$("#submitButton").click(function () {
						if (cart.length < 1) {
							alert("Add at least one drink to the cart, Please.");
							return false;
						}
						$("#finalList").val(JSON.stringify(cart));
						$("#numOfCol").val(getResponsiveBreakpoint());
					});
				});

				function minusDrink(drinkNum) {
					quantity = $("#" + drinkNum + "Quantity").val();
					if (quantity == 0) return false;
					$("#" + drinkNum + "Quantity").val(--quantity);
					for (i = 0; i < cart.length; i++) {
						if (cart[i][0] == drinkNum) {
							cart[i][2]--;
							cart[i][3] = (cart[i][2] * drinkList[drinkNum][1]).toFixed(2);
							if (cart[i][2] == 0) {
								cart.splice(i, 1);
							}
							break;
						}
					}
					calSubTotal();
					showCart();
				}

				function plusDrink(drinkNum) {
					quantity = $("#" + drinkNum + "Quantity").val();
					if ((subTotal + drinkList[drinkNum][1]) > budget) {
						alert("You cannot exceed your budget: $" + budget);
						return false;
					}
					$("#" + drinkNum + "Quantity").val(++quantity);
					isInCart = false;
					for (i = 0; i < cart.length; i++) {
						if (cart[i][0] == drinkNum) {
							cart[i][2]++;
							cart[i][3] = (cart[i][2] * drinkList[drinkNum][1]).toFixed(2);
							isInCart = true;
							break;
						}
					}
					if (!isInCart) {
						cart[cart.length] = [drinkNum, drinkList[drinkNum][0], 1, 1 * drinkList[drinkNum][1], drinkList[drinkNum][2]];
					}
					calSubTotal();
					showCart();
				}

				function showCart() {
					$("#cart").html("<tr><th style='width:50%; padding-left: 1%; table-layout: fixed;'>Drinks</th><th style='width:30%; table-layout: fixed; '>Quantity</th><th style='width:20%; table-layout: fixed;'>Price</th></tr>");
					for (i = 0; i < cart.length; i++) {
						$("#cart").append("<tr><td style='width:50%; padding-left: 1%; table-layout: fixed; text-align: left;'>" + cart[i][1] + "</td><td>" + cart[i][2] + "</td><td>" + cart[i][3] + "</td></tr>");
					}
					$("#subTotal").html(subTotal.toFixed(2));
				}

				function calSubTotal() {
					subTotal = 0;
					for (i = 0; i < cart.length; i++) {
						subTotal += Number(cart[i][3]);
					}
				}

				function getResponsiveBreakpoint() {
					var envs = {
						xs: "d-none"
						, sm: "d-sm-none"
						, md: "d-md-none"
						, lg: "d-lg-none"
						, xl: "d-xl-none"
					};
					var env = "";
					var $el = $("<div>");
					$el.appendTo($("body"));
					for (var i = Object.keys(envs).length - 1; i >= 0; i--) {
						env = Object.keys(envs)[i];
						$el.addClass(envs[env]);
						if ($el.is(":hidden")) {
							break; // env detected
						}
					}
					$el.remove();
					if (env == "md") $numOfCol = 3;
					else if (env == "sm") $numOfCol = 2;
					else if (env == "xs") $numOfCol = 1;
					else if (env == "lg") $numOfCol = 4;
					else $numOfCol = 4;
					return $numOfCol;
				};
			</script>
	</head>

	<body>
		<?php
		$imgList = array(
			array("aw.png","A&W",2.99,"aw"),  
			array("coke.png","Coke Classic",3.79,"coke"), array("dr_pepper.png","Dr Pepper",3.79,"dr"),  array("fanta_grape.png","Fanta Grape",3.79,"fantaG"), array("fanta_orange.png","Fanta Orange",3.79,"fantaO"), array("mountain_dew.png","Mountain Dew",3.49,"dew"), array("pepsi.png","Pepsi",3.49,"pepsi"),  
			array("sprite.jpg","Sprite",3.79,"sprite"));

		$rNumList = array(0,1,2,3,4,5,6,7);
		shuffle($rNumList);

		?>
			<main role="main">
				<div class="scenarioMainContainer">
					<div class="logoDiv"> </div>
					<div style="padding-left: 3%; padding-right: 3%;">
						<p class="question"> (Example)
							<br> This is a short version of an example you will see on the following pages.
							<br>
							<br> </p>
						<p class="question"> &nbsp;&nbsp;&nbsp;&nbsp;Imagine that you are <strong>buying carbonated soft drinks for yourself this week.</strong> You have a budget of $<span id="budget">30</span>. All soft drinks are six-packs. Please choose which products you will buy, and how much of each you will purchase so as not to exceed <strong>$30</strong>. After you make your purchase decision, your spending will be calculated. </p>
						<p class="question"> &nbsp;&nbsp;&nbsp;&nbsp;If you do not spend all the money in your budget, you can spend the leftover money on your next purchase on carbonated soft drinks. Please note that you cannot exceed your budget. </p>
						<div class="row" style="margin-top:5%;">
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%; ">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[0]][0]; ?>" class="drinkPics">
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[0]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[0]; ?>Price">
											<?php echo $imgList[$rNumList[0]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[0]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[0]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[1]][0]; ?>" class="drinkPics">
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[1]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[1]; ?>Price">
											<?php echo $imgList[$rNumList[1]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[1]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[1]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[2]][0]; ?>" class="drinkPics" />
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[2]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[2]; ?>Price">
											<?php echo $imgList[$rNumList[2]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[2]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[2]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[3]][0]; ?>" class="drinkPics" />
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[3]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[3]; ?>Price">
											<?php echo $imgList[$rNumList[3]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[3]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[3]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[4]][0]; ?>" class="drinkPics" />
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[4]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[4]; ?>Price">
											<?php echo $imgList[$rNumList[4]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[4]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[4]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[5]][0]; ?>" class="drinkPics" />
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[5]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[5]; ?>Price">
											<?php echo $imgList[$rNumList[5]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[5]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[5]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[6]][0]; ?>" class="drinkPics" />
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[6]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[6]; ?>Price">
											<?php echo $imgList[$rNumList[6]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[6]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[6]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:1%">
								<div class="thumbnail"> <img src="../img/<?php echo $imgList[$rNumList[7]][0]; ?>" class="drinkPics" />
									<div class="drinkDesc">
										<p style="line-height:1.2em"> <strong><?php echo $imgList[$rNumList[7]][1]; ?></strong>
											<br> 6ct, 12fl oz ea
											<br> <strong>&dollar;
										<span id="<?php echo $rNumList[7]; ?>Price">
											<?php echo $imgList[$rNumList[7]][2]; ?>
										</span>/ea
										</strong> </p>
									</div>
									<div id="<?php echo $rNumList[7]; ?>" class="drink">
										<table align="center">
											<tr style="vertical-align: middle;">
												<td>
													<button class="nextButtonDiv minusButton"><i class="fas fa-minus-square minusPlusIButton"></i></button>
												</td>
												<td>
													<input type="text" id="<?php echo $rNumList[7]; ?>Quantity" size="1" value="0" readonly> </td>
												<td>
													<button class="nextButtonDiv plusButton"><i class="fas fa-plus-square minusPlusIButton"></i></button>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="position: fixed; right: 1%; top: 45%; width: 27%; ">
					<form action="../survey.php" method="post" style="width:100%;">
						<input type="hidden" name="qNum" value="Q8">
						<input type="hidden" name="finalList" id="finalList">
						<input type="hidden" name="numOfCol" id="numOfCol">
						<p style="font-family:'Arial Black'; font-size:28px; color:crimson; margin-bottom: 1%"> <i class="fas fa-shopping-cart" style="color:crimson;"></i> Cart
							<button type="submit" class="nextButtonDiv" id="submitButton"> <i class="fas fa-arrow-alt-circle-right nextButton"></i> </button>
						</p>
					</form>
					<table id="cart" style="width:100%; table-layout: fixed; text-align: center; border:3px solid crimson; border-radius: 10px; padding:0.5%;">
						<tr>
							<th style='width:50%; table-layout: fixed; padding-left: 1%'> Drinks </th>
							<th style='width:30%; table-layout: fixed;'> Quantity </th>
							<th style='width:20%; table-layout: fixed;'> Price </th>
						</tr>
					</table>
					<p style="font-size:24px;"><strong>Subtotal: $<span id="subTotal">0</span></strong></p>
				</div>
			</main>
	</body>

	</html>
	<?php
	}
?>