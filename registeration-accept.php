<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $userPass = $_POST['userPass'];
    $userSalary = $_POST['userSalary'];
    $userStartDate = $_POST['userStartDate'];
    $userGender = $_POST['userGender'];
    $userPosition = $_POST['userPosition'];
    $ArraySkills = $_POST['ArraySkills'];
    $userMsg = $_POST['userMsg'] ?: 'ไม่ระบุ';
    
}
echo "สวัสดีคุณ $username <br>";
echo "อีเมลของคุณคือ $userEmail <br>";
echo "เบอร์โทรศัพท์ของคุณคือ $userPhone <br>";
echo "รหัสผ่านของคุณคือ $userPass <br>";
echo "เงินเดือนที่คาดหวังของคุณคือ $userSalary <br>";
echo "วันที่เริ่มงานได้ของคุณคือ $userStartDate <br>";
echo "เพศของคุณคือ $userGender <br>";
echo "ตำแหน่งงานที่สนใจของคุณคือ $userPosition <br>";
echo "ทักษะความสามารถของคุณคือ " . implode(", ", $ArraySkills) . "<br>";
echo "ความคิดเห็นของคุณคือ $userMsg <br>";