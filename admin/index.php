<!DOCTYPE html>
<html>
<head>
  <title>صفحة الإدارة</title>
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
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .admin-panel label {
      display: block;
      margin-bottom: 10px;
    }
    
    .admin-panel input[type="text"],
    .admin-panel input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #cccccc;
      border-radius: 3px;
    }
    
    .admin-panel button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .admin-panel button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="admin-panel">
    <h1>صفحة الإدارة</h1>
    <form>
      <label for="username">اسم المستخدم:</label>
      <input type="text" id="username" name="username" placeholder="أدخل اسم المستخدم">
      
      <label for="password">كلمة المرور:</label>
      <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور">
      
      <button type="submit">تسجيل الدخول</button>
    </form>
  </div>
</body>
</html>
