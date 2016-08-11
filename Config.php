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

if ($result->num_rows > 0) {
    //data output
    $row = $result->fetch_assoc();
        
    foreach ($row as $value) {
        echo $value;
    }

    //}
    
} else {
    echo "Nie ma danych :(";
}

?>
