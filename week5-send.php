<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="week5-receive.php" method="get">
        <label >username</label>
        <input type="text" name="username" required>

        <br>

        <label>password</label>
        <input type="password" name="userPass" required>
        <br>

        <label>email</label>
        <input type="email" name="userEmail">
        <br>

        <label>age</label>
        <input type="number" name="userAge">
        <br>

        <label>birthdate</label>
        <input type="date" name="userBirth">
        <br>

        <label>เพศ</label>
        <input type="radio" name="userGender" value="ชาย">ชาย
        <input type="radio" name="userGender" value="หญิง">หญิง
        <input type="radio" name="userGender" value="อื่นๆ">อื่นๆ
        <br>

        <label>จังหวัด</label>
        <select name="userCity">
            <option value="ไม่ระบุ">-</option>
            <option value="กรุงเทพ">กรุงเทพ</option>
            <option value="เชียงใหม่">เชียงใหม่</option>
            <option value="ภูเก็ต">ภูเก็ต</option>
            <option value="ขอนแก่น">ขอนแก่น</option>
            <option value="นครราชสีมา">นครราชสีมา</option>
            <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
            <option value="อื่นๆ">อื่นๆ</option>

        </select>
        <br>

        <label>งานอดิเรก</label>
        <input type="checkbox" name="userHobby[]" value="อ่านหนังสือ">อ่านหนังสือ
        <input type="checkbox" name="userHobby[]" value="เล่นกีฬา">เล่นกีฬา
        <input type="checkbox" name="userHobby[]" value="ฟังเพลง">ฟังเพลง
        <input type="checkbox" name="userHobby[]" value="เล่นเกม">เล่นเกม

        <br>

        <label>ความคิดเห็น</label>
        <textarea name="userMsg"></textarea>
        
        <br>

        <input type="submit" name="submit" value="ส่งข้อมูล">
        <input type="reset" name="reset" value="ล้างข้อมูล">   

    </form>
</body>
</html>