<?php
include_once('common.php');

if(isset($_FILES['file'])) {
    if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $_FILES['file']['name'])){		
    }
}
$imageText = readImageForText($_FILES['file']['name']);
file_put_contents('uploads/'.substr($_FILES['file']['name'], 0, -4).'.txt', $imageText);
?>