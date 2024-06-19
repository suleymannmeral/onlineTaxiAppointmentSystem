<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ilveilceapi";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all cities
$sql = "SELECT il_id, il FROM iller";
$result = $conn->query($sql);

$iller = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $iller[] = $row;
    }
}

// Fetch all districts
$sql = "SELECT ilce_id, ilce, il_id FROM ilceler";
$result = $conn->query($sql);

$ilceler = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ilceler[$row['il_id']][] = $row;
    }
}

// Output the data as JSON
echo json_encode(array("iller" => $iller, "ilceler" => $ilceler));

// Close the connection
$conn->close();
?>
