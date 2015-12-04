<?php
$output_file = fopen('test.csv', 'w');
fwrite($output_file, chr(0xEF).chr(0xBB).chr(0xBF)); // 添加 BOM
$data = array("hello", "world", "你好", "世界");
fputcsv($output_file, $data);
fputcsv($output_file, $data);
fclose($output_file);
