<?php
// กำหนดตัวแปรสำหรับเก็บข้อผิดพลาดและข้อมูล
$errors = [];
$uploaded_file_path = "";
$user_name = "";

if (isset($_POST['submit'])) {
    // รับค่าชื่อจากฟอร์มและป้องกัน XSS
    $user_name = htmlspecialchars($_POST['name']);
    
    // กำหนดโฟลเดอร์ปลายทาง
    $target_dir = "uploads/hw/";
    
    // ตรวจสอบและสร้างโฟลเดอร์หากยังไม่มีอยู่
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file = $_FILES['profile_img'];
    $file_name = basename($file['name']);
    $target_file = $target_dir . time() . "_" . $file_name; // ตั้งชื่อใหม่โดยใช้ time() เพื่อป้องกันชื่อซ้ำ
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ==========================================
    // ตรวจสอบ 5 ขั้นตอนการอัพโหลดไฟล์
    // ==========================================

    // ขั้นตอนที่ 1: ตรวจสอบการส่งไฟล์ว่ามีข้อผิดพลาดจากระบบหรือไม่ (Upload Error Code)
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "เกิดข้อผิดพลาดในการอัพโหลดไฟล์จากระบบ (รหัส: " . $file['error'] . ")";
    }

    // ขั้นตอนที่ 2: ตรวจสอบว่าเป็นไฟล์ภาพจริง (Check if image file is a actual image)
    if (empty($errors)) {
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            $errors[] = "ไฟล์ที่เลือกไม่ใช่ไฟล์ภาพจริง";
        }
    }

    // ขั้นตอนที่ 3: ตรวจสอบว่ามีไฟล์ชื่อนี้อยู่แล้วหรือไม่ (Check if file already exists)
    if (file_exists($target_file)) {
        $errors[] = "ขออภัย, มีไฟล์ชื่อนี้อยู่ในระบบแล้ว";
    }

    // ขั้นตอนที่ 4: ตรวจสอบขนาดของไฟล์ (Check file size) - ตัวอย่างนี้จำกัดไม่เกิน 2MB
    if ($file['size'] > 2000000) {
        $errors[] = "ขออภัย, ไฟล์ของคุณมีขนาดใหญ่เกินไป (จำกัดไม่เกิน 2MB)";
    }

    // ขั้นตอนที่ 5: ตรวจสอบนามสกุลไฟล์ที่อนุญาต (Allow certain file formats)
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        $errors[] = "ขออภัย, อนุญาตให้ใช้เฉพาะไฟล์นามสกุล JPG, JPEG, PNG และ GIF เท่านั้น";
    }

    // ==========================================
    // ขั้นตอนการย้ายไฟล์และแสดงผล                                                                                          
    if (empty($errors)) {
        
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $uploaded_file_path = $target_file;
        } else {
            $errors[] = "เกิดข้อผิดพลาดระหว่างย้ายไฟล์ไปยังโฟลเดอร์ปลายทาง";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แสดงผลโปรไฟล์ - สัปดาห์ที่ 7</title>
    <style>
        .profile-container { border: 1px solid #ccc; padding: 20px; width: 300px; text-align: center; margin-top: 20px; }
        .profile-img { width: 100%; max-width: 250px; height: auto; border-radius: 8px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>โปรไฟล์ของคุณ</h2>

    <?php 
    
    if (!empty($errors)) {
        echo "<div class='error'><h3>ไม่สามารถอัพโหลดไฟล์ได้เนื่องจาก:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul></div>";
        echo "<br><a href='week7-hw-setProfile.php'>กลับไปหน้าฟอร์ม</a>";
    } 
    
    elseif (!empty($uploaded_file_path)) { 
    ?>
        <div class="profile-container">
            <img src="<?php echo $uploaded_file_path; ?>" alt="Profile Image" class="profile-img">
            <h3><?php echo $user_name; ?></h3>
        </div>
        <br>
        <a href='week7-hw-setProfile.php'>อัพโหลดใหม่อีกครั้ง</a>
    <?php } else { ?>
        <p>ไม่มีข้อมูลการส่งฟอร์ม กรุณาเข้าใช้งานจากหน้า <a href="week7-hw-setProfile.php">สัปดาห์ที่ 7 ฟอร์มตั้งค่าโปรไฟล์</a></p>
    <?php } ?>
</body>
</html>