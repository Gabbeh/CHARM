<?php
	session_start();
	if (isset($_SESSION['auth'])) {
    	if ($_SESSION["auth"] != 1) {
        	header("Location: CHARMindex.php");
    }
	} else {
    	header("Location: CHARMindex.php");
	}
	$host = "localhost";
	$user = "CHARM";
	$pass = "5*Hotel";
	mysql_connect($host, $user, $pass) or die("Could not connect: " . mysql_error());
	mysql_select_db("testCHARM");
	
	date_default_timezone_set("America/Edmonton");
	$date = "2014-02-05";
	//$date = Date("Y-m-d"); not usable right now w/test data from before today's date!
	
	$result = mysql_query("SELECT AVG(value) AS test1 FROM t1 WHERE DATE(logtime) = '$date'");
	$row = mysql_fetch_row($result);
	$result1 = mysql_query("SELECT AVG(value) AS test2 FROM t2 WHERE DATE(logtime) = '$date'");
	$row1 = mysql_fetch_row($result1);
	$result2 = mysql_query("SELECT SUM(value) AS test3 FROM t3 WHERE DATE(logtime) = '$date'");
	$row2 = mysql_fetch_row($result2);
	$result3 = mysql_query("SELECT AVG(total) FROM t1_day WHERE logdate >= DATE(DATE_SUB('$date', INTERVAL 7 DAY))");
	$row3 = mysql_fetch_row($result3);
	$result4 = mysql_query("SELECT AVG(total) FROM t2_day WHERE logdate >= DATE(DATE_SUB('$date', INTERVAL 7 DAY))");
	$row4 = mysql_fetch_row($result4);
	$result5 = mysql_query("SELECT AVG(total) FROM t3_day WHERE logdate >= DATE(DATE_SUB('$date', INTERVAL 7 DAY))");
	$row5 = mysql_fetch_row($result5);
	$result6 = mysql_query("SELECT AVG(total) FROM t1_day WHERE logdate >= DATE(DATE_SUB('$date', INTERVAL 30 DAY))");
	$row6 = mysql_fetch_row($result6);
	$result7 = mysql_query("SELECT AVG(total) FROM t2_day WHERE logdate >= DATE(DATE_SUB('$date', INTERVAL 30 DAY))");
	$row7 = mysql_fetch_row($result7);
	$result8 = mysql_query("SELECT AVG(total) FROM t3_day WHERE logdate >= DATE(DATE_SUB('$date', INTERVAL 30 DAY))");
	$row8 = mysql_fetch_row($result8);

	echo "<p style = \"color:#2191C0;font-weight:bold\">Last 24 hours</p>";
	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<td>Power used (W)</td>";
	echo "<td>" . $row[0] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Power generated (W)</td>";
	echo "<td>" . $row1[0] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td> Current recorded (A)</td>";
	echo "<td>" . $row2[0] . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<br>";
	echo "<p style = \"color:#2191C0;font-weight:bold\">Last Week</p>";
	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<td>Power used (W)</td>";
	echo "<td>" . $row3[0] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Power generated (W)</td>";
	echo "<td>" . $row4[0] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td> Current recorded (A)</td>";
	echo "<td>" . $row5[0] . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<br>";
	echo "<p style = \"color:#2191C0;font-weight:bold\">Last Month</p>";
	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<td>Power used (W)</td>";
	echo "<td>" . $row6[0] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Power generated (W)</td>";
	echo "<td>" . $row7[0] . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td> Current recorded (A)</td>";
	echo "<td>" . $row8[0] . "</td>";
	echo "</tr>";
	echo "</table>";
?>
