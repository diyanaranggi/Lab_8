<?php
include "db_connect.php";

$sql = "SELECT * FROM persons";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>ID: " . $row["ID"] . " - Name: " . $row["FirstName"] . " " . $row["LastName"] . "<br>";
        echo "Address: " . $row["Adress"] . "<br>City: " . $row["City"] . "</p>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
