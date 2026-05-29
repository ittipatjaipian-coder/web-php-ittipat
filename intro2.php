<?php
// กำหนดข้อมูลส่วนตัวในตัวแปร PHP
$name = "อิทธิพัทธ์";
$hobbies = ["อ่านหนังสือ", "ฟังเพลง"];
$skills = ["HTML", "CSS", "PHP"];
$email = "ittipat@example.com";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แนะนำตัวเอง</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; background: #f9f9f9; margin: 40px; }
        .container { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px #ccc; max-width: 500px; margin: auto; }
        h1 { color: #2d6a4f; }
        ul { line-height: 1.8; }
    </style>
</head>
<body>
    <div class="container">
        <h1>สวัสดีครับ ผมชื่อ อิทธิพัทธ์ ใจเพียร<?php echo $name; ?></h1>
        <p>กำลังศึกษาเกี่ยวกับการพัฒนาเว็บด้วย PHP</p>
        <ul>
            <li>งานอดิเรก: <?php echo implode(", ", $hobbies); ?></li>
            <li>ทักษะ: <?php echo implode(", ", $skills); ?></li>
            <li>อีเมล: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
        </ul>
    </div>
</body>
</html>