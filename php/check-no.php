<?php 

    $mobile = isset($_POST['mobile-no']) ? $_POST['mobile-no'] : '';

    $ok = true;
    $message = array();

    if ( !isset($mobile) ) {
        $ok = false;
        $message[] = "Enter Mobile Number!";
    }

    echo (strlen($mobile));

    if ($ok) {
        if ($mobile == strlen($mobile)) {
            $ok = true;
            $message = "OTP SENT!";
        }
        else {
            $ok = false;
            $message = "Enter a valid phone number";
        }
    }

    echo json_encode (
        array (
            "ok" => $ok,
            "messages" => $message
        )
    );
    
?>