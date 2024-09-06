<?php include_once "cdb.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>مطعم أبو راشد</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#menu">القائمة</a></li>
                <li><a href="#offers">العروض</a></li>
                <li><a href="#reservation">الحجوزات</a></li>
                <li><a href="#contact">الاتصال</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>مطعم أبو راشد</h1>
        <p>تجربة فريدة من نوعها في عالم الطعام</p>
        <a href="#" class="btn" id="bookNowBtn">احجز الآن</a>
    </section>

    <section class="about">
        <h2>من نحن</h2>
        <p>نحن مطعم أبو راشد نقدم أشهى المأكولات بجودة عالية وأسعار معقولة. انضم إلينا واستمتع بتجربة طهي فريدة وقائمة متنوعة تلبي جميع الأذواق.</p>
    </section>

    <section class="offers" id="offers">
    <h2>العروض الحالية</h2>
    <?php
    // توصيل قاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resturant";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }
    
    // استعلام استرداد العروض من قاعدة البيانات
    $sql = "SELECT * FROM offers";
    $result = $conn->query($sql);
    
    // عرض العروض
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="offer">';
            echo '<img src="admin/' . $row["image"] . '" alt="صورة العرض">';
            echo '<h3>' . $row["title"] . '</h3>';
            echo '<p>' . $row["description"] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>لا توجد عروض متاحة حاليًا.</p>';
    }
    
    // إغلاق اتصال قاعدة البيانات
    $conn->close();
    ?>
</section>


    <section class="menu" id="menu">
        <h2>القائمة</h2>
        <ul>
            <li><a href="#appetizers-card">المقبلات</a></li>
            <li><a href="#salads-card">السلطات</a></li>
            <li><a href="#main-dishes-card">الأطباق الرئيسية</a></li>
            <li><a href="#beverages-card">المشروبات</a></li>
            <li><a href="#desserts-card">الحلويات</a></li>
            <!-- اضف هنا البنود الإضافية للقائمة -->
        </ul>
    </section>
    <div class="carddd">
    <section id="appetizers-card" class="menu-card">
        <h3>بطاقات المقبلات</h3>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";
// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
// استدعاء ملف الاتصال بقاعدة البيانات (يفترض أنه يحتوي على متغيرات الاتصال بقاعدة البيانات)

// استعلام SQL لاسترداد بيانات الأطباق من قاعدة البيانات
$sql = "SELECT * FROM menu where category = 'appetizer'";
$result = mysqli_query($conn, $sql);

// التحقق مما إذا كانت هناك نتائج
if (mysqli_num_rows($result) > 0) {
    // عرض الأطباق في قالب HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image_url'];
        $name = $row['dish_name'];
        $description = $row['description'];
        $price = $row['price'];

        echo '<div class="menu-item">';
        echo '<img src="admin/img/dish/' . $image . '" alt="' . $name . '">';
        echo '<h4>' . $name . '</h4>';
        echo '<p>' . $description . '</p>';
        echo '<span class="price">' . $price . ' ريال</span>';
        echo '</div>';
    }
} else {
    echo 'لا توجد مقبلات متاحة حاليًا.';
}

?>
        
    </section>

    <section id="salads-card" class="menu-card">
        <h3>بطاقات السلطات</h3>
       
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";
// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
// استدعاء ملف الاتصال بقاعدة البيانات (يفترض أنه يحتوي على متغيرات الاتصال بقاعدة البيانات)

// استعلام SQL لاسترداد بيانات الأطباق من قاعدة البيانات
$sql = "SELECT * FROM menu where category = 'salad'";
$result = mysqli_query($conn, $sql);

// التحقق مما إذا كانت هناك نتائج
if (mysqli_num_rows($result) > 0) {
    // عرض الأطباق في قالب HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image_url'];
        $name = $row['dish_name'];
        $description = $row['description'];
        $price = $row['price'];

        echo '<div class="menu-item">';
        echo '<img src="admin/img/dish/' . $image . '" alt="' . $name . '">';
        echo '<h4>' . $name . '</h4>';
        echo '<p>' . $description . '</p>';
        echo '<span class="price">' . $price . ' ريال</span>';
        echo '</div>';
    }
} else {
    echo 'لا توجد سلطات متاحة حاليًا.';
}

?>

    </section>

    <section id="main-dishes-card" class="menu-card">
        <h3>بطاقات الأطباق الرئيسية</h3>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";
// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
// استدعاء ملف الاتصال بقاعدة البيانات (يفترض أنه يحتوي على متغيرات الاتصال بقاعدة البيانات)

// استعلام SQL لاسترداد بيانات الأطباق من قاعدة البيانات
$sql = "SELECT * FROM menu where category = 'main_dish'";
$result = mysqli_query($conn, $sql);

// التحقق مما إذا كانت هناك نتائج
if (mysqli_num_rows($result) > 0) {
    // عرض الأطباق في قالب HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image_url'];
        $name = $row['dish_name'];
        $description = $row['description'];
        $price = $row['price'];

        echo '<div class="menu-item">';
        echo '<img src="admin/img/dish/' . $image . '" alt="' . $name . '">';
        echo '<h4>' . $name . '</h4>';
        echo '<p>' . $description . '</p>';
        echo '<span class="price">' . $price . ' ريال</span>';
        echo '</div>';
    }
} else {
    echo 'لا توجد أطباق متاحة حاليًا.';
}

?>
    </section>
    
    <section id="beverages-card" class="menu-card">
        <h3>بطاقات المشروبات</h3>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";
// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
// استدعاء ملف الاتصال بقاعدة البيانات (يفترض أنه يحتوي على متغيرات الاتصال بقاعدة البيانات)

// استعلام SQL لاسترداد بيانات الأطباق من قاعدة البيانات
$sql = "SELECT * FROM menu where category = 'beverage'";
$result = mysqli_query($conn, $sql);

// التحقق مما إذا كانت هناك نتائج
if (mysqli_num_rows($result) > 0) {
    // عرض الأطباق في قالب HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image_url'];
        $name = $row['dish_name'];
        $description = $row['description'];
        $price = $row['price'];

        echo '<div class="menu-item">';
        echo '<img src="admin/img/dish/' . $image . '" alt="' . $name . '">';
        echo '<h4>' . $name . '</h4>';
        echo '<p>' . $description . '</p>';
        echo '<span class="price">' . $price . ' ريال</span>';
        echo '</div>';
    }
} else {
    echo 'لا توجد مشروبات متاحة حاليًا.';
}

?>
    </section>
    
    <section id="desserts-card" class="menu-card">
        <h3>بطاقات التحليات</h3>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resturant";
// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
// استدعاء ملف الاتصال بقاعدة البيانات (يفترض أنه يحتوي على متغيرات الاتصال بقاعدة البيانات)

// استعلام SQL لاسترداد بيانات الأطباق من قاعدة البيانات
$sql = "SELECT * FROM menu where category = 'dessert'";
$result = mysqli_query($conn, $sql);

// التحقق مما إذا كانت هناك نتائج
if (mysqli_num_rows($result) > 0) {
    // عرض الأطباق في قالب HTML
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image_url'];
        $name = $row['dish_name'];
        $description = $row['description'];
        $price = $row['price'];

        echo '<div class="menu-item">';
        echo '<img src="admin/img/dish/' . $image . '" alt="' . $name . '">';
        echo '<h4>' . $name . '</h4>';
        echo '<p>' . $description . '</p>';
        echo '<span class="price">' . $price . ' ريال</span>';
        echo '</div>';
    }
} else {
    echo 'لا توجد تحليات متاحة حاليًا.';
}

?>
    </section>
    
</div>

<section class="reservation" id="reservation">
    <div class="inf">
    <h2>احجز طاولة</h2>
    <form class="reservation-form" action="submit-reservation.php" method="post">
        <label for="name">الاسم:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">رقم الهاتف:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="date">تاريخ الحجز:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">وقت الحجز:</label>
        <input type="time" id="time" name="time" required >

        <label for="guests">عدد الضيوف:</label>
        <select id="guests" name="guests" required>
            <option value="1">ضيف واحد</option>
            <option value="2">ضيفان</option>
            <option value="3">3 ضيوف</option>
            <option value="4">4 ضيوف</option>
            <option value="5">5 ضيوف</option>
        </select>

        <button type="submit">حجز</button>
    </form>
</div>
<div class="imgif" style="background-image: url('css/5.jpg');    background-size: cover;
">

</div>
</section>






<section class="contact" id="contact">
    <h2>اتصل بنا</h2>
    <p>نحن نتطلع للتواصل معكم. يُرجى ملء النموذج أدناه وسنقوم بالرد عليكم في أقرب وقت ممكن.</p>
    
    <form class="contact-form" action="submit-contact.php" method="post">
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="message">الرسالة:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit">إرسال</button>
        </div>
    </form>
</section>

    <footer>
        <p>جميع الحقوق محفوظة &copy; 2023 مطعم أبو راشد</p>


    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>احجز طاولة الآن</h2>
            <form class="reservation-form" action="submit-reservation.php" method="post">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="phone">رقم الهاتف:</label>
                <input type="tel" id="phone" name="phone" required><br><br>
                <label for="date">تاريخ الحجز:</label>
                <input type="date" id="date" name="date" required><br><br>
                <label for="time">وقت الحجز:</label>
                <input type="time" id="time" name="time" required><br><br>
                <select id="guests" name="guests" required>
                    <option value="1">ضيف واحد</option>
                    <option value="2">ضيفان</option>
                    <option value="3">3 ضيوف</option>
                    <option value="4">4 ضيوف</option>
                    <option value="5">5 ضيوف</option>
                </select>
                <input type="submit" value="أحجز">
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
    
</body>
</html>
