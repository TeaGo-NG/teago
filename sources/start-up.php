<?php
if ($t['loggedin'] == false) {
  header("Location: " . $site_url);
  exit();
}
 

$t['description'] = '';
$t['keywords']    = ' ';
$t['page']        = 'Start up';
$t['title']       =' ';
$t['content']     =t_loadpage('welcome/start-up');