<?php
$servername = '89.77.118.160';
$DB_USERNAME = 'user';
$DB_PASSWORD = '666number';
$DB_NAME = 'BSB';

$conn = mysqli_connect($servername, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if (!$conn) {
    die("Failed to connect to MySQL: " .  mysqli_connect_error());
}

$sql = "SELECT BSText FROM BSB.BShits";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

print_r($rows);

?>
