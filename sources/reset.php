<?php
$t['description'] = '';
$t['keytrds']    = '';
$t['page']        = 'reset';
$t['title']       = 'Reset password';
if($t['loggedin'] == true){
    header('Location: ' . $site_url);
    exit();
}else{
    $t['content']     = t_loadpage('welcome/reset');
}
