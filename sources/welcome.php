<?php
$t['description'] = '';
$t['keytrds']    = '';
$t['page']        = 'welcome';
$t['title']       = 'Welcome To Teago';
if($t['loggedin'] == true){
    header('Location: ' . $site_url);
    exit();
}else{
    $t['content']     = t_loadpage('welcome/content');
}
