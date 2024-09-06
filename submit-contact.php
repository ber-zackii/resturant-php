<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";

$conn = new mysqli($servername, $username, $password, $dbname);

// استلام البيانات من النموذج
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// استعلام إدخال البيانات في جدول ContactUs
$sql = "INSERT INTO ContactUs (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // تم إدخال البيانات بنجاح في قاعدة البيانات
    // هنا يمكنك إضافة أي رمز أو إعلان تؤكد أن الاتصال تم بنجاح
    
    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
    
    // إعادة التوجيه إلى الصفحة الرئيسية
    header("Location: index.php");
    exit();
} else {
    echo "حدث خطأ أثناء إدخال البيانات في قاعدة البيانات: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
