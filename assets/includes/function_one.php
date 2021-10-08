<?php
require_once('app_start.php'); 
    function t_checkmail($username) {
        global $sqlConnect;
        if (empty($username)) {
            return false;
        }
        $username = t_Secure($username);
        $query    = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . " WHERE `username` = '{$username}'");
        return (t_Sql_Result($query, 0) == 1) ? true : false;
    }
    function t_RegisterUser($registration_data, $invited = false) {
        global $t, $sqlConnect;
        if (empty($registration_data)) {
            return false;
        }
        
        $ip     = '0.0.0.0';
        $get_ip = get_ip_address();
        if (!empty($get_ip)) {
            $ip = $get_ip;
        }

        if ($t['config']['login_auth'] == 1) {
            $getIpInfo = fetchDataFromURL("http://ip-api.com/json/$get_ip");
            $getIpInfo = json_decode($getIpInfo, true);
            if ($getIpInfo['status'] == 'success' && !empty($getIpInfo['regionName']) && !empty($getIpInfo['countryCode']) && !empty($getIpInfo['timezone']) && !empty($getIpInfo['city'])) {
                $registration_data['last_login_data'] = json_encode($getIpInfo);
            }
        }
        $registration_data['registered'] = date('n') . '/' . date("Y");
        $registration_data['joined']     = time();
        $registration_data['password']   = t_Secure(password_hash($registration_data['password'], PASSWORD_DEFAULT));
        $registration_data['ip_address'] = t_Secure($ip);
        $registration_data['language']   = 'english';
        $registration_data['order_posts_by'] = '0';
        $fields                              = '`' . implode('`,`', array_keys($registration_data)) . '`';
        $data                                = '\'' . implode('\', \'', $registration_data) . '\'';
        $query                               = mysqli_query($sqlConnect, "INSERT INTO " . T_USERS . " ({$fields}) VALUES ({$data})");
        $user_id                             = mysqli_insert_id($sqlConnect);
        $query_2                             = mysqli_query($sqlConnect, "INSERT INTO " . T_USERS_FIELDS . " (`user_id`) VALUES ({$user_id})");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function t_ActivateUser($email, $code) {
        global $sqlConnect;
        $email  = t_Secure($email);
        $code   = t_Secure($code);
        $query  = mysqli_query($sqlConnect, " SELECT COUNT(`user_id`)  FROM " . T_USERS . "  WHERE `email` = '{$email}' AND `email_code` = '{$code}' AND `active` = '0'");
        $result = t_Sql_Result($query, 0);
        if ($result == 1) {
            $query_two = mysqli_query($sqlConnect, " UPDATE " . T_USERS . "  SET `active` = '1' WHERE `email` = '{$email}' ");
            if ($query_two) {
                return true;
            }
        } else {
            return false;
        }
    }
    function t_Login($username, $password) {
        global $sqlConnect;
        if (empty($username) || empty($password)) {
            return false;
        }
        $username            = t_Secure($username);
        $query_hash          = mysqli_query($sqlConnect, "SELECT * FROM " . T_USERS . " WHERE (`username` = '{$username}' OR `email` = '{$username}' OR `phone_number` = '{$username}')");
        if (mysqli_num_rows($query_hash)) {
            $mysqli_hash_upgrade = mysqli_fetch_assoc($query_hash);
            $login_password = '';
            $hash                = 'md5';
            if (preg_match('/^[a-f0-9]{32}$/', $mysqli_hash_upgrade['password'])) {
                $hash = 'md5';
            } else if (preg_match('/^[0-9a-f]{40}$/i', $mysqli_hash_upgrade['password'])) {
                $hash = 'sha1';
            } else if (strlen($mysqli_hash_upgrade['password']) == 60) {
                $hash = 'password_hash';
            }
            if ($hash == 'password_hash') {
                if (password_verify($password, $mysqli_hash_upgrade['password'])) {
                    return true;
                }
            } else {
                $login_password = t_Secure($hash($password));
            }
            
            $query          = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . " WHERE (`username` = '{$username}' OR `email` = '{$username}' OR `phone_number` = '{$username}') AND `password` = '{$login_password}'");
            if (t_Sql_Result($query, 0) == 1) {
                if ($hash == 'sha1' || $hash == 'md5') {
                    $new_password = t_Secure(password_hash($password, PASSWORD_DEFAULT));
                    $query_       = mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET password = '$new_password' WHERE (`username` = '{$username}' OR `email` = '{$username}' OR `phone_number` = '{$username}')");
                }
                return true;
            }
        }
            
        return false;
    }
    function t_CreateLoginSession($user_id = 0) {
        global $sqlConnect, $db;
        if (empty($user_id)) {
            return false;
        }
        $user_id   = t_Secure($user_id);
        $hash      = sha1(rand(111111111, 999999999)) . md5(microtime()) . rand(11111111, 99999999) . md5(rand(5555, 9999));
        $query_two = mysqli_query($sqlConnect, "DELETE FROM " . T_APP_SESSIONS . " WHERE `session_id` = '{$hash}'");
        if ($query_two) {
            $ua = json_encode(getBrowser());
            $delete_same_session = $db->where('user_id', $user_id)->where('platform_details', $ua)->delete(T_APP_SESSIONS);
            $query_three = mysqli_query($sqlConnect, "INSERT INTO " . T_APP_SESSIONS . " (`user_id`, `session_id`, `platform`, `platform_details`, `time`) VALUES('{$user_id}', '{$hash}', 'web', '$ua'," . time() . ")");
            if ($query_three) {
                return $hash;
            }
        }
    }
    function t_IsUserCookie($user_id, $password) {
        global $sqlConnect;
        if (empty($user_id) || empty($password)) {
            return false;
        }
        $user_id  = t_Secure($user_id);
        $password = t_Secure($password);
        $query    = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . " WHERE `user_id` = '{$user_id}' AND `password` = '{$password}'");
        return (t_Sql_Result($query, 0) == 1) ? true : false;
    }
    function t_SetLoginWithSession($user_email) {
        if (empty($user_email)) {
            return false;
        }
        $user_email          = t_Secure($user_email);
        $_SESSION['user_id'] = t_CreateLoginSession(t_UserIdFromEmail($user_email));
    }
    function t_UserActive($username) {
        global $sqlConnect;
        if (empty($username)) {
            return false;
        }
        $username = t_Secure($username);
        $query    = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . "  WHERE (`username` = '{$username}' OR `email` = '{$username}' OR `phone_number` = '{$username}') AND `active` = '1'");
        return (t_Sql_Result($query, 0) == 1) ? true : false;
    }
    function t_UserInactive($username) {
        global $sqlConnect;
        if (empty($username)) {
            return false;
        }
        $username = t_Secure($username);
        $query    = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . "  WHERE (`username` = '{$username}' OR `email` = '{$username}' OR `phone_number` = '{$username}') AND `active` = '2'");
        return (t_Sql_Result($query, 0) == 1) ? true : false;
    }
    function t_UserExists($username) {
        global $sqlConnect;
        if (empty($username)) {
            return false;
        }
        $username = t_Secure($username);
        $query    = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . " WHERE `username` = '{$username}'");
        return (t_Sql_Result($query, 0) == 1) ? true : false;
    }
    function t_SendMessage($data = array()) {
        global $t, $sqlConnect;
        include_once('assets/libraries/PHPMailer-Master/vendor/autoload.php');
        $mail = new PHPMailer\PHPMailer\PHPMailer;
        if (strpos($data['to_email'], '@google.com') || strpos($data['to_email'], '@facebook.com') || strpos($data['to_email'], '@twitter.com') || strpos($data['to_email'], '@linkedIn.com') || strpos($data['to_email'], '@vk.com') || strpos($data['to_email'], '@instagram.com')) {
            return false;
        }
        $email_from      = $data['from_email'] = t_Secure($data['from_email']);
        $to_email        = $data['to_email'] = t_Secure($data['to_email']);
        $subject         = $data['subject'];
        $message_body    = mysqli_real_escape_string($sqlConnect, $data['message_body']);
        $data['charSet'] = t_Secure($data['charSet']);
         
        

        if ($t['config']['smtp_or_mail'] == 'mail') {
            $mail->IsMail();
        } else if ($t['config']['smtp_or_mail'] == 'smtp') {
            $mail->isSMTP();
            $mail->Host        = $t['config']['smtp_host']; // Specify main and backup SMTP servers
            $mail->SMTPAuth    = true; // Enable SMTP authentication
            $mail->Username    = $t['config']['smtp_username']; // SMTP username
            $mail->Password    = $t['config']['smtp_password']; // SMTP password
            $mail->SMTPSecure  = $t['config']['smtp_encryption']; // Enable TLS encryption, `ssl` also accepted
            $mail->Port        = $t['config']['smtp_port'];
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        } else {
            return false;
        }
        $mail->IsHTML($data['is_html']);
        $mail->setFrom($data['from_email'], $data['from_name']);
        $mail->addAddress($data['to_email'], $data['to_name']); // Add a recipient
        $mail->Subject = $data['subject'];
        $mail->CharSet = $data['charSet'];
        $mail->MsgHTML($data['message_body']);
        if (!empty($data['reply-to'])) {
            $mail->ClearReplyTos();
            $mail->AddReplyTo($data['reply-to'], $data['from_name']);
        }
        if ($mail->send()) {
            $mail->ClearAddresses();
            return true;
        }
    }

    function t_UserIdForLogin($username) {
        global $sqlConnect;
        if (empty($username)) {
            return false;
        }
        $username = t_Secure($username);
        $query    = mysqli_query($sqlConnect, "SELECT `user_id` FROM " . T_USERS . " WHERE `username` = '{$username}' OR `email` = '{$username}' OR `phone_number` = '{$username}'");
        return t_Sql_Result($query, 0, 'user_id');
    }
    function t_EmailExists($email) {
        global $sqlConnect;
        if (empty($email)) {
            return false;
        }
        $email = t_Secure($email);
        $query = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) FROM " . T_USERS . " WHERE `email` = '{$email}'");
        return (t_Sql_Result($query, 0) == 1) ? true : false;
    }

    function t_UserIdFromEmail($email) {
        global $sqlConnect;
        if (empty($email)) {
            return false;
        }
        $email = t_Secure($email);
        $query = mysqli_query($sqlConnect, "SELECT `user_id` FROM " . T_USERS . " WHERE `email` = '{$email}'");
        return t_Sql_Result($query, 0, 'user_id');
    }
    function t_UserIdFromUsername($username) {
        global $sqlConnect;
        if (empty($username)) {
            return false;
        }
        $username = t_Secure($username);
        $query    = mysqli_query($sqlConnect, "SELECT `user_id` FROM " . T_USERS . " WHERE `username` = '{$username}'");
        return t_Sql_Result($query, 0, 'user_id');
    }
    function TAddBadLoginLog() {
        global $t, $sqlConnect;
        if ($t['loggedin'] == true) {
            return false;
        }
        $ip = get_ip_address();
        if (empty($ip)) {
            return true;
        }
        $time      = time();
        $query     = mysqli_query($sqlConnect, "INSERT INTO " . T_BAD_LOGIN . " (`ip`, `time`) VALUES ('{$ip}', '{$time}')");
        if ($query) {
            return true;
        }
    }
 



 
function t_UserData($user_id, $password = true) {
    global $t, $sqlConnect;
    if (empty($user_id) || !is_numeric($user_id) || $user_id < 0) {
        return false;
    }
    $data           = array();
    $user_id        = t_Secure($user_id);
    $query_one      = "SELECT * FROM " . T_USERS . " WHERE `user_id` = {$user_id}";
    $hashed_user_Id = md5($user_id);
    if ($t['config']['cacheSystem'] == 1) {
        $fetched_data = $cache->read($hashed_user_Id . '_U_Data.tmp');
        if (empty($fetched_data)) {
            $sql          = mysqli_query($sqlConnect, $query_one);
            if (mysqli_num_rows($sql)) {
                $fetched_data = mysqli_fetch_assoc($sql);
                $cache->write($hashed_user_Id . '_U_Data.tmp', $fetched_data);
            }
                
        }
    } else {
        $sql          = mysqli_query($sqlConnect, $query_one);
        if (mysqli_num_rows($sql)) {
            $fetched_data = mysqli_fetch_assoc($sql);
        }
        
    }
    if (empty($fetched_data)) {
        return array();
    }
    if ($password == false) {
        unset($fetched_data['password']);
    }
    $fetched_data['avatar_post_id'] = 0;
    $fetched_data['cover_post_id'] = 0;
    $query_avatar  = mysqli_query($sqlConnect, " SELECT `id`  FROM " . T_POSTS . "  WHERE `postType` = 'profile_picture' AND `user_id` = {$user_id} ORDER BY 'id' DESC");
    if (mysqli_num_rows($query_avatar)) {
        $query_avatar_data = mysqli_fetch_assoc($query_avatar);
        if (!empty($query_avatar_data) && !empty($query_avatar_data['id'])) {
            $fetched_data['avatar_post_id'] = $query_avatar_data['id'];
        }
    }
    $query_avatar  = mysqli_query($sqlConnect, " SELECT `id`  FROM " . T_POSTS . "  WHERE `postType` = 'profile_cover_picture' AND `user_id` = {$user_id} ORDER BY 'id' DESC");
    if (mysqli_num_rows($query_avatar)) {
        $query_avatar_data = mysqli_fetch_assoc($query_avatar);
        if (!empty($query_avatar_data) && !empty($query_avatar_data['id'])) {
            $fetched_data['cover_post_id'] = $query_avatar_data['id'];
        }
    }
    $fetched_data['avatar_org'] = $fetched_data['avatar'];
    $fetched_data['cover_org']  = $fetched_data['cover'];
    $explode2                   = @end(explode('.', $fetched_data['cover']));
    $explode3                   = @explode('.', $fetched_data['cover']);
    $fetched_data['cover_full'] = $t['userDefaultCover'];
    if ($fetched_data['cover'] != $t['userDefaultCover']) {
        @$fetched_data['cover_full'] = $explode3[0] . '_full.' . $explode2;
    }
    $explode2                   = @end(explode('.', $fetched_data['avatar']));
    $explode3                   = @explode('.', $fetched_data['avatar']);
    if ($fetched_data['avatar'] != $t['userDefaultAvatar'] && $fetched_data['avatar'] != $t['userDefaultFAvatar']) {
        @$fetched_data['avatar_full'] = $explode3[0] . '_full.' . $explode2;
    }
    $fetched_data['avatar'] = t_GetMedia($fetched_data['avatar']) . '?cache=' . $fetched_data['last_avatar_mod'];
    $fetched_data['cover']  = t_GetMedia($fetched_data['cover']) . '?cache=' . $fetched_data['last_cover_mod'];
    $fetched_data['id']     = $fetched_data['user_id'];
    $fetched_data['user_platform'] = 'web';
    $fetched_data['type']   = 'user';
    $fetched_data['url']    = $t['config']['site_url'].'/'.$fetched_data['username'];
    $fetched_data['name']   = '';
    if (!empty($fetched_data['first_name'])) {
        if (!empty($fetched_data['last_name'])) {
            $fetched_data['name'] = $fetched_data['first_name'] . ' ' . $fetched_data['last_name'];
        } else {
            $fetched_data['name'] = $fetched_data['first_name'];
        }
    } else {
        $fetched_data['name'] = $fetched_data['username'];
    }
    if (!empty($fetched_data['details'])) {
        $fetched_data['details'] = (Array) json_decode($fetched_data['details']);
    }
    $fetched_data['following_data'] = '';
    $fetched_data['followers_data'] = '';
    $fetched_data['mutual_friends_data'] = '';
    $fetched_data['likes_data'] = '';
    $fetched_data['groups_data'] = '';
    $fetched_data['album_data'] = '';
    
    $fetched_data['website'] = (strpos($fetched_data['website'], 'http') === false && !empty($fetched_data['website'])) ? 'http://' . $fetched_data['website'] : $fetched_data['website'];
    $fetched_data['working_link'] = (strpos($fetched_data['working_link'], 'http') === false && !empty($fetched_data['working_link'])) ? 'http://' . $fetched_data['working_link'] : $fetched_data['working_link'];
    $fetched_data['lastseen_unix_time'] = $fetched_data['lastseen'];
    if ($t['config']['node_socket_flow'] == "1") {
        $time     = time() - 02;
    } else {
        $time     = time() - 60;
    }
    $fetched_data['lastseen_status'] = ($fetched_data['lastseen'] > $time) ? 'on' : 'off';
    return $fetched_data;
}

function t_GetUserFromSessionID($session_id, $platform = 'web') {
    global $sqlConnect, $db;
    if (empty($session_id)) {
        return false;
    }
    $session_id = t_Secure($session_id);
    $query      = mysqli_query($sqlConnect, "SELECT * FROM " . T_APP_SESSIONS . " WHERE `session_id` = '{$session_id}' LIMIT 1");
    if (mysqli_num_rows($query)) {
        $fetched_data = mysqli_fetch_assoc($query);
        if (empty($fetched_data['platform_details']) && $fetched_data['platform'] == 'web') {
            $ua = json_encode(getBrowser());
            if (isset($fetched_data['platform_details'])) {
                $update_session = $db->where('id', $fetched_data['id'])->update(T_APP_SESSIONS, array('platform_details' => $ua));
            }
        }
        return $fetched_data['user_id'];
    }
    return false;
        
}
function t_IsLogged() {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $id = t_GetUserFromSessionID($_SESSION['user_id']);
        if (is_numeric($id) && !empty($id)) {
            return true;
        }
    } else if (!empty($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
        $id = t_GetUserFromSessionID($_COOKIE['user_id']);
        if (is_numeric($id) && !empty($id)) {
            return true;
        }
    } else {
        return false;
    }
}

function t_IsNameExist($username, $active = 0) {
    global $t, $sqlConnect;
    $data = array();
    if (empty($username)) {
        return false;
    }
    $named_files = array('video-call','video-call-api','confirm-sms','confirm-sms-password','forgot-password','reset-password','start-up','pages','suggested-pages','liked-pages','go-pro','groups','suggested-groups','create-group','group-setting','create-page','page-setting','post','new-game','saved-posts','albums','create-album','contact-us','user-activation','boosted-pages','boosted-posts','new-product','edit-product','my-products','site-pages','blogs','my-blogs','create-blog','read-blog','edit-blog','blog-category','forum-members','forum-members-byname','forum-events','forum-search','forum-search-result','forum-help','forums','forumaddthred','showthread','threadreply','threadquote','editreply','deletereply','mythreads','mymessages','edithread','deletethread','create-event','edit-event','events','events-going','events-interested','events-past','show-event','events-invited','my-events','app-setting','create-app','app','movies-genre','movies-country','watch-film','advertise','create-ads','edit-ads','chart-ads','manage-ads','create-status','friends-nearby','more-status');
    $files = scandir('sources');
    unset($files[0]);
    unset($files[1]);
    if ((in_array($username . '.php', $files) || in_array($username, $files) || in_array($username, $named_files))) {
        return array(
            true,
            'type' => 'file'
        );
    }

    $active_text = '';
    if ($active == 1) {
        $active_text = "AND `active` = '1'";
    }
    $username     = t_Secure($username);
     
    $query   = mysqli_query($sqlConnect, "SELECT COUNT(`user_id`) as users FROM " . T_USERS . " WHERE `username` = '{$username}' {$active_text}");
    if (mysqli_num_rows($query)) {
        $fetched_data = mysqli_fetch_assoc($query);
        if ($fetched_data['users'] == 1) {
            return array(
                true,
                'type' => 'user'
            );
        }
    }
     return array(
        false
    );
 }





?>
