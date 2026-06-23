<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
$name = $_GET['username'] ?? 'ไม่ระบุ';
$password = $_GET['userPass'] ?? 'ไม่ระบุ';
$email = $_GET['userEmail'] ?? 'ไม่ระบุ';
$age = $_GET['userAge'] ?: 'ไม่ระบุ';
$birth = $_GET['userBirth'] ?: 'ไม่ระบุ';
$gender = $_GET['userGender'] ?? 'ไม่ระบุ';
$city = $_GET['userCity'] ?? 'ไม่ระบุ';
$hobby = $_GET['userHobby'] ?? ['ไม่ระบุ'];  
$message = $_GET['userMsg'] ?: 'ไม่ระบุ';
}

echo"สวัสดีคุณ $name <br>";
echo"รหัสผ่านของคุณคือ $password <br>";
echo"อีเมลของคุณคือ $email <br>";
echo "วันเกิดของคุณคือ $birth <br>";
echo "อายุของคุณคือ $age <br>";
echo "เพศของคุณคือ $gender <br>";
echo "จังหวัดของคุณคือ $city <br>";
echo "งานอดิเรกของคุณคือ " . implode(", ", $hobby);
echo "<br>";
echo "ความคิดเห็นของคุณคือ $message<br>";
?>