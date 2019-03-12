<?php
	session_start();

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if($_POST['qNum'] == "Q1") {
			q1($_POST['Q1']);
		}else if($_POST['qNum'] == "Q2") {
			q2($_POST['Q2']);
		}else if($_POST['qNum'] == "instruction1") {
			instruction1();
		}else if($_POST['qNum'] == "Q3") {
			q3($_POST['Q3']);
		}else if($_POST['qNum'] == "Q4") {
			q4($_POST['Q4Text']);
		}else if($_POST['qNum'] == "Q5") {
			q5($_POST['Q5']);
		}else if($_POST['qNum'] == "Q6") {
			q6($_POST['Q6']);
		}else if($_POST['qNum'] == "Q7") {
			q7($_POST['Q7']);
		}else if($_POST['qNum'] == "checkQ") {
			checkQ($_POST['checkQ']);
		}else if($_POST['qNum'] == "Q8") {
			q8();
		}else if($_POST['qNum'] == "instruction2") {
			instruction2();
		}else if($_POST['qNum'] == "scenario") {
			scenario();
		}else if($_POST['qNum'] == "demoQ") {
			demoQ();
		}
	}
	
	function q1($response) {
		$_SESSION["q1"] = $response;
		$_SESSION["startTime"] = strval(date('YmdHis', time()));
		$_SESSION["startTimeForCal"] = date("Y-m-d H:i:s", time());
		$randomId = $_SESSION["startTime"].strval(rand(1000,9999));
		$_SESSION['id'] = $randomId;
		$_SESSION['ipAddress'] = getRealIpAddr();
		$_SESSION['userLanguage'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		q1Insert($response);
		
		if($response == "I agree") { 
			$_SESSION['order'] = "q2";
			header("Location:./pages/q2.php");
		}
		else {
			$_SESSION['order'] = "endPage";
			header("Location:./pages/endPage.php");
		}
	}

	function q1Insert($response){
		$sql = "INSERT INTO PreQ (responseID, ipAddress, language, startTime, process, finished, Q1)
						VALUES ('".$_SESSION['id']."','".$_SESSION['ipAddress']."','".$_SESSION['userLanguage']."',
						'".$_SESSION['startTime']."','Q1',FALSE,'".$response."')";
		
		manipulateTable($sql);
	}

	function q2($response) {
		$_SESSION["q2"] = $response;
		q2Update($response);
		
		if($response == "Yes") {
			$_SESSION['order'] = "instruction1";
			header("Location:./pages/instruction1.php");
		}
		else{
			$_SESSION['order'] = "endPage";
			header("Location:./pages/endPage.php");
		}
	}

	function q2Update($response) {
		
		$sql = "UPDATE PreQ SET process='Q2', Q2='".$response."' WHERE responseId='".$_SESSION['id']."'";
		
		manipulateTable($sql);		
	}

	function instruction1() {
		$_SESSION['order'] = "q3";
		header("Location:./pages/q3.php");
	}

	function q3($response) {
		$_SESSION["q3"] = $response;
		if($response == "Yes") {
			$_SESSION['order'] = "q4";
			header("Location:./pages/q4.php");
		}
		else {
			$_SESSION['order'] = "q5";
			header("Location:./pages/q5.php");
		}
	}	
	
	function q4($responseText) {
		$list="";
		foreach($_POST['Q4'] as $store) {
			$list = $list . $store . ",";
		}
		$_SESSION["q4"] = substr($list,0,-1);
		$_SESSION["q4Text"] = $responseText;
		
		$_SESSION['order'] = "q5";
		header("Location:./pages/q5.php");
	}

	function q5($response) {
		$_SESSION["q5"] = $response;
		$_SESSION['order'] = "q6";
		header("Location:./pages/q6.php");
	}

	function q6($responseList) {
		$list="";
		foreach($_POST['Q6'] as $drink) {
			$list = $list . $drink . ",";
		}
		$_SESSION["q6"] = substr($list,0,-1);
		
		q6Update();
		$_SESSION['order'] = "q7";
		header("Location:./pages/q7.php");
	}

	function q6Update() {

		$sql = "UPDATE PreQ SET process='Q6', Q3='".$_SESSION["q3"]."', Q4='".$_SESSION["q4"]."', Q4Text='".$_SESSION["q4Text"]."', Q5='".$_SESSION["q5"]."',	Q6='".$_SESSION["q6"]."'  
		WHERE responseId='".$_SESSION['id']."'";
		
		manipulateTable($sql);	
	}

	function q7() {
		$_SESSION['Q8startTime'] = strval(date('YmdHis', time()));	
		$_SESSION['order'] = "q8";
		header("Location:./pages/q8.php");
	}

	function q8() {
		
		$data = json_decode($_POST['finalList']);
		$numOfCol = $_POST['numOfCol'];	
		
		$orderQuery = "";
		$orderList = "";
		$orderQuantities = "";
		foreach ($data as $one) {
			$orderQuery = $orderQuery . "," . $one[4];
			$orderList = $orderList . $one[1] . ",";
			$orderQuantities = $orderQuantities . "," . $one[2];
		}
		$orderList = substr($orderList,0,-1);
		
		$_SESSION['Q8endTime'] = strval(date('YmdHis', time()));		
		q8Insert($orderQuery, $orderList, $orderQuantities, $numOfCol);
		$_SESSION['order'] = "checkQ";
		header("Location:./pages/checkQ.php");
	}

	function q8Insert($orderQuery, $orderList, $orderQuantities, $numOfCol) {
	
		$sql = "INSERT INTO ChoiceExperiment (responseID, scenarioNum, numOfColPerRow, startTime, 
				endTime, orderAddToCart" . $orderQuery . ") 
				VALUES ('".$_SESSION['id']."','Q8','".$numOfCol."','".$_SESSION['Q8startTime']."','".$_SESSION['Q8endTime']."', 
			'".$orderList."'".$orderQuantities.")";
		
		manipulateTable($sql);
		
	}

	function checkQ($response) {
		checkQUpdate($response);
		
		$_SESSION['order'] = "instruction2";
		header("Location:./pages/instruction2.php");
	}

	function checkQUpdate($response) {
		$sql = "UPDATE PreQ SET process='CQ', CheckQ='".$response."' WHERE responseId='".$_SESSION['id']."'";
		
		manipulateTable($sql);			
	}

	function instruction2() {
		$_SESSION['scenarios'] = array(
			"Imagine that you are <strong>buying carbonated soft drinks for yourself over the weekend.</strong> You have <strong>a budget of $<span id='budget'>20</span></strong>.",
			"Imagine that you are <strong>buying carbonated soft drinks for yourself and having in mind of watching movies at home over the weekend</strong>. You have <strong>a budget of $<span id='budget'>20</span></strong>.",
			"Imagine that you are <strong>buying carbonated soft drinks for yourself and having in mind of relaxing at home over the weekend. </strong> You have <strong>a budget of $<span id='budget'>20</span></strong>.",
			"Imagine that you <strong>invite ten friends to your home and have dinner with them. You are buying carbonated soft drinks for this dinner</strong>. You have <strong>a budget of $<span id='budget'>30</span></strong>.",
			"Imagine that you <strong>invite ten friends to your home to celebrate Holidays together. You are buying carbonated soft drinks for this party</strong>. You have <strong>a budget of $<span id='budget'>20</span></strong>.",
			"Imagine that you <strong>invite ten friends to your home on Gameday to watch the game together while eaing dinner. You are buying carbonated soft drinks for this Gameday</strong>. You have <strong>a budget of $<span id='budget'>20</span></strong>.",
		);
		
		
		$scenarioOrder = array(0,1,2,3,4,5);
		shuffle($scenarioOrder);
		$_SESSION['scenarioOrder'] = $scenarioOrder;
		$_SESSION['currentNum'] = 0;
		$_SESSION['CEstartTime'] = strval(date('YmdHis', time()));	
		
		$_SESSION['order'] = "scenario";
		header("Location:./pages/scenario.php");
	}

	function scenario() {
		$_SESSION['CEendTime'] = strval(date('YmdHis', time()));	
		
		$data = json_decode($_POST['finalList']);
		$numOfCol = $_POST['numOfCol'];
		
		$orderQuery = "";
		$orderList = "";
		$orderQuantities = "";
		foreach ($data as $one) {
			$orderQuery = $orderQuery . "," . $one[4];
			$orderList = $orderList . $one[1] . ",";
			$orderQuantities = $orderQuantities . "," . $one[2];
		}
		$orderList = substr($orderList,0,-1);
		
		choiceExInsert($orderQuery, $orderList, $orderQuantities, $numOfCol);
		
		$_SESSION['currentNum'] = $_SESSION['currentNum'] + 1 ;
		$_SESSION['CEstartTime'] = strval(date('YmdHis', time()));	
		if($_SESSION['currentNum'] == 6) {
			$_SESSION['order'] = "demoQ";
			header("Location:./pages/demoQ.php");
		}
		else
			header("Location:./pages/scenario.php");
	}
	
	function choiceExInsert($orderQuery, $orderList, $orderQuantities, $numOfCol) {
	
		$scenarioNum = $_SESSION['scenarioOrder'][$_SESSION['currentNum']] + 1;
		
		$sql = "INSERT INTO ChoiceExperiment (responseID, scenarioNum, numOfColPerRow, startTime, 
						endTime, orderAddToCart" . $orderQuery . ") 
						VALUES ('".$_SESSION['id']."','".$scenarioNum."','".$numOfCol."','".$_SESSION['CEstartTime']."','".$_SESSION['CEendTime']."','".$orderList."'".$orderQuantities.")";
		
		manipulateTable($sql);
		
	}

	function demoQ() {
		$mTurkID = $_POST["demoQ5"];
		$age = $_POST["demoQ4"];
		$gender = $_POST["demoQ3"];
		
		$list="";
		foreach($_POST['demoQ1'] as $maniq1) {
			$list = $list . $maniq1 . "," ;
		}
		$maniq1 = substr($list,0,-1);
		$maniq1Text="";
		if(isset($_POST['demoQ1Text']))
			$maniq1Text = $_POST['demoQ1Text'];
		
		$list="";
		foreach($_POST['demoQ2'] as $maniq2) {
			$list = $list . $maniq2 . "," ;
		}
		$maniq2 = substr($list,0,-1);	
		$maniq2Text="";
		if(isset($_POST['demoQ2Text']))
			$maniq2Text = $_POST['demoQ2Text'];
		 
		$endTime = strval(date('YmdHis', time()));	
		$duration = strtotime(date("Y-m-d H:i:s", time())) - strtotime($_SESSION["startTimeForCal"]);
		
		$sql = "UPDATE PreQ SET mTurkID='".$mTurkID."', age='".$age."', gender='".$gender."', maniq1='".$maniq1."', maniq1Text='".$maniq1Text."', maniq2='".$maniq2."',maniq2Text='".$maniq2Text."', endTime='".$endTime."', duration='".$duration."', process='DQ', finished=TRUE WHERE responseId='".$_SESSION['id']."'";

		manipulateTable($sql);

		$_SESSION['order'] = "endPage";
		header("Location:./pages/endPage.php");
	}

	function manipulateTable($sql) {
		$host="localhost";
		$user="choihyew_admin";
		$password="xlaghfxmsejqmfejqmf12!";
		$dbname="choihyew_survey";
		$con = new mysqli($host, $user, $password, $dbname);

		if($con->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}		
		
		if ($con->query($sql) === FALSE) {
			 //echo "<script>console.log( 'hahahah"+$con->error+"' );</script>";
    	 return false;
		} else {
		}
		$con->close();
	}

	function getRealIpAddr() {
			if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
			{
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
			{
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
				$ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
	}
?>