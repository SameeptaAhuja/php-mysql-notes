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
	<title>Operations</title>
	<!-- <link rel="stylesheet"  href="table.css"> -->
	<style >
		div{
    float: left;
  }
  div.right{
  	clear: both;
  }
	</style>
</head>
<body>
	
	<div>
		<h2>Inner Join :</h2>
	<form action="" method="post" style="">
			
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
			<br>
			<br>
			<input type="submit" class="submit" value="Insert" name="InnerJoin" style="margin-left: 140px;">
		</form>
	<table border="2">
	<col width="80">
	<col width="80">
	<tr>
		<th>Roll No</th>
		<th>Name</th>
	</tr>
	<?php
	if(isset($_POST['getCourse']) && isset($_POST['InnerJoin'])){
	
	
	$cou = $_POST['getCourse'];
	$stmt = $conn->query("SELECT S.sname,S.rollNo
FROM lab8.student S, lab8.enroll E, lab8.course C
WHERE C.courseNo=E.courseNo AND E.rollNo=S.rollNo AND
C.courseNo='$cou';");
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $row['rollNo'];
	echo '</td>';
		echo '<td>';
	echo $row['sname'];
	echo '</td>';
		echo "</tr>";
	}
}

	?>
</table>
</div>

<div style="margin-left: 100px">
		<h2>Divison</h2>
		<form action="" method="post" style="">
			<input type="submit" class="submit" value="Divison" name="Divison" style="margin-left: 10px;">
		</form>
		<br>
		<br>
		<table border="2">
	<col width="80">
	<col width="80">
	<tr>
		<th>Roll No</th>
		<th>Name</th>
	</tr>
	<?php
	if(isset($_POST['Divison'])){
	
	$stmt = $conn->query("SELECT distinct E1.rollNo
FROM lab8.enroll E1
WHERE NOT EXISTS (SELECT C.courseNo
FROM lab8.course C
WHERE NOT EXISTS
(SELECT E2.rollNo
FROM lab8.enroll E2
WHERE E1.rollNo=E2.rollNo
AND
C.courseNo=E2.courseNo));");
	
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$cow = $row['rollNo'];
		$stmt1 = $conn->query("SELECT S.sname From lab8.student S WHERE S.rollNo='$cow';");
		while ($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo '<td>';
	echo $row['rollNo'];
	echo '</td>';
		echo '<td>';
	echo $row1['sname'];
	echo '</td>';
		echo "</tr>";
	}}
}

	?>
</table>
	</div>

	<div style="margin-left: 100px">
		<h2>Divison again :</h2>
	<form action="" method="post" style="">
			
			<label style="text-align: left; margin-left: 16px">Choose Instructor :</label>
			<select name='getIns' class="submit">
				<option value="Roll No">Instructor</option>
				<?php
				
	$stmt = $conn->query("SELECT distinct instructor FROM lab8.course");
	$n1=0;
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ){
			$tempc = $row['instructor'];
			echo "<option value=$tempc>";
			echo $row['instructor'];
			// echo " : ";
			// echo $row['cname'];
			echo'</option>';
			}
	
				?>
			</select>
			<br>
			<br>
			<input type="submit" class="submit" value="Insert" name="Divagain" style="margin-left: 140px;">
		</form>
	<table border="2" style="margin-left: 100px">
	<col width="80">
	<col width="80">
	<tr>
		<th>Roll No</th>
		<th>Name</th>
	</tr>
	<?php
	if(isset($_POST['Divagain']) &&isset($_POST['getIns'])){
		$ins = $_POST['getIns'];
	$stmt = $conn->query("SELECT courseNo FROM lab8.course WHERE instructor = '$ins';");
	$arr1 = array();
	$arr2 = array();
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		$cow = $row['courseNo'];
		$stmt1 = $conn->query("SELECT S.sname,S.rollNo
FROM lab8.student S, lab8.enroll E, lab8.course C
WHERE C.courseno=E.courseno AND E.rollno=S.rollno AND
C.courseNo='$cow';");
		while ($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
			array_push($arr1,$row1['sname']);
			array_push($arr2,$row1['rollNo']);
	}}
	$narr = array_unique(array_diff_assoc($arr1,array_unique($arr1)));
	$rollarr = array_unique(array_diff_assoc($arr2,array_unique($arr2)));
		reset($narr);  // most of the time this is not going to be needed,
reset($rollarr);  // but let's be technically accurate
// print_r($rollarr);

// while ((list($k1, $n) = each($narr)) && (list($k2, $t) = each($rollarr))) {
//     echo "<tr>";
// 		echo '<td>';
// 	echo $t;
// 	echo '</td>';
// 	echo '<td>';
// 	echo $n;
// 	echo '</td>';
// 		echo "</tr>";
// }
	foreach (array_combine($narr, $rollarr) as $v => $t) {
	    	echo "<tr>";
		echo '<td>';
	echo $t;
	echo '</td>';
	echo '<td>';
	echo $v;
	echo '</td>';
		echo "</tr>";
}
}

	?>
</table>
</div>

	<div style=" margin-top: 100px;" class="right">
		<h2>Cross Product :</h2>
	<form action="" method="post" style="">
			
			<label style="text-align: left; margin-left: 16px">Choose Tables :</label>
			<select name='getC1' class="submit">
				<option value="student">Student</option>
				<option value="course">Course</option>
				<option value="enroll">Enroll</option>
			</select>
			<select name='getC2' class="submit">
				<option value="student">Student</option>
				<option value="course">Course</option>
				<option value="enroll">Enroll</option>
			</select>
			
			<br>
			<br>
			<input type="submit" class="submit" value="Insert" name="Cross" style="margin-left: 140px;">
		</form>
	
	<?php
	if(isset($_POST['Cross']) &&isset($_POST['getC1'])  &&isset($_POST['getC2'])){
		$c1 = $_POST['getC1'];
	$c2 = $_POST['getC2'];
	if($c1==$c2){
		myAlert("Please Select Different Tables");
	}
	else if(($c1=='student' && $c2=='course') || ($c1=='course' && $c2=='student') ){
		echo '<table border="2" style="margin-left: 100px; margin-up:800px;">';
	echo '<col width="140">';
	echo "<tr>";
		echo '<th>rollNo</th>';
		echo '<th>sname</th>';
		echo '<th>cpi</th>';
		echo '<th>age</th>';
		echo '<th>courseNo</th>';
		echo '<th>cname</th>';
		echo '<th>instructor</th>';

	echo "</tr>";
	$stmt = $conn->query("SELECT S.*, C.*
FROM lab8.student S, lab8.course C;");
	
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
	}
	else if(($c1=='student' && $c2=='enroll') || ($c1=='enroll' && $c2=='student') ){
		echo '<table border="2" style="margin-left: 100px; margin-up:800px;">';
	echo '<col width="140">';
	echo "<tr>";
		echo '<th>rollNo</th>';
		echo '<th>sname</th>';
		echo '<th>cpi</th>';
		echo '<th>age</th>';
		echo '<th>courseNo</th>';
		echo '<th>term</th>';

	echo "</tr>";
	$stmt = $conn->query("SELECT S.*, E.*
FROM lab8.student S, lab8.enroll E;");
	
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
	echo '<td>';
	echo $row['courseNo'];
	echo '</td>';
	echo '<td>';
	echo $row['term'];
	echo '</td>';
		echo "</tr>";
	
	}
	}
	else if(($c1=='enroll' && $c2=='course') || ($c1=='course' && $c2=='enroll') ){
		echo '<table border="2" style="margin-left: 100px; margin-up:800px;">';
	echo '<col width="140">';
	echo "<tr>";
		echo '<th>courseNo</th>';
		echo '<th>cname</th>';
		echo '<th>instructor</th>';
		echo '<th>rollNo</th>';
		echo '<th>term</th>';

	echo "</tr>";
	$stmt = $conn->query("SELECT S.*, E.*
FROM lab8.enroll S, lab8.course E;");
	
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
	echo '<td>';
	echo $row['rollNo'];
	echo '</td>';
	echo '<td>';
	echo $row['term'];
	echo '</td>';
		echo "</tr>";
	
	}
	}
	
}

	?>
</table>
</div>





</form>
<?php
function myAlert($msg){
	echo "<script>alert('$msg');</script>";
}

?>
</body>
</html>