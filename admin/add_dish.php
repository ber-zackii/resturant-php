<?php
// بيانات اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";
// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// إذا تم تقديم نموذج الإضافة
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dish_name = $_POST['dish_name'];
    $dish_description = $_POST['dish_description'];
    $dish_type = $_POST['dish_type'];
    $dish_price=$_POST['dish_price'];
    
    // معالجة الصورة المرفوعة
    $dish_image = $_FILES['dish_image']['name'];
    $target_dir = "img/dish/"; // المسار الذي ستتم فيه حفظ الصورة
    $target_file = $target_dir . basename($_FILES["dish_image"]["name"]);

    // رفع الصورة إلى المسار المحدد
    move_uploaded_file($_FILES["dish_image"]["tmp_name"], $target_file);

    // استخدام استعلام SQL لإضافة الطبق إلى قاعدة البيانات
    $sql = "INSERT INTO menu (dish_name, description,price,category,image_url) VALUES ('$dish_name', '$dish_description','$dish_price', '$dish_type', '$dish_image')";
    
    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة الطبق بنجاح!";
    } else {
        echo "حدث خطأ أثناء إضافة الطبق: " . $conn->error;
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>