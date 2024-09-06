<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $offer_name = $_POST["offer_title"];
  $offer_description = $_POST["offer_description"];
  $offer_image = $_FILES["offer_image"];
  $start_date = $_POST["start_date"];
  $end_date = $_POST["end_date"];

  if (empty($offer_name) || empty($offer_description) || empty($offer_image) || empty($start_date) || empty($end_date)) {
    echo "يرجى ملء جميع الحقول.";
    exit;
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "resturant";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
  }

  $sql = "INSERT INTO offers (title, description, start_date, end_date) VALUES ('$offer_name', '$offer_description', '$start_date', '$end_date')";

  if ($conn->query($sql) === true) {
    $offer_id = $conn->insert_id;

    $targetDirectory = "img/offers/";
    $targetFile = $targetDirectory . basename($offer_image["name"]);

    if (move_uploaded_file($offer_image["tmp_name"], $targetFile)) {
      $updateSql = "UPDATE offers SET image='$targetFile' WHERE id='$offer_id'";
      if ($conn->query($updateSql) === true) {
        echo "تمت إضافة العرض والصورة بنجاح.";
      } else {
        echo "حدث خطأ أثناء تحديث سجل العرض: " . $conn->error;
      }
    } else {
      echo "حدث خطأ أثناء رفع الملف.";
    }
  } else {
    echo "حدث خطأ أثناء إضافة العرض: " . $conn->error;
  }

  $conn->close();
}
?>
