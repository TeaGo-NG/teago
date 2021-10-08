<?php
if ($t['loggedin'] == false) {
  header("Location: " . $site_url);
  exit();
}
 

$t['description'] = '';
$t['keywords']    = ' ';
$t['page']        = 'Create Blog';
$t['title']       =' ';
$t['content']     =t_loadpage('blog/create');