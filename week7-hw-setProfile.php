<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ตั้งค่าโปรไฟล์ - สัปดาห์ที่ 7</title>
</head>
<body>
    <h2>กรอกข้อมูลโปรไฟล์ของคุณ</h2>
    
    <form action="week7-hw-showProfile.php" method="post" enctype="multipart/form-data">
        <label for="name">ชื่อ-นามสกุล:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="profile_img">เลือกรูปภาพโปรไฟล์:</label><br>
        <input type="file" id="profile_img" name="profile_img" accept="image/*" required><br><br>
        
        <button type="submit" name="submit">บันทึกข้อมูล</button>
    </form>
</body>
</html>