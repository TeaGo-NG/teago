<?php
header("HTTP/1.0 404 Not Found");
$t['description'] = '';
$t['keytrds']    = '';
$t['page']        = '404';
$t['title']       = 'Sorry page not found';
$t['content']     = t_loadpage('404/content');