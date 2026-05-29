
<?php
// กำหนดข้อมูลส่วนตัว
$name = "อิทธิพัทธ์ ใจเพียร";
$age = 18;
$class = "ปวส. 1";
$major = "เทคโนโลยีสารสนเทศ";
$student_id = "69319010028";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แนะนำตัวเอง</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; background: #f0f0f0; margin: 40px; }
        .intro-box { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px #ccc; max-width: 450px; margin: auto; }
        h1 { color: #2d6a4f; }
        ul { line-height: 1.8; }
    </style>
</head>
<body>
    <div class="intro-box">
        <h1>แนะนำตัวเอง</h1>
        <ul>
            <li>ชื่อ: <?php echo $name; ?></li>
            <li>อายุ: <?php echo $age; ?> ปี</li>
            <li>ชั้น: <?php echo $class; ?></li>
            <li>สาขา: <?php echo $major; ?></li>
            <li>รหัสนักศึกษา: <?php echo $student_id; ?></li>
        </ul>
    </div>
</body>
</html>