<?php
$file = $_FILES['file'];
$upload_dir = "tmp/";
$tmp_name = $file['tmp_name'];
@move_uploaded_file($tmp_name, $upload_dir . $file['name']);
echo json_encode($file);
