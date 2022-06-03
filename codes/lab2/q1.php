<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Abhishek Lab 2</title>
	<style>
		.box{
			float: left;
			/*size: auto;*/
			width: 120px;
			height: 120px;
			padding: 50px;
			box-sizing: border-box;
		}
		.absolute{
			float: left;
			width: 33%;
			padding: 50px;
			box-sizing: border-box;
		}
		.clearfix::after{
			content: " ";
			clear: both;
			display: table;
		}
		section{
			clear: left;
		}
		.below{
			clear: left;
			height: 100px;
		}
		@media (min-width: 300px) and (max-width: 600px)  {
  			.box{
			float: left;
			width: 60px;
			height: 60px;
			padding: 50px;
			box-sizing: border-box;
		}
		.absolute{
			float: left;
			width: 20%;
			padding: 50px;
			box-sizing: border-box;
		}
	</style>
</head>
<body style="background-color: aqua;">
<?php 
$n=3;
echo '<section class="below" style="text-align:center; font-size:30px;">Tic Tac 3x3 grid using Floating property ( Responsive also)</section>';
for($i=0 ; $i<$n ;$i++){
	// echo '<div class="absolute" ></div>'
	echo '<div class="absolute"></div>';

	for($j=0 ; $j<$n ; $j++){
	if(($i+$j)%2==0) echo '<div class="box" style="background-color: white"></div>';
	else echo '<div class="box" style="background-color: lightgrey"></div>';
}
echo '<section></section>'; // so that nothing would float to left
}
 ?>
</body>
</html>