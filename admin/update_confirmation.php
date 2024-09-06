<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";

// تأسيس اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال معرف الحجز الذي تم تأكيده
$reservationID = $_POST['reservation_id'];

// تحديث قيمة العمود "confirm" إلى 1 للحجز المحدد
$sql = "UPDATE reservations SET confirme = 1 WHERE reservation_id = $reservationID";

if ($conn->query($sql) === TRUE) {



} else {
    echo "حدث خطأ أثناء تحديث القيمة: " . $conn->error;
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>
