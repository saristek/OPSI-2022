<?php
// alamat root project
define('SIMPLE_CRUD_ROOT', './');
//including the database connection file
include_once("config.php");


// pemanggilan library dari file lain
$html = "";
$method            = 'GET';
require_once SIMPLE_CRUD_ROOT . 'pencarianVuln.php';

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead

?>

<html>

<head>
	<title>Homepage</title>
</head>

<body>
	<a href="add.html">Add New Data</a><br /><br />

	<table width='80%' border=0>

		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Age</td>
			<td>Email</td>
			<td>Update</td>
		</tr>
		<?php
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while ($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $res['name'] . "</td>";
			echo "<td>" . $res['age'] . "</td>";
			echo "<td>" . $res['email'] . "</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>

	<?php
	$page = "
	<div class=\"body_padded\">
		<h1>Vulnerability: SQL Injection</h1>
		<div class=\"vulnerable_code_area\">";
	$page .= "
			<form action=\"#\" method=\"{$method}\">
				<p>
					User ID:";
	$page .= "\n<input type=\"text\" size=\"15\" name=\"id\">";

	$page .= "\n<input type=\"submit\" name=\"Submit\" value=\"Submit\">
				</p>\n";
	$page .= "
			</form>";
	$page .= "
			{$html}
		</div>
	</div>\n";

	print $page;
	?>

</body>

</html>