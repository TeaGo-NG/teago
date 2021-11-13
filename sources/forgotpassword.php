<?php
$t['description'] = '';
$t['keytrds']    = '';
$t['page']        = 'forgotpassword';
$t['title']       = 'Retrieve password';
if($t['loggedin'] == true){
    header('Location: ' . $site_url);
    exit();
}else{
    $t['content']     = t_loadpage('welcome/forgotpassword');
}
