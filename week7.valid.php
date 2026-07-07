<?php
$mail = "123@example.com";
$age = "what";

if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    echo "อีเมลถูกต้อง";
} else {
    echo "อีเมลไม่ถูกต้อง". "<br>";
}

    if (filter_var($age, FILTER_VALIDATE_INT)) {
        echo "อายุถูกต้อง";
    } else {
        echo "อายุไม่ถูกต้อง". "<br>";
    }
?>