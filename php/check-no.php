<?php 

    // $mobile = isset($_POST['mobile-no']) ? $_POST['mobile-no'] : '';

    // $ok = true;
    // $message = array();

    // if ( !isset($mobile) || empty($mobile) ) {
    //     $ok = false;
    //     $message[] = "Enter Mobile Number!";
    // }

    // echo (strlen($mobile));

    // if ($ok) {
    //     if ($mobile == strlen($mobile)) {
    //         $ok = true;
    //         $message = "OTP SENT!";
    //     }
    //     else {
    //         $ok = false;
    //         $message = "Enter a valid phone number";
    //     }
    // }

    // echo json_encode (
    //     array (
    //         "ok" => $ok,
    //         "messages" => $message
    //     )
    // );

    if (isset($_POST['btn-submit'])) { 

        require('textlocal.class.php');

        $textlocal = new Textlocal(false, false, API_KEY);

        $numbers = array($_POST['mobile-no']);
        $sender = 'TXTLCL';
        $otp = mt_rand(10000, 99999);
        // Yaha pe tha main Message likhna  hai https://www.youtube.com/watch?v=90fNE_S46do ye video ke 6:15 min pe
        $message = '';

        try {
            $result = $textlocal->sendSms($numbers, $message, $sender);
            print_r($result);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    define("API_KEY", 'YjE5NDc2Mzc3NGE1NGRmZDM3ZjJjNjg4ZjI4NDdhZjY=');
    define("MOBILE", '')
    

?>