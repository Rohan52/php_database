<html>

<?php

/*
$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	echo "error";
}
else
{
	echo "success";
}

if (!mysqli_select_db("test_db")) {
    echo "Unable to select mydbname: " . mysqli_error();
    exit;
}

$sql = "SELECT * FROM stud2";
$result = mysqli_query($sql);


while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]."<br>";
    }





mysqli_close($conn);

*/



$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

$r = mysqli_select_db($conn,"test_db");


$sql = "SELECT * FROM   stud2";

$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "Could not successfully run query ($sql) from DB: ";
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}

// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus

?>

<table border = 1>
<tr>
<td>
id</td>
<td>name</td>
<td>enroll</td>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";   
   echo "<td>" . $row["id"]. "</td>";
    echo "<td>" . $row["name"]. "</td>";
    echo "<td>" . $row["enroll"]. "</td>";
	
	echo "</tr>";
}

//mysql_free_result($result);

?>
</table>

</html>