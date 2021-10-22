<?php
require 'assets/init.php';

if ($t['loggedin'] == true && !isset($_GET['link1'])) {
    $page = 'home';
} elseif (isset($_GET['link1'])) {
    $page = $_GET['link1'];
}

if ((!isset($_GET['link1']) && $t['loggedin'] == false) || (isset($_GET['link1']) && $t['loggedin'] == false && $page == 'home')) {
    $page = 'welcome';
}

if($page !== ''){  
        switch ($page) {
            case 'home' :
                include('sources/home.php');
            break;
            case 'confirm-email' :
                include('sources/confirm-email.php');
            break;
            case 'start_up' :
                include('sources/start_up.php');
            break;
            case 'createblog' :
                include('sources/createblog.php');
            break;
            case '404' :
                include('sources/404.php');
            break;
            case 'welcome' : 
                include('sources/welcome.php');
            break; 
            case  'start-up' :
                include('sources/start-up.php');
            break;
            case 'logout' :
                include('sources/logout.php');
            break;
            case 'test' :
                include('sources/test.php');
            break;
            case 'timeline' :
                include('sources/timeline.php');
            break;
        }
        if (empty($t['content'])) {
                include('sources/home.php');
        }
        echo t_loadpage('container');
        mysqli_close($sqlConnect);
        unset($t);
}
    








?>