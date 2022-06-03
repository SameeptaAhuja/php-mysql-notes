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
		th,td{
			padding: 7px;
			font-size: 120%;
			margin: 2px;
		}

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
			width: 220px;
			height: 32px;
			box-sizing: border-box;

		}
		.submit{
			width: 140px;
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
		height: 460px;
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
		<button onclick="about()" class="buttonStyle" style="margin-top: 100px; height: 60px; width: 160px; border-radius: 10px;" >Course</button><br>
		<button onclick="NodeO()" class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Student</button><br>
		<button onclick="EdgeO()" class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Enroll</button>
		<button onclick="operation()"class="buttonStyle" style="margin-top: 30px; height: 60px; width: 160px; border-radius: 10px;">Operations</button>
	</div>


	<div style="background-color: white;" class="form" id="mydiv1">
		<h1 style="text-align: center;">Adding Student</h1>
		<form  action="" method="post" style="text-align: center;">
	 <input type="number" name="RollNo" placeholder="Roll No." required="required"><br>	
	<input type="name" placeholder="Name"  name="Sname" required="required"><br>
	 <input type="number" placeholder="Cpi" name="Cpi" required="required" step="0.01" maxlength=""><br>
	 <input type="number" placeholder="Age" name="Age" required="required" maxlength="2"><br>
	<input type="submit" class="submit" value="Insert" name="StuSubmit"><br>
	</form>
	<form action="" method="post" style="text-align: center;">
	<h1 style="text-align: center;">Delete</h1>
	<input type="number" name="DrollNO" placeholder="Roll No." required="required">
	<input type="submit" class="submit" value="Delete" name="Dstusubmit">
	</form>
	</div>


	<div style="background-color: white; height: 300px; display: none;" class="form"  id="mydiv2">
		<h1 style="text-align: center;">Enroll Data</h1>
		<form action="" method="post" style="">
			<label style="text-align: left; margin-left: 16px">Choose Student :</label>
			<select name='getRoll' class="submit">
				<option value="Roll No">Roll No</option>
				<?php
				
	$stmt = $conn->query("SELECT sname,rollNo FROM lab8.student");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			
			$tempr = $row['rollNo'];
			echo "<option value=$tempr>";
			echo $row['rollNo'];
			echo " : ";
			echo $row['sname'];
			echo'</option>';
			}
	
				?>
			</select>
			<br>
			<label style="text-align: left; margin-left: 16px">Choose Course :</label>
			<select name='getCourse' class="submit">
				<option value="Roll No">Course No</option>
				<?php
				
	$stmt = $conn->query("SELECT cname,courseNo FROM lab8.course");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			$tempc = $row['courseNo'];
			echo "<option value=$tempc>";
			echo $row['courseNo'];
			echo " : ";
			echo $row['cname'];
			echo'</option>';
			}
	
				?>
			</select>
			<input type="text" class="submit" name="term" placeholder="Term" required="required" style="margin-left: 140px;">
			<br>
			<br>
			<input type="submit" class="submit" value="Insert" name="enrollSubmit" style="margin-left: 140px;">
</form>
	</div>


	<div style="background-color: white; height: 400px; display: none; height: 440px" class="form" id="mydiv3">
		<h1 style="text-align: center; ">Add Course</h1>
		<form action="" method="post" style="text-align: center;">
		<input type="text" name="CourseNO" placeholder="Course No." required="required">
		<input type="text" name="Cname" placeholder="Course Name" required="required">
		<input type="text" name="Instructor" placeholder="Instructor Name" required="required">
	<input type="submit" class="submit" value="Insert" name="CourseSub">
</form>
<form action="" method="post" style="text-align: center;">
	<h1 style="text-align: center;">Delete</h1>
	<input type="text" name="DcourseNO" placeholder="Course No." required="required">
	<input type="submit" class="submit" value="Delete" name="Dcoursesubmit">
	</form>
	</div>	

	<dir class="center" id="courseTable" style="display: none;" >
<table class="center" border="2">
	<col width="140">
	<col width="160">
	<col width="160">
	<tr>
		<th>Course No.</th>
		<th>Name</th>
		<th>Instructor</th>
	</tr>
	<?php
	$stmt = $conn->query("SELECT courseNo,cname,instructor FROM lab8.course");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $row['courseNo'];
	echo '</td>';
	echo '<td>';
	echo $row['cname'];
	echo '</td>';
	echo '<td>';
	echo $row['instructor'];
	echo '</td>';
		echo "</tr>";
	}
	?>
</table>
</dir>
<dir class="center" id="nodeTable" >
<table class="center" border="2">
	<col width="140">
	<!-- <col width="160"> -->
	<col width="160">
	<col width="120">
	<col width="120">
	<tr>
		<th>Roll no</th>
		<th>Name</th>
		<th>Cpi</th>
		<th>Age</th>
	</tr>
	<?php
	$stmt = $conn->query("SELECT sname, rollNo, cpi, age FROM lab8.student");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $row['rollNo'];
	echo '</td>';
	echo '<td>';
	echo $row['sname'];
	echo '</td>';
	echo '<td>';
	echo $row['cpi'];
	echo '</td>';
	echo '<td>';
	echo $row['age'];
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
	<tr>
		<th>Roll No.</th>
		<th>Course</th>
		<th>Term</th>
	</tr>
	<?php
	$stmt = $conn->query("SELECT rollNo,courseNo,term FROM lab8.enroll");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
	echo '<td>';
	echo $row['rollNo'];
	echo '</td>';
	echo '<td>';
	echo $row['courseNo'];
	echo '</td>';
	echo '<td>';
	echo $row['term'];
	echo '</td>';
		echo "</tr>";
	}
	?>
</table>
</dir>
</body>
</html>

<?php

if( isset($_POST['enrollSubmit']) && isset($_POST['getCourse']) && isset($_POST['getRoll']) && isset($_POST['getRoll']) ) {
	$sql = "INSERT INTO lab8.enroll(courseNo,rollNo,term) VALUES(:c,:r,:t)";
	$stmt = $conn->prepare($sql);
	try{
		// $roll = substr($_POST['getRoll'], 0,2);
		// $cou = substr($_POST['getCourse'], 0,5);
	$stmt->execute(
		array(
			':c' => $_POST['getCourse'], 
			':r' => $_POST['getRoll'],
			':t' => $_POST['term'],
			
		)
	);
	myAlert("Enroll data added Successfully");
	header("Refresh : 0");
	exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
}
	
}




?>

<?php

if( isset($_POST['CourseSub']) && isset($_POST['CourseNO']) && isset($_POST['Cname']) && isset($_POST['Instructor'])  ) {
	$sql = "INSERT INTO lab8.course(courseNo,cname,instructor) VALUES(:c,:cname,:ins)";
	$stmt = $conn->prepare($sql);
	try{
	$stmt->execute(
		array(
			':c' => $_POST['CourseNO'], 
			':cname' => $_POST['Cname'],
			':ins' => $_POST['Instructor'],
			
		)
	);
	myAlert("Course data added Successfully");
	header("Refresh : 0");
	exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
}
	
}

if( isset($_POST['Dcoursesubmit']) && isset($_POST['DcourseNO']) ) {
	$sql = "DELETE FROM lab8.course WHERE courseNo = :c";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':c',$_POST['DcourseNO']);
	$stmt->execute();
	if(!$stmt->rowCount()){
	myAlert("Course data not exists");
	header("Refresh : 0");
	exit();
}
	myAlert("Course data deleted Successfully");
	header("Refresh : 0");
	exit();
}



?>

<?php

if( isset($_POST['StuSubmit']) && isset($_POST['RollNo']) && isset($_POST['Sname']) && isset($_POST['Cpi']) && isset($_POST['Age']) ) {
	$sql = "INSERT INTO lab8.student(rollNo,sname,cpi,age) VALUES(:roll,:sname,:cpi,:age)";
	$stmt = $conn->prepare($sql);
	try{
	$stmt->execute(
		array(
			':roll' => $_POST['RollNo'], 
			':sname' => $_POST['Sname'],
			':cpi' => $_POST['Cpi'],
			':age' => $_POST['Age']
		)
	);
	myAlert("Student added Successfully");
	header("Refresh : 0");
	exit();
}catch(PDOException $e){
	myAlert("duplicate entry");
}
	
}
if( isset($_POST['Dstusubmit']) && isset($_POST['DrollNO']) ) {
	$sql = "DELETE FROM lab8.student WHERE rollNo = :roll";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':roll',$_POST['DrollNO']);
	$stmt->execute();
	if(!$stmt->rowCount()){
	myAlert("Student not exists");
	header("Refresh : 0");
	exit();
}
	myAlert("Student data deleted Successfully");
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
	var coursetab = document.getElementById("courseTable");
	function EdgeO(){
		if(x.style.display=='none'){
			etab.style.display='block';
			x.style.display="block";
			y.style.display = "none";
			z.style.display = "none";
			 ntab.style.display='none';
			 coursetab.style.display='none';
		}


	}
	function operation(){
		window.open("operations.php");
	}
	function NodeO(){
		
		if(y.style.display=='none'){
			y.style.display="block";
			ntab.style.display="block";
			x.style.display = "none";
			z.style.display = "none";
			etab.style.display='none';
			coursetab.style.display='none';
		}
		
	}
	function about(){
		if(z.style.display=='none'){
			coursetab.style.display='block';
			z.style.display="block";
			x.style.display = "none";
			y.style.display = "none";
			etab.style.display='none';
			ntab.style.display='none';
		}
	}

</script>