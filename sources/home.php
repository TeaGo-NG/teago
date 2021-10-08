<?php
if ($t['loggedin'] == false) {
  header("Location: " . $site_url);
  exit();
}
 

$t['description'] = '';
$t['keywords']    = ' ';
$t['page']        = 'home';
$t['title']       =' ';
$t['content']     =t_loadpage('home/content');