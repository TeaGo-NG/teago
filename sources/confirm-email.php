<?php
if ($t['loggedin'] == false) {
  header("Location: " . $site_url);
  exit();
}
 

$t['description'] = '';
$t['keywords']    = ' ';
$t['page']        = 'confirm-email';
$t['title']       =' ';
$t['content']     =t_loadpage('home/content');