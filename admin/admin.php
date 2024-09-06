<!DOCTYPE html>
<html>
<head>
  <title>صفحة الإدارة - الرئيسية</title>
  <style>
    body {
        direction: rtl;
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

    .booking-table th,
    .booking-table td {
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



    /* تنسيق الأزرار */
button {
  background-color: #4CAF50; /* لون الخلفية */
  color: white; /* لون النص */
  border: none; /* إزالة الحدود */
  padding: 10px 20px; /* هامش داخلي */
  text-align: center; /* محاذاة النص في الوسط */
  text-decoration: none; /* إزالة تأثير الزخرفة */
  display: inline-block; /* عرض الزر كعنصر مستقل */
  font-size: 16px; /* حجم النص */
  margin: 4px 2px; /* هامش خارجي */
  cursor: pointer; /* تحويل المؤشر إلى شكل يد عند التحويب على الزر */
  border-radius: 4px; /* إضافة حواف منحنية */
}

/* تنسيق زر الحجوزات */
button:nth-child(1) {
  background-color: #4CAF50; /* تغيير لون الخلفية للون الأخضر */
}
/* تنسيق زر معلومات الاتصال */
button:nth-child(2) {
  background-color: #e67e22;
}
/* تنسيق زر إضافة عرض */
button:nth-child(3) {
  background-color: #9b59b6;
}
button:nth-child(4) {
  background-color: #008CBA; /* تغيير لون الخلفية للون الأزرق */
}
button:nth-child(6) {
  background-color: #FFA500; /* لون برتقالي زاهي */
}
.search-box {
  margin-bottom: 20px;
}

.search-box input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #cccccc;
  border-radius: 3px;
  font-size: 16px;
  background-color: #f9f9f9;
}

.search-box input[type="text"]:focus {
  outline: none;
  border-color: #4CAF50;
}

.search-box input[type="text"]::placeholder {
  color: #999999;
}

#add-dish form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #add-dish label {
            display: block;
            margin-bottom: 10px;
        }

        #add-dish input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        #add-dish input[type="file"] {
            margin-top: 10px;
        }

        #add-dish input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
        }

        #add-offer {
  display: none;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
}

#add-offer h2 {
  color: #333;
  margin-bottom: 10px;
}

#add-offer label {
  font-weight: bold;
}

#add-offer input[type="text"],
#add-offer textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

#add-offer input[type="date"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

#add-offer button[type="submit"] {
  background-color: #008CBA;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

#add-offer button[type="submit"]:hover {
  background-color: #006080;
}

  </style>
</head>
<body>
  <div class="admin-panel">
    <h1>صفحة الإدارة - الرئيسية</h1>

    <button id="df" onclick="showReservations()">الحجوزات</button>
    <button onclick="showConfirmedReservations()">تأكيد الحجوزات</button>
    <button onclick="showContactInfo()">معلومات الاتصال</button>
    <button onclick="showAddOffer()">إضافة عرض</button>
    <button onclick="showAddDish()">إضافة طبق</button>



    <div id="reservations" style="display: none;">
      <h2>الحجوزات</h2>
      <div class="search-box">
    <input type="text" id="searchInput" placeholder="ابحث عن حجز...">
  </div>
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
            $query = "SELECT * FROM reservations WHERE confirme = 0";

            // قم بتنفيذ الاستعلام
            $result = mysqli_query($conn, $query);

            // التحقق من وجود نتائج
            if (mysqli_num_rows($result) > 0) {
              // عرض الحجوزات
              echo "<tr><th>رقم الحجز</th><th>اسم العميل</th><th>تاريخ الحجز</th><th>وقت الحجز</th><th>عدد الضيوف</th>        <th>تأكيد الحضور</th>
              </tr>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['reservation_id'] . "</td>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['reservation_date'] . "</td>";
                echo "<td>" . $row['reservation_time'] . "</td>";
                echo "<td>" . $row['num_guests'] . "</td>";
                echo "<td><button onclick=\"confirmAttendance(" . $row['reservation_id'] . ")\">تأكيد</button></td>";

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
    </div>


    <div id="reservations_confirme" style="display: none;">
      <h2>الحجوزات المؤكدة</h2>
      <div class="search-box">
      <input type="text" id="searchInput" placeholder="ابحث عن حجز...">
  </div>
      <table class="booking-table">
        <tbody id="confirmed-reservations">
          <?php
            // قم بتأسيس اتصال بقاعدة البيانات هنا
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "resturant";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // قم بإعداد استعلام لاسترداد حجوزات المشرف
            $query = "SELECT * FROM reservations WHERE confirme = 1";

            // قم بتنفيذ الاستعلام
            $result = mysqli_query($conn, $query);

            // التحقق من وجود نتائج
            if (mysqli_num_rows($result) > 0) {
              // عرض الحجوزات
              echo "<tr><th>رقم الحجز</th><th>اسم العميل</th><th>تاريخ الحجز</th><th>وقت الحجز</th><th>عدد الضيوف</th>     
              </tr>";
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
    </div>

    <div id="contact-info" style="display: none;">
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
              echo "<tr><td colspan='4'>لا توجد معلومات اتصال متاحة.</td></tr>";
            }

            mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>

    <div id="add-dish" style="display: none;">
    <h2>إضافة طبق جديد</h2>
    <form method="POST" action="add_dish.php" enctype="multipart/form-data">
    <label for="dish_image">صورة الطبق:</label><br>
        <input type="file" id="dish_image" name="dish_image" required>
        <br>
        <label for="dish_name">اسم الطبق:</label>
        <input type="text" id="dish_name" name="dish_name" required>
        <br>
        <label for="dish_description">وصف الطبق:</label>
        <textarea id="dish_description" name="dish_description" required></textarea>
        <br>
        <label for="dish_type">نوع الطبق:</label>
        <select id="dish_type" name="dish_type" required>
            <option value="main_dish">طبق رئيسي</option>
            <option value="appetizer">مقبلات</option>
            <option value="dessert">تحلية</option>
            <option value="beverage">مشروب</option>
            <option value="salad">سلطة</option>
        </select>
        <br>
        <label for="dish_price">سعر الطبق:</label>
        <input type="number" id="dish_price" name="dish_price" value="0" required>
        <br>
       
        <input type="submit" value="إضافة الطبق">
    </form>
    </div>



    <div id="add-offer" style="display: none;">
      <h2>إضافة عرض جديد</h2>
      <form method="POST" action="add_offer.php" enctype="multipart/form-data">

      <label for="offer_image">صورة العرض:</label> <br>
      <input type="file" name="offer_image" id="offer_image"><br>

        <label for="">عنوان العرض</label> <br>
        <input type="text" name="offer_title" placeholder="عنوان العرض"> <br>
        <br>
        <label for="">وصف العرض</label> <br>
        <textarea name="offer_description" placeholder="وصف العرض"></textarea> <br>
        <br>
        <label for="start_date">تاريخ بداية العرض:</label> <br>
        <input type="date" name="start_date" id="start_date">
        <br>
        <label for="end_date">تاريخ نهاية العرض:</label> <br>
        <input type="date" name="end_date" id="end_date"> <br> <br>
        <button type="submit">إضافة العرض</button>
      </form>
    </div>
  </div>

  <script>
    function showReservations() {
      var reservationsDiv = document.getElementById("reservations");
      var contactInfoDiv = document.getElementById("contact-info");
      var addOfferDiv = document.getElementById("add-offer");
      var reservationsDivc = document.getElementById("reservations_confirme");
      var addDish = document.getElementById("add-dish");
      addDish.style.display = "none";
      
      reservationsDiv.style.display = "block";
      reservationsDivc.style.display = "none";
      contactInfoDiv.style.display = "none";
      addOfferDiv.style.display = "none";
      var searchInput = document.getElementById("searchInput");
  searchInput.addEventListener("input", searchReservations);
    }

    function showAddDish() {
      var addDish = document.getElementById("add-dish");

      var reservationsDiv = document.getElementById("reservations");
      var contactInfoDiv = document.getElementById("contact-info");
      var addOfferDiv = document.getElementById("add-offer");
      var reservationsDivc = document.getElementById("reservations_confirme");
      
      addDish.style.display = "block";

      reservationsDiv.style.display = "none";
      reservationsDivc.style.display = "none";
      contactInfoDiv.style.display = "none";
      addOfferDiv.style.display = "none";
      var searchInput = document.getElementById("searchInput");
  searchInput.addEventListener("input", searchReservations);
    }

    function showContactInfo() {
      var reservationsDiv = document.getElementById("reservations");
      var contactInfoDiv = document.getElementById("contact-info");
      var addOfferDiv = document.getElementById("add-offer");
      var reservationsDivc = document.getElementById("reservations_confirme");

      var addDish = document.getElementById("add-dish");
      addDish.style.display = "none";
      reservationsDivc.style.display = "none";
      reservationsDiv.style.display = "none";
      contactInfoDiv.style.display = "block";
      addOfferDiv.style.display = "none";
    }

    function showAddOffer() {
      var reservationsDiv = document.getElementById("reservations");
      var contactInfoDiv = document.getElementById("contact-info");
      var addOfferDiv = document.getElementById("add-offer");
      var reservationsDivc = document.getElementById("reservations_confirme");
      var addDish = document.getElementById("add-dish");
      addDish.style.display = "none";
     
      reservationsDivc.style.display = "none";
      reservationsDiv.style.display = "none";
      contactInfoDiv.style.display = "none";
      addOfferDiv.style.display = "block";
    }

 

  function searchReservations() {
    var filter = searchInput.value.toUpperCase();
    var table = document.querySelector("#reservations .booking-table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) {
      var rowData = rows[i].textContent.toUpperCase();
      if (rowData.indexOf(filter) > -1) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }


  function confirmAttendance(reservationId) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_confirmation.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // استجابة ناجحة، قم بتحديث الواجهة بما يناسبك هنا
      alert("تم تأكيد الحجز!");
      // تحديث جدول الحجوزات بعد التأكيد
      showReservations();
    }
  };
  xhr.send("reservation_id=" + reservationId);
}

function showConfirmedReservations() {
  var reservationsDivc = document.getElementById("reservations_confirme");
  var reservationsDiv = document.getElementById("reservations");
  var addDish = document.getElementById("add-dish");
      addDish.style.display = "none";
  var contactInfoDiv = document.getElementById("contact-info");
  var addOfferDiv = document.getElementById("add-offer");

  reservationsDivc.style.display = "block";
  reservationsDiv.style.display = "none";
  contactInfoDiv.style.display = "none";
  addOfferDiv.style.display = "none";
  var searchInput = document.getElementById("searchInput");
  searchInput.addEventListener("input", searchConfirmedReservations);
}
function searchConfirmedReservations() {
  var filter = searchInput.value.toUpperCase();
  var table = document.querySelector("#confirmed-reservations .booking-table");
  var rows = table.getElementsByTagName("tr");

  for (var i = 1; i < rows.length; i++) {
    var rowData = rows[i].textContent.toUpperCase();
    if (rowData.indexOf(filter) > -1) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}

  </script>

 <!-- <script>
  // تحديث الصفحة كل 3 ثوانٍ
  setInterval(function() {
    location.reload();
  }, 3000);
</script>-->




</body>
</html>
