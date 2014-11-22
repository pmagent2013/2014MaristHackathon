<?php
if(isset($_FILES['file'])) {

    if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $_FILES['file']['name'])){
		sleep(10);
                echo "success";

               exit;

    }

}

?>