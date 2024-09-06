<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";

$conn = new mysqli($servername, $username, $password, $dbname);

// Insert reservation into the database
$sql = "INSERT INTO reservations (customer_name, reservation_date, reservation_time, num_guests)
        VALUES ('$name', '$date', '$time', $guests)";

if ($conn->query($sql) === TRUE) {
session_start();
$_SESSION['booking_success'] = true;

    header("Location: index.php");
    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>