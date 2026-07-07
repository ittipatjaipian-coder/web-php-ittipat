<?php
function uploadImage(array $file, string $destDir): array {
    // 1. ตรวจสอบ Error Code
    if ($file["error"] !== UPLOAD_ERR_OK) {
        return ["ok"=>false, "msg"=>"อัปโหลดล้มเหลว รหัส: " . $file["error"]];
    }

    // 2. ตรวจสอบขนาด (ไม่เกิน 2MB)
    $maxSize = 2 * 1024 * 1024;
    if ($file["size"] > $maxSize) {
        return ["ok"=>false, "msg"=>"ไฟล์ใหญ่เกิน 2MB"];
    }

    // 3. ตรวจสอบ MIME type จริงด้วย finfo (ไม่ใช่จาก $_FILES["type"])
    $finfo    = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file["tmp_name"]);
    $allowed  = ["image/jpeg", "image/png", "image/gif", "image/webp"];

    if (!in_array($mimeType, $allowed)) {
        return ["ok"=>false, "msg"=>"อนุญาตเฉพาะ jpg, png, gif, webp"];
    }

    // 4. สร้างชื่อไฟล์ใหม่เพื่อป้องกันการ overwrite และ path traversal
    $ext      = pathinfo($file["name"], PATHINFO_EXTENSION);
    $newName  = uniqid("img_", true) . "." . strtolower($ext);
    $destPath = rtrim($destDir, "/") . "/" . $newName;

    // 5. ย้ายจาก temp ไปยัง destination
    if (!move_uploaded_file($file["tmp_name"], $destPath)) {
        return ["ok"=>false, "msg"=>"ย้ายไฟล์ไม่สำเร็จ"];
    }

    return ["ok"=>true, "path"=>$destPath, "name"=>$newName];
}

   if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["avatar"])) {
    $result = uploadImage($_FILES["avatar"], "uploads/avatars/");
    if ($result["ok"]) {
        echo "<img src='" . $result["path"] . "' width='200'>";
    } else {
        echo "Error: " . $result["msg"];
    }
}

?>