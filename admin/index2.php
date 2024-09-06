<!DOCTYPE html>
<html>
<head>
  <title>صفحة الإدارة - الرئيسية</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 20px;
    }
h1 {
  color: #333333;
  text-align: center;
}

.admin-panel {
  max-width: 800px;
  margin: 0 auto;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.booking-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.booking-table th, .booking-table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #dddddd;
}

.booking-table th {
  background-color: #f9f9f9;
  font-weight: bold;
}

.contact-info {
  margin-bottom: 20px;
}

.add-offer {
  margin-bottom: 20px;
}

.add-offer input[type="text"],
.add-offer textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #cccccc;
  border-radius: 3px;
  margin-bottom: 10px;
}

.add-offer button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.add-offer button:hover {
  background-color: #45a049;
}
  </style>
</head>
<body>
  <div class="admin-panel">
    <h1>صفحة الإدارة - الرئيسية</h1>


<h2>الحجوزات</h2>
<table class="booking-table">
  <tbody>
    <?php
      // قم بتأسيس اتصال بقاعدة البيانات هنا
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "resturant";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // قم بإعداد استعلام لاسترداد حجوزات المشرف
      $query = "SELECT * FROM reservations";

      // قم بتنفيذ الاستعلام
      $result = mysqli_query($conn, $query);

      // التحقق من وجود نتائج
      if (mysqli_num_rows($result) > 0) {
          // عرض الحجوزات
          echo "<tr><th>رقم الحجز</th><th>اسم العميل</th><th>تاريخ الحجز</th><th>وقت الحجز</th><th>عدد الضيوف</th></tr>";
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['reservation_id'] . "</td>";
              echo "<td>" . $row['customer_name'] . "</td>";
              echo "<td>" . $row['reservation_date'] . "</td>";
              echo "<td>" . $row['reservation_time'] . "</td>";
              echo "<td>" . $row['num_guests'] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>لا توجد حجوزات متاحة.</td></tr>";
      }

      // قم بإغلاق اتصال قاعدة البيانات هنا
      mysqli_close($conn);
    ?>
  </tbody>
</table>

<div class="contact-info">
      <h2>معلومات الاتصال</h2>
      <table class="booking-table">
      <tbody>

        <?php
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          $query = "SELECT * FROM ContactUs";

          // قم بتنفيذ الاستعلام
          $result = mysqli_query($conn, $query);

          // التحقق من وجود نتائج
          if (mysqli_num_rows($result) > 0) {
              // عرض معلومات الاتصال
              echo "<tr><th>الاسم </th><th> البريد الالكتروني</th><th> الرسالة</th><th> الوقت</th></tr>";

              while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                  echo "<td>". $row['name'] . "</td>";
                  echo "<td> " . $row['email'] . "</td>";
                  echo "<td> " . $row['message'] . "</td>";
                  echo "<td> " . $row['created_at'] . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='2'>لا توجد معلومات اتصال متاحة.</td></tr>";
          }

          mysqli_close($conn);
        ?>  </tbody>

      </table>
    </div>

<div class="add-offer">
      <h2>إضافة عرض جديد</h2>
      <form method="POST" action="add_offer.php">
        <input type="text" name="offer_title" placeholder="عنوان العرض">
        <textarea name="offer_description" placeholder="وصف العرض"></textarea>
        <label for="">تاريخ بداية العرض</label>
        <input type="date" name="start_date" placeholder="تاريخ بداية العرض">
        <br>
        <label for="">تاريخ نهاية العرض</label>
        <input type="date" name="end_date" placeholder="تاريخ نهاية العرض">
        <button type="submit">إضافة العرض</button>
      </form>
    </div>
  </div>
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>
</html>