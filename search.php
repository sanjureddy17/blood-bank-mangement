<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $blood_group = $_GET['blood_group'];

    $sql = "SELECT * FROM donors WHERE blood_group = '$blood_group'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Available Donors</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row['name'] . ", Phone: " . $row['phone'] . "<br>";
        }
    } else {
        echo "No donors found for blood group $blood_group.";
    }
    $conn->close();
}
?>
