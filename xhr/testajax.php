<?php
$data = array();
$f = $_GET['f'];
if($f == 'testajax'){
                    $data  = array(
                        'status' => 200,
                        'message' => 'Done'
                    );
    // $re_data = array();
    // $activation = 1;
    // $name = $_POST['firstname'].' '.$_POST['lastname'];
    // $name = t_Secure($name);
    // $t['user']['username'] = $name;
    // if (!empty($_SESSION['user_id'])) {
    //     $_SESSION['user_id'] = '';
    //     unset($_SESSION['user_id']);
    // }
    // if (!empty($_COOKIE['user_id'])) {
    //     $_COOKIE['user_id'] = '';
    //     unset($_COOKIE['user_id']);
    //     setcookie('user_id', null, -1);
    //     setcookie('user_id', null, -1,'/');
    // }

    // if (empty($_POST['em']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['pass1']) || empty($_POST['pass2']) || empty($_POST['gender'])) {
    //     $errors = $error_icon . 'Please check details';
    // }else{
    //     if(t_check($_POST['em']) === true){
    //         $errors = $error_icon . "Email already in use";
    //     }
    //     if (!filter_var($_POST['em'], FILTER_VALIDATE_EMAIL)) {
    //         $errors = $error_icon . "Invalid email character";
    //     }
    //     if (strlen($_POST['pass1']) < 6) {
    //         $errors = $error_icon . 'Password too short';
    //     }
    //     if ($_POST['pass1'] != $_POST['pass2']) {
    //         $errors = $error_icon . 'Password mismatch';
    //     }
    //     if(empty($_POST['gender'])){
    //         $errors = $error_icon . 'Select a gender';
    //     }
    //     if(empty($errors)){
    //         $code = md5(rand(1111, 9999) . time());
    //         $re_data  = array(
    //             'email' => t_Secure($_POST['email'], 0),
    //             'password' => $_POST['password'],
    //             'first_name' => t_Secure($_POST['firstname']),
    //             'last_name' => t_Secure($_POST['lastname']),
    //             'email_code' => t_GenerateKey(6,6,false,true),
    //             'src' => 'site',
    //             'gender' => t_Secure($gender),
    //             'lastseen' => time(),
    //             'active' => t_Secure('0'),
    //             'birthday' => '0000-00-00'
    //         );

    //       //  $in_code  = (isset($_POST['invited'])) ? t_Secure($_POST['invited']) : false;
    //         $register = t_RegisterUser($re_data);
    //     if($register === true){
    //         if($activation == 1 ){
    //             $data  = array(
    //                 'status' => 200,
    //                 'message' => $success_icon . $wo['lang']['successfully_joined_label']
    //             );
    //             $login = t_Login($_POST['em'], $_POST['password']);
    //             if ($login === true) {
    //                 $session             = t_CreateLoginSession(t_UserIdFromUsername($_POST['em']));
    //                 $_SESSION['user_id'] = $session;
    //                 setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
    //                 $data['location'] = $site_url.'/start-up';
    //             }
    //         }elseif($t['config']['sms_or_mail'] == 'mail'){
    //             $t['user']        = $_POST;
    //             $t['code']        = $code;
    //             $body              = t_LoadPage('emails/activate');
    //             $send_message_data = array(
    //                 'from_email' => 'Support@teago.com',
    //                 'from_name' => 'Teago',
    //                 'to_email' => $_POST['em'],
    //                 'to_name' => $name,
    //                 'subject' => 'Account activation',
    //                 'charSet' => 'utf-8',
    //                 'message_body' => $body,
    //                 'is_html' => true
    //             );
    //             $send              = t_SendMessage($send_message_data);
    //             $errors            = $success_icon . $t['lang']['successfully_joined_verify_label'];
    //             if ($t['config']['membership_system'] == 1) {
    //                 $session             = Wo_CreateLoginSession(Wo_UserIdFromUsername($_POST['username']));
    //                 $_SESSION['user_id'] = $session;
    //                 setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
    //             }
    //         }elseif($t['config']['sms_or_mail'] == 'sms'){

    //         }
    //     }
         

    //     } 
    // }

    
}else{
    $data  = array(
        'status' => 500,
        'message' => 'I cant find the request'
    );
}
header("Content-type: application/json");
    echo json_encode($data);
    // if (isset($errors)) {
    //     echo json_encode(array(
    //         'errors' => $errors
    //     ));
    // } else {
    //     echo json_encode($data);
    // }
    exit();




?>