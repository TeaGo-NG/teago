<?php 
if ($f == 'login') {
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
    $data_ = array();
    $phone = 0;
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // if ($t['config']['prevent_system'] == 1) {
        //     if (!WoCanLogin()) {
        //         $errors[] = $error_icon . $t['lang']['login_attempts'];
        //         header("Content-type: application/json");
        //         echo json_encode(array(
        //             'errors' => $errors
        //         ));
        //         exit();
        //     }
        // }
        $username = t_Secure($_POST['username']);
        $password = $_POST['password'];
        $result   = t_Login($username, $password);
        if ($result === false) {
            $errors[] = $error_icon . 'incorrect Email or Password';
            // if ($t['config']['prevent_system'] == 1) {
            //     TAddBadLoginLog();
            // }
        } else if (t_UserInactive($_POST['username']) === true) {
            $errors[] = $error_icon . 'account disbaled contanct admin';
        }
        // else if (t_UserActive($_POST['username']) === false) {
        //     $_SESSION['code_id'] = t_UserIdForLogin($username);
        //     $data_               = array(
        //         'status' => 600,
        //         'location' => t_SeoLink('index.php?link1=user-activation')
        //     );
        //     $phone               = 1;
        // }
        if (empty($errors) && $phone == 0) {
            $userid              = t_UserIdForLogin($username);
            $ip                  = t_Secure(get_ip_address());
            $update              = mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET `ip_address` = '{$ip}' WHERE `user_id` = '{$userid}'");
            $session             = t_CreateLoginSession(t_UserIdForLogin($username));
            $_SESSION['user_id'] = $session;
            setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('ad-con', htmlentities(json_encode(array(
                'date' => date('Y-m-d'),
                'ads' => array()
            ))), time() + (10 * 365 * 24 * 60 * 60));
            $data = array(
                'status' => 200
            );
            if (!empty($_POST['last_url'])) {
                $data['location'] = $_POST['last_url'];
            } else {
                $data['location'] = $t['config']['site_url'];
            }
           $user_data = t_UserData($userid);
             
        }
    }
    header("Content-type: application/json");
    if (!empty($errors)) {
        echo json_encode(array(
            'errors' => $errors
        ));
    } else if (!empty($data_)) {
        echo json_encode($data_);
    } else {
        echo json_encode($data);
    }
    exit();
}
