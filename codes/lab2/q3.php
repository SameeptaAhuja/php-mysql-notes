<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Reading Data</title>
	<style>
		table, th, td{
			border-collapse: collapse;
			text-align: center;
			/*table-layout: auto;*/
		}
		table.center{
			margin-left: auto;
			margin-right: auto;
		}
		th,td{
			padding: 10px;
			font-size: 150%;
			margin: 4px;
		}
		th{
			color: #0000cc;

		}
		td{
			color: #e65c00;
			font-weight: 600;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body style="background-color: deepskyblue">
	<h1 style="text-align: center; font-size: 250%">Reading Data from file</h1>
	<br>
<table class="center"  >
	<col width="180">
	<!-- <col width="160"> -->
	<col width="180">
	<col width="180">
	
	<tr>
		<th>Subject</th>
		<!-- <th>Code</th>
 -->		<th>Credits</th>
		<th>Grade</th>
	</tr>
	
	<?php
$fp = fopen('lab2_data.txt', 'r') or exit('<h1>Error in opening file</h2>');
$num=1;
$total=0.0;
$spi=0.0;
while (!feof($fp)) {

	fscanf($fp,"%s %s %s %s",$s,$c,$g,$a);
	$sub = substr($s,0,strlen($s)-1);
	$code = substr($c,0,strlen($c)-1);
	$grade = substr($g,0,strlen($g)-1);
	$credit = substr($a,0,strlen($a));
	
	switch ($credit) {
		case 'AA':
		$spi+=10*$grade;
			break;
		case 'AB':
		$spi+=9*$grade;
			break;
		case 'BB':
		$spi+=8*$grade;
			break;
		case 'BC':
		$spi+=7*$grade;
			break;
		case 'CC':
		$spi+=6*$grade;
			break;
		case 'CD':
		$spi+=5*$grade;
			break;
		case 'DD':
		$spi+=4*$grade;
			break;
		case 'F':
		$spi+=0*$grade;
			break;
		default:

			break;
	}
	$total+=(int)$grade;
	echo "<tr>";

	echo '<td>';
	$sub = str_replace('_', ' ', $sub);
	echo $sub;
	echo '</td>';

	// echo '<td>';
	// echo $code;
	// echo '</td>';

	echo '<td>';
	echo $grade;
	
	echo '</td>';

	echo '<td>';
	echo $credit;
	echo '</td>';
	
	echo '</tr>';
	$temp = $spi/($total);
	$ans = (string)$temp;
	
	unset($s);
	unset($c);
	unset($g);
	unset($a);
}

fclose($fp);
?>
</table>
<?php
echo '<h1 style="text-align: center; font-size: 150%; color: black;">';
echo "Student Spi is :   ";
echo round($ans,2);
echo '</h1>';
?>
</body>
</html>


