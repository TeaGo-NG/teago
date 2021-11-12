<?php
if ($t['loggedin'] == false) {
        header("Location: " .$t['config']['site_url'].'/logout');
        exit();
}
if (isset($_GET['u'])) {
    $check_user = t_IsNameExist($_GET['u'], 1);
    if (in_array(true, $check_user)) {
        if ($check_user['type'] == 'user') {
            $id                 = $user_id = t_UserIdFromUsername($_GET['u']);
            $t['user_profile'] = t_UserData($user_id);
            $type               = 'timeline';
            $about              = $t['user_profile']['about'];
            $name               = $t['user_profile']['name'];           
        }
         else {
            header("Location: " . $t['config']['site_url'].'/404');
            exit();
        }
    }else {
        header("Location: " . $t['config']['site_url'].'/404');
        exit();
    }
} else {
    header("Location: " . $t['config']['site_url']);
    exit();
}

if (!empty($_GET['type']) && in_array($_GET['type'], array('activities','mutual_friends','following','followers','videos','photos','likes','groups','family_list','requests'))) {
    $name = $name ." | ".t_Secure($_GET['type']);
}
$t['description'] = $about;
$t['keywords']    = '';
$t['page']        = $type;
$t['title']       = str_replace('&#039;', "'", $name);
$t['content']     = t_LoadPage("{$type}/content");