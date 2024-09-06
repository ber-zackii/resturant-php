<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من وجود أي أخطاء في الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
/*جدول العروض:
CREATE TABLE Offers (
offer_id INT AUTO_INCREMENT PRIMARY KEY,
offer_name VARCHAR(50) NOT NULL,
offer_description TEXT,
offer_start_date DATE,
offer_end_date DATE,
-- أضف المزيد من الأعمدة حسب حاجتك
); */


?>
