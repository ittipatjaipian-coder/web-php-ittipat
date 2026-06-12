<?php
// ...existing code...
// ประมวลผลฟอร์ม: สูตรคูณ และ การบวก
$tableResult = "";
$addResult = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST['form'] ?? '';

    if ($form === 'table') {
        $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
        $max = filter_input(INPUT_POST, 'max', FILTER_VALIDATE_INT);
        if ($n === false || $n === null) {
            $error = "กรุณาป้อนตัวเลขที่ถูกต้องสำหรับสูตรคูณ";
        } else {
            if ($max === false || $max === null || $max < 1) {
                $max = 12; // ค่าเริ่มต้น
            }
            $rows = [];
            for ($i = 1; $i <= $max; $i++) {
                $rows[] = htmlspecialchars("{$n} x {$i} = " . ($n * $i));
            }
            $tableResult = $rows;
        }
    } elseif ($form === 'add') {
        $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_FLOAT);
        $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_FLOAT);
        if ($a === false || $a === null || $b === false || $b === null) {
            $error = "กรุณาป้อนตัวเลขสองตัวสำหรับการบวก";
        } else {
            $sum = $a + $b;
            $addResult = htmlspecialchars("{$a} + {$b} = {$sum}");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>Week4 - สูตรคูณ & การบวก (PHP)</title>
    <style>
        body{font-family:Tahoma,Arial,sans-serif;background:#f4f4f6;margin:30px}
        .wrap{max-width:760px;margin:auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.08)}
        h2{color:#2d6a4f}
        form{display:flex;gap:16px;flex-wrap:wrap;align-items:flex-end}
        .card{flex:1;min-width:260px;padding:12px;border:1px solid #e6e6e6;border-radius:6px;background:#fafafa}
        label{display:block;margin-bottom:6px;font-size:14px}
        input[type="number"]{width:100%;padding:8px;border:1px solid #ccc;border-radius:4px}
        button{padding:8px 12px;border:0;background:#2d6a4f;color:#fff;border-radius:4px;cursor:pointer}
        .result{margin-top:12px;padding:10px;background:#eef;border-radius:6px}
        .error{margin-top:12px;padding:10px;background:#fee;border-radius:6px;color:#900}
        ul{margin:0;padding-left:18px}
    </style>
</head>
<body>
    <div class="wrap">
        <h2>สูตรคูณ และ การบวก (PHP)</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="card">
                <h3>1) แสดงสูตรคูณ</h3>
                <label for="n">ป้อนเลขที่ต้องการ (จำนวนเต็ม):</label>
                <input id="n" name="n" type="number" step="1" required value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : '5'; ?>">
                <label for="max">แสดงถึง (ค่าเริ่มต้น 12):</label>
                <input id="max" name="max" type="number" step="1" min="1" value="<?php echo isset($_POST['max']) ? htmlspecialchars($_POST['max']) : '12'; ?>">
                <input type="hidden" name="form" value="table">
                <button type="submit">แสดงสูตรคูณ</button>

                <?php if ($tableResult): ?>
                    <div class="result">
                        <strong>ผลลัพธ์:</strong>
                        <ul>
                            <?php foreach ($tableResult as $line): ?>
                                <li><?php echo $line; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="card">
                <h3>2) ป้อน 2 ตัวและบวก</h3>
                <label for="a">ตัวเลขที่ 1:</label>
                <input id="a" name="a" type="number" step="any" required value="<?php echo isset($_POST['a']) ? htmlspecialchars($_POST['a']) : '3'; ?>">
                <label for="b">ตัวเลขที่ 2:</label>
                <input id="b" name="b" type="number" step="any" required value="<?php echo isset($_POST['b']) ? htmlspecialchars($_POST['b']) : '4'; ?>">
                <input type="hidden" name="form" value="add">
                <button type="submit">คำนวณผลรวม</button>

                <?php if ($addResult): ?>
                    <div class="result"><strong>ผลลัพธ์:</strong> <?php echo $addResult; ?></div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>
// ...existing code...