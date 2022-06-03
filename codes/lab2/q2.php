<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Writing data</title>
	<style>
		input,select{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 300px;
			height: 35px;
			box-sizing: border-box;
		}
		
		
	</style>
</head>
<body style="background-color: aqua">

<h1 style="text-align: center; font-size: 250%">File Writing</h1>
<div class="container">
<form action="" method="post" style="text-align: center;">
	<label style="font-size: 150%;">Subject Name : </label><br><input type="text" name="subN" placeholder="subject.." required="required"><br>
	<br>
	<label style="font-size: 150%">Subject Code : </label><br><input type="text" name="subC" placeholder="code.." required="required"><br>
	<br>
	<label style="font-size: 150%">Credits : </label><br><input type="number" name="credit" placeholder="credits.." required="required"><br>
	<br>
	<label style="font-size: 150%">Grade : </label><br>
	<select name="grade" required="required" style="font-size: 105%">
		<option value="AA" selected>AA</option>
		<option value="AB">AB</option>
		<option value="BB">BB</option>
		<option value="BC">BC</option>
		<option value="CC">CC</option>
		<option value="CD">CD</option>
		<option value="DD">DD</option>
		<option value="F">F</option>
	</select>
	<!-- <label style="font-size: 150%">Grade : </label><br><input type="text" name="grade" placeholder="grades.." required="required"> --><br>
	<br>
	<br>
	<input type="submit" name="submit" value="submit" required="required" style="background-color: #008CBA"><br>
	</div>
</form>
<footer><a href="q3.php" title="Reading data" target="_blank" style="text-decoration-line: none; font-size: 120%">To Read data click here</a></footer>
</body>
</html>

<?php
if( isset($_POST['subN']) && isset($_POST['subC']) && isset($_POST['credit']) &&isset($_POST['grade'])){
	$fp = fopen("lab2_data.txt", "a") or  exit('<p>Error in opening file</p>');
	$sub=$_POST['subN'];
	$code = $_POST['subC'];
	$credit = $_POST['credit'];
	$grade = $_POST['grade'];
	$sub = str_replace(' ', '_', $sub);
	$code = str_replace(' ', '_', $code);
	 fwrite($fp, "$sub, $code, $credit, $grade\n");
	fclose($fp);

}
?>