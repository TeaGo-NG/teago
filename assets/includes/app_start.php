<?php
require_once('config.php');
$t           = array();
require_once('assets/libraries/DB/vendor/autoload.php');
$t['loggedin'] = false;
$t['config']['site_url'] = $site_url;
$t['config']['smtp_or_mail'] = 'mail';
$t['config']['sms_or_email'] = 'mail';
$t['site_pages'] = ' ';
$t['genders'] = ['male', 'female'];
$t['config']['emailValidation'] = 0;
$t['config']['siteEmail'] = 'support@Teago.com';
$t['config']['siteName'] = 'Teago';
$t['config']['membership_system'] = 1;
$t['config']['password_complexity_system'] = 1;
$t['config']['login_auth'] = 0;
$t['config']['prevent_system'] = 0;
$t['config']['cacheSystem'] = 0;
$t['config']['node_socket_flow'] = 0;
//icon variables
$error_icon   = '<i class="fa fa-exclamation-circle"></i> ';
$success_icon = '<i class="fa fa-check"></i> ';
// Connect to SQL Server
$sqlConnect   = $t['sqlConnect'] = mysqli_connect($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name, 3306);
// Handling Server Errors
$ServerErrors = array();
if (mysqli_connect_errno()) {
    $ServerErrors[] = "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($ServerErrors) && !empty($ServerErrors)) {
    foreach ($ServerErrors as $Error) {
        echo "<h3>" . $Error . "</h3>";
    }
    die();
}
 $db                  = new MysqliDb($sqlConnect);
// Defualt User Pictures 
$t['userDefaultAvatar']  = 'upload/photos/d-avatar.jpg';
$t['userDefaultFAvatar']  = 'upload/photos/f-avatar.jpg';
$t['userDefaultCover']   = 'upload/photos/d-cover.jpg';
$t['pageDefaultAvatar']  = 'upload/photos/d-page.jpg';
$t['groupDefaultAvatar'] = 'upload/photos/d-group.jpg';
 if (t_IsLogged() == true) {
    $session_id         = (!empty($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
    $t['user_session'] = t_GetUserFromSessionID($session_id);
    $t['user']         = t_UserData($t['user_session']);
    $_SESSION['lang'] = $t['user']['language'];
    if ($t['user']['user_id'] < 0 || empty($t['user']['user_id']) || !is_numeric($t['user']['user_id']) || t_UserActive($t['user']['username']) === false) {
         t_redirect($site_url.'logout');
    }
    $t['loggedin'] = true;
}
 



?>