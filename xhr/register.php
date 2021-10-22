<?php 
if ($f == 'register') {
    if (!empty($_SESSION['user_id'])) {
        $_SESSION['user_id'] = '';
        unset($_SESSION['user_id']);
    }
    if (!empty($_COOKIE['user_id'])) {
        $_COOKIE['user_id'] = '';
        unset($_COOKIE['user_id']);
        setcookie('user_id', null, -1);
        setcookie('user_id', null, -1,'/');
    }
     
    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password']) || empty($_POST['gender']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
        $errors = 'please check details';
    } else {
        
        // if (empty($_POST['phone_num']) && $t['config']['sms_or_email'] == 'sms') {
        //     $errors = 'worng_phone_number';
        // }
         
        
        // if (preg_match_all('~@(.*?)(.*)~', $_POST['email'], $matches) && !empty($matches[2]) && !empty($matches[2][0]) && t_IsBanned($matches[2][0])) {
        //     $errors = 'email_provider_banned';
        // }
         
         
       
        if (t_EmailExists($_POST['email']) === true) {
            $errors =  'email exists';
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors =  ' invalid email characters';
        }
        if (strlen($_POST['password']) < 6) {
            $errors =  'password too short';
        }
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errors =  'password mismatch';
        }
         
        
        if (!empty($_POST['gender'])) {
            if ($_POST['gender'] != 'male' && $_POST['gender'] != 'female') {
                $gender = 'male';
            } else {
                $gender = $_POST['gender'];
            }
        }
        
    }
    $field_data = array();
    if (empty($errors)) {
       
        $activate = ($t['config']['emailValidation'] == '1') ? '0' : '1';
        $code = rand(111111, 999999);
        $rand = rand(1111, 9999);
        $_POST['username'] = $_POST['firstname'].'.'.$_POST['lastname'].$rand;
        $re_data  = array(
            'email' => t_Secure($_POST['email'], 0),
            'username' => t_Secure($_POST['username'], 0),
            'password' => $_POST['password'],
            'first_name' => t_Secure($_POST['firstname']),
            'last_name' => t_Secure($_POST['lastname']),
            'email_code' => t_Secure($code, 0),
            'src' => 'site',
            'gender' => t_Secure($gender),
            'lastseen' => time(),
            'active' => 1,
            'birthday' => '0000-00-00'
        );
        if (!empty($_POST['phone_num'])) {
            $re_data['phone_number'] = t_Secure($_POST['phone_num']);
        }
        $in_code  = (isset($_POST['invited'])) ? t_Secure($_POST['invited']) : false;
        if (empty($_POST['phone_num'])) {
            $register = t_RegisterUser($re_data, $in_code);
        }
        else{
            if($activate == 1){
               $register = t_RegisterUser($re_data, $in_code);
            }
            else{
                $register = true;
            }
        }
        
        if ($register === true) {
            if ($activate == 1) {
                $data  = array(
                    'status' => 200,
                    'message' => $success_icon . 'Welcome to TeaGo'
                );
                $login = t_Login($_POST['email'], $_POST['password']);
               
                if ($login == true) {
                    $session             = t_CreateLoginSession(t_UserIdFromEmail($_POST['email']));
                    $_SESSION['user_id'] = $session;
                    setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
                }
                $data['location'] = $t['config']['site_url'].'/home';
               
            }
             else if ($t['config']['sms_or_email'] == 'mail') {
               $t['user']        = $_POST;
               $t['code']        = $code;
                $body              = t_LoadPage('emails/activate');
                $send_message_data = array(
                    'from_email' =>$t['config']['siteEmail'],
                    'from_name' =>$t['config']['siteName'],
                    'to_email' => $_POST['email'],
                    'to_name' => $_POST['username'],
                    'subject' =>'Activate Account',
                    'charSet' => 'utf-8',
                    'message_body' => $body,
                    'is_html' => true
                );
                $send              = t_SendMessage($send_message_data);
                $errors            = $success_icon .'An email have been sent to your address, <br> Please confirm your email to continue';
                if ($t['config']['membership_system'] == 1) {
                    $session             = t_CreateLoginSession(t_UserIdFromUsername($_POST['username']));
                    $_SESSION['user_id'] = $session;
                    setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
                }

            } 
            else if ($t['config']['sms_or_email'] == 'sms' && !empty($_POST['phone_num'])) {
                $random_activation = t_Secure(rand(11111, 99999));
                $message           = "Your confirmation code is: {$random_activation}";
                
                // if ($query) {
                //     if (t_SendSMSMessage($_POST['phone_num'], $message) === true) {
                //         $register = t_RegisterUser($re_data, $in_code);
                //         $user_id           = t_UserIdFromUsername($_POST['username']);
                //         $query             = mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET `sms_code` = '{$random_activation}' WHERE `user_id` = {$user_id}");
                //         $data = array(
                //             'status' => 300,
                //             'location' => t_SeoLink('index.php?link1=confirm-sms?code=' . $code)
                //         );
                //         if ($t['config']['membership_system'] == 1) {
                //             $session             = t_CreateLoginSession(t_UserIdFromUsername($_POST['username']));
                //             $_SESSION['user_id'] = $session;
                //             setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
                //         }
                //     } else {
                //         $errors =  'failed_to_send_code_email';
                //     }
                // }
            }
        }
        
    }
    header("Content-type: application/json");

    if (isset($errors)) {
        echo json_encode(array(
            'errors' => $errors,
            'status' => 300,
            'location' => $t['config']['site_url'].'confirm-email'
        ));
    } else {
        echo json_encode($data);
    }
    exit();
}
