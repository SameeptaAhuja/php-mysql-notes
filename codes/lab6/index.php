<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Abhishek</title>
	<link rel="stylesheet"  href="table.css">

	<style>
		/*table, th, td {
  border: 2px solid black;
	}
*/
		/**{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}*/
		input[type=button], input[type=reset], input[type=submit] {
    background-color: #8842d5;
    border: none;
    color: white;
     text-decoration: none;
    margin: 5px 4px;
    cursor: pointer;  
    font-size: 15px;
    border-radius: 5px;
}
		input,select,textarea{
			/*padding: 10px 50px;*/
			margin: 4px 0;
			width: 90px;
			height: 35px;
			box-sizing: border-box;

		}
		.submit{
			width: 220px;
		}
		.left{
			float: left;
			clear: below;
			height: 500px;
			width: 280px;
			margin-top: 10px;
			border-radius: 25px;
		}
		.head{
			height: 130px;
			width: 100%;
			border-radius: 25px;
		}
		/*.clearfix::after{
			content: " ";
			clear: both;
			display: table;
		}*/
			
	}
	.buttonStyle{
		border:none;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		padding: 12px 28px;
		width: 100px;
		height: 60px;
		border-radius: 10px;
	}
	.form{
		margin-top: 12px;
		height: 400px;
		width: 360px;
		float: right;
		border-radius: 25px;
	}
	#mydiv1{

	}
	#mydiv2{

	}
	div{
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	}
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		
	</style>

<body style=" font-family: Arial;">
	<div class="head" style="background-color: #20417A">
		<h1 style="padding:20px; padding-bottom: 0px; margin-bottom: 0px; font-size: 275%; text-align: middle; color: white;">Graph</h1>
		<h1 style="padding-left:20px; padding-top: 0px; margin-top: 0px; font-size: 275%; color: white;">Database</h1>
	</div>
	<div class="left" style="background-color: #2069e0; text-align: center;">
		<button onclick="about()" class="buttonStyle" style="margin-top: 100px; height: 60px; width: 160px; border-radius: 10px;" >Extra Page</button><br>
		<button onclick="NodeO()" class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Node</button><br>
		<button onclick="EdgeO()" class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Edge</button>
	</div>


	<div style="background-color: white;" class="form" id="mydiv1">
		<h1 style="text-align: center;">Insert</h1>
		<form  action="" method="post" style="text-align: center;">
	 <input type="text" name="nodeName" placeholder="Node name" required="required" maxlength="2"></p>	
	<p> x : <input type="number" name="xphp" required="required">
	 y : <input type="number" name="yphp" required="required"></p>
	<input type="submit" value="Insert" name="submit1">
	</form>
	<form action="" method="post" style="text-align: center;">
	<h1 style="text-align: center;">Delete</h1>
	<input type="text" name="nodeName2" placeholder="Node Name" required="required" maxlength="2">
	<input type="submit" value="Delete" name="submit2">
	</form>
	</div>


	<div style="background-color: white; height: 400px; display: none;" class="form" id="mydiv2">
		<h1 style="text-align: center;">Edge insert</h1>
		<form action="" method="post" style="text-align: center;">
		<input type="text" name="edgeN1" placeholder="1st Node.." required="required" maxlength="2">
		<input type="number" name="Eweight" placeholder="weight.." required="required">
		<input type="text" name="edgeN2" placeholder="2nd Node.." required="required" maxlength="2">
	<input type="submit" value="Insert" name="submit3">
</form>
<h1 style="text-align: center;">Edge Delete</h1>
<form action="" method="post" style="text-align: center;">
<input type="text" name="edgeN" placeholder="Edge Name" required="required">
	<input type="submit" value="Delete" name="submit4">
	</form>
	</div>


	<div id="mydiv3" style="display: none;"><p style="font-size: 150%; text-align: center;  padding-left: 400px; padding-right: 100px; padding-top: 50px; padding-bottom: 50px;">Welcome to students coding club here we will learn about new things in web development. You know web development is future of coding, as you know people don't like to install app for a certain work, that why demant of web develope keeps increasing
........</p></div>
	
<dir class="center" id="nodeTable" >
<table class="center" border="2">
	<col width="180">
	<!-- <col width="160"> -->
	<col width="180">
	<col width="180">
	<tr>
		<th>Node</th>
		<th>x</th>
		<th>y</th>
	</tr>
	<?php
	$stmt = $conn->query("SELECT name, x, y FROM lab5.node");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $row['name'];
	echo '</td>';
	echo '<td>';
	echo $row['x'];
	echo '</td>';
	echo '<td>';
	echo $row['y'];
	echo '</td>';
		echo "</tr>";
	}
	?>
</table>
</dir>
<dir class="center" id="edgeTable" style="display: none;">
<table class="center" border="2">
	<col width="160">
	
	<col width="160">
	<col width="160">
	<col width="160">
	<tr>
		<th>EdgeName</th>
		<th>first</th>
		<th>last</th>
		<th>weight</th>
	</tr>
	<?php
	$stmt = $conn->query("SELECT edgeName, name1, name2, weight FROM lab5.edge");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
	echo '<td>';
	echo $row['edgeName'];
	echo '</td>';
	echo '<td>';
	echo $row['name1'];
	echo '</td>';
	echo '<td>';
	echo $row['name2'];
	echo '</td>';
	echo '<td>';
	echo $row['weight'];
	echo '</td>';
		echo "</tr>";
	}
	?>
</table>
</dir>
</body>
</html>
<?php

if( isset($_POST['submit1']) && isset($_POST['nodeName']) && isset($_POST['xphp']) && isset($_POST['yphp']) ) {
	$sql = "INSERT INTO lab5.node(name,x,y) VALUES(:node,:xcor,:ycor)";
	$stmt = $conn->prepare($sql);
	try{
	$stmt->execute(
		array(
			':node' => $_POST['nodeName'], 
			':xcor' => $_POST['xphp'],
			':ycor' => $_POST['yphp']
		)
	);
	myAlert("Node added Successfully");
	header("Refresh : 0");
	exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
}
	
}
if( isset($_POST['submit2']) && isset($_POST['nodeName2']) ) {
	$sql = "DELETE FROM lab5.node WHERE name = :node";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':node',$_POST['nodeName2']);
	$stmt->execute();
	if(!$stmt->rowCount()){
	myAlert("Node not exists");
	header("Refresh : 0");
	exit();
}
	myAlert("Node deleted Successfully");
	header("Refresh : 0");
	exit();
}

?>
 <?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>

<?php
if( isset($_POST['submit3']) && isset($_POST['edgeN1']) && isset($_POST['Eweight']) && isset($_POST['edgeN2']) ) {
	$sql = "INSERT INTO lab5.edge(edgeName,name1,name2,weight) VALUES(:ename,:n1,:n2,:w)";
	$stmt = $conn->prepare($sql);
	try{
	$stmt->execute(
		array(
			':ename' => $_POST['edgeN1'].$_POST['edgeN2'], 
			':n1' => $_POST['edgeN1'],
			':n2' => $_POST['edgeN2'],
			':w' => $_POST['Eweight'],
		)
	);
	myAlert("Edge Added Successfully");
	header("Refresh : 0");
	exit();
}catch(PDOException $e){
	myAlert("Error : Dublicate Entry or Foreign Constaint");
}
	
	
}
if( isset($_POST['submit4']) && isset($_POST['edgeN']) ) {
	$sql = "DELETE FROM lab5.edge WHERE edgeName = :n";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':n',$_POST['edgeN']);
	$stmt->execute();
	if(!$stmt->rowCount()){
	myAlert("Edge not exists");
	header("Refresh : 0");
	exit();
}
	myAlert("Edge deleted Successfully");
	header("Refresh : 0");
	exit();
}
?>

<script>
	var x = document.getElementById("mydiv2");
	var y = document.getElementById("mydiv1");
	var z = document.getElementById("mydiv3");
	var ntab = document.getElementById("nodeTable");
	var etab = document.getElementById("edgeTable");
	function EdgeO(){
		if(x.style.display=='none'){
			etab.style.display='block';
			x.style.display="block";
			y.style.display = "none";
			z.style.display = "none";
			// ntab.style.display='none';
		}


	}
	function NodeO(){
		
		if(y.style.display=='none'){
			y.style.display="block";
			ntab.style.display="block";
			x.style.display = "none";
			z.style.display = "none";
			etab.style.display='none';
		}
		
	}
	function about(){
		if(z.style.display=='none'){
			z.style.display="block";
			x.style.display = "none";
			y.style.display = "none";
		}else{
			z.style.display = "none";
		}
	}

</script>