<?php
if(isset($_POST['photo'])) {
    $encoded_data = $_POST['photo'];
    $binary_data = base64_decode($encoded_data);

    $photoname = uniqid().'.jpeg';

    $result = file_put_contents('uploadPhoto/'.$photoname, $binary_data);

    if($result) {
        echo 'success';
    } else {
        echo die('Could not save image! check file permission.');
    }
}