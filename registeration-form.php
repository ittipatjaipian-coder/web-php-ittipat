<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <form action="registeration-accept.php" method="post">
        <label >ชื่อ-นามสกุล</label>
        <input type="text" name="username" required>

        <br>

        <label>อีเมล</label>
        <input type="email" name="userEmail" >
        <br>

        <label>เบอร์โทรศัพท์</label>
        <input type="tel" name="userPhone" required>
        <br>

        <label>รหัสผ่าน</label>
        <input type="password" name="userPass" required>
        <br>

        <label>เงินเดือนที่คาดหวัง</label>
        <input type="number" name="userSalary" required>
        <br>

        <label>วันที่เริ่มงานได้</label>
        <input type="date" name="userStartDate" required>
        <br>

        <label>เพศ</label>
        <input type="radio" name="userGender" value="ชาย">ชาย
        <input type="radio" name="userGender" value="หญิง">หญิง
        <input type="radio" name="userGender" value="อื่นๆ">อื่นๆ
        <br>

        <label>ตำเเหน่งงานที่สนใจ</label>
        <select name="userPosition" required>
            <option value="developer">Developer</option>
            <option value="designer">Designer</option>
            <option value="programmer">Programmer</option>
        </select>
        <br>

        <label>ทักษะความสามารถ</label>
        <input type="checkbox" name="ArraySkills[]" value="HTML"> HTML
        <input type="checkbox" name="ArraySkills[]" value="CSS"> CSS
        <input type="checkbox" name="ArraySkills[]" value="JavaScript"> JavaScript
        <input type="checkbox" name="ArraySkills[]" value="PHP"> PHP
        <br>

        <label>เเนะนำตัวเพิ่มเติม</label>
        <textarea name="userMsg"></textarea>
        <br>

        <input type="submit" value="ส่งใบสมัคร">
        <input type="reset" value="ล้างข้อมูล">
    </form>

</body>
</html>