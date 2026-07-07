<?php
 $handle = fopen("week7-data.txt", "a");
 if ($handle) {
     $data = date("Y-m-d H:i:s");
     fwrite($handle,$data . "\n");
     $content = file_get_contents("week7-data.txt");
     echo nl2br($content);
     fclose($handle);
 } 

 
 ?>