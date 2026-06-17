<?php

// ประมวลผลฟอร์มสำหรับสูตรคูณและการบวก
$tableResult = [];
$addResult = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'table') {
        $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
        $max = filter_input(INPUT_POST, 'max', FILTER_VALIDATE_INT);
        if ($n === false || $n === null) {
            $error = "กรุณาป้อนจำนวนเต็มสำหรับสูตรคูณ";
        } else {
            $max = ($max === false || $max === null || $max < 1) ? 12 : $max;
            for ($i = 1; $i <= $max; $i++) {
                $tableResult[] = "{$n} x {$i} = " . ($n * $i);
            }
        }
    }

    if ($action === 'add') {
        $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_FLOAT);
        $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_FLOAT);
        if ($a === false || $a === null || $b === false || $b === null) {
            $error = "กรุณาป้อนตัวเลขสองตัวเพื่อทำการบวก";
        } else {
            $sum = $a + $b;
            $addResult = "{$a} + {$b} = {$sum}";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>สูตรคูณ & การบวก (PHP)</title>
    <style>
        body{font-family:Tahoma,Arial,sans-serif;background:#f7f7fb;margin:30px}
        .wrap{max-width:820px;margin:auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.06)}
        h1{color:#2d6a4f}
        .grid{display:flex;gap:16px;flex-wrap:wrap}
        .box{flex:1;min-width:280px;padding:14px;border:1px solid #e6e6e6;border-radius:6px;background:#fcfcff}
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
        <h1>สูตรคูณ และ การบวก (PHP)</h1>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <div class="grid">
            <div class="box">
                <h3>1) ป้อนตัวเลขเพื่อแสดงสูตรคูณ</h3>
                <form method="post" action="">
                    <label for="n">ตัวเลข (จำนวนเต็ม):</label>
                    <input id="n" name="n" type="number" step="1" required
                        value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n'], ENT_QUOTES, 'UTF-8') : '5'; ?>">

                    <label for="max">แสดงถึง (ค่าเริ่มต้น 12):</label>
                    <input id="max" name="max" type="number" step="1" min="1"
                        value="<?php echo isset($_POST['max']) ? htmlspecialchars($_POST['max'], ENT_QUOTES, 'UTF-8') : '12'; ?>">

                    <input type="hidden" name="action" value="table">
                    <div style="margin-top:10px">
                        <button type="submit">แสดงสูตรคูณ</button>
                    </div>
                </form>

                <?php if (!empty($tableResult)): ?>
                    <div class="result">
                        <strong>ผลลัพธ์สูตรคูณ:</strong>
                        <ul>
                            <?php foreach ($tableResult as $line): ?>
                                <li><?php echo htmlspecialchars($line, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="box">
                <h3>2) ป้อนตัวเลข 2 ตัวแล้วบวก</h3>
                <form method="post" action="">
                    <label for="a">ตัวเลขที่ 1:</label>
                    <input id="a" name="a" type="number" step="any" required
                        value="<?php echo isset($_POST['a']) ? htmlspecialchars($_POST['a'], ENT_QUOTES, 'UTF-8') : '3'; ?>">

                    <label for="b">ตัวเลขที่ 2:</label>
                    <input id="b" name="b" type="number" step="any" required
                        value="<?php echo isset($_POST['b']) ? htmlspecialchars($_POST['b'], ENT_QUOTES, 'UTF-8') : '4'; ?>">

                    <input type="hidden" name="action" value="add">
                    <div style="margin-top:10px">
                        <button type="submit">คำนวณผลรวม</button>
                    </div>
                </form>

                <?php if ($addResult): ?>
                    <div class="result"><strong>ผลรวม:</strong> <?php echo htmlspecialchars($addResult, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
