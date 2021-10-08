<?php
 
 function t_loadpage($page_url = ''){
    global $t, $db;
    $create_file = false;
    $page         = './themes/' . '/layout/' . $page_url . '.phtml';
    $page_content = '';
    ob_start();
    require($page);
    $page_content = ob_get_contents();
    ob_end_clean();
     
    return $page_content;
 }
 
//bytes convertion
 function t_sizeunits($bytes = 0){
   if ($bytes >= 1073741824)
   {
       $bytes = round(($bytes / 1073741824)) . ' GB';
   }
   elseif ($bytes >= 1048576)
   {
       $bytes = round(($bytes / 1048576)) . ' MB';
   }
   elseif ($bytes >= 1024)
   {
       $bytes = round(($bytes / 1024)) . ' KB';
   }
   return $bytes;
}
//return bytes
function t_ReturnBytes($val) {
   $val  = trim($val);
   $last = strtolower($val[strlen($val) - 1]);
   switch ($last) {
       case 'g':
           $val *= 1024;
       case 'm':
           $val *= 1024;
       case 'k':
           $val *= 1024;
   }
   return $val;
}

//redirect
function t_redirect($url) {
   return header("Location: {$url}");
}

// Secure injection
function t_Secure($string, $br = true, $strip = 0) {
   global $sqlConnect;
   $string = trim($string);
   $string = cleanString($string);
   $string = mysqli_real_escape_string($sqlConnect, $string);
   $string = htmlspecialchars($string, ENT_QUOTES);
   if ($br == true) {
       $string = str_replace('\r\n', " <br>", $string);
       $string = str_replace('\n\r', " <br>", $string);
       $string = str_replace('\r', " <br>", $string);
       $string = str_replace('\n', " <br>", $string);
   } else {
       $string = str_replace('\r\n', "", $string);
       $string = str_replace('\n\r', "", $string);
       $string = str_replace('\r', "", $string);
       $string = str_replace('\n', "", $string);
   }
   if ($strip == 1) {
       $string = stripslashes($string);
   }
   $string = str_replace('&amp;#', '&#', $string);
  
   return $string;
}
//clean string
function cleanString($string) {
   return $string = preg_replace("/&#?[a-z0-9]+;/i","", $string); 
}

//generate random key

function t_GenerateKey($minlength = 20, $maxlength = 20, $uselower = true, $useupper = true, $usenumbers = true, $usespecial = false) {
   $charset = '';
   if ($uselower) {
       $charset .= "abcdefghijklmnopqrstuvwxyz";
   }
   if ($useupper) {
       $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   }
   if ($usenumbers) {
       $charset .= "123456789";
   }
   if ($usespecial) {
       $charset .= "~@#$%^*()_+-={}|][";
   }
   if ($minlength > $maxlength) {
       $length = mt_rand($maxlength, $minlength);
   } else {
       $length = mt_rand($minlength, $maxlength);
   }
   $key = '';
   for ($i = 0; $i < $length; $i++) {
       $key .= $charset[(mt_rand(0, strlen($charset) - 1))];
   }
   return $key;
}
//get ip address
function get_ip_address() {
   if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
       return $_SERVER['HTTP_X_FORWARDED'];
   if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
       return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
   if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
       return $_SERVER['HTTP_FORWARDED_FOR'];
   if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
       return $_SERVER['HTTP_FORWARDED'];
   return $_SERVER['REMOTE_ADDR'];
}

//validate ip
function validate_ip($ip) {
   if (strtolower($ip) === 'unknown')
       return false;
   $ip = ip2long($ip);
   if ($ip !== false && $ip !== -1) {
       $ip = sprintf('%u', $ip);
       if ($ip >= 0 && $ip <= 50331647)
           return false;
       if ($ip >= 167772160 && $ip <= 184549375)
           return false;
       if ($ip >= 2130706432 && $ip <= 2147483647)
           return false;
       if ($ip >= 2851995648 && $ip <= 2852061183)
           return false;
       if ($ip >= 2886729728 && $ip <= 2887778303)
           return false;
       if ($ip >= 3221225984 && $ip <= 3221226239)
           return false;
       if ($ip >= 3232235520 && $ip <= 3232301055)
           return false;
       if ($ip >= 4294967040)
           return false;
   }
   return true;
}

// short text
function t_ShortText($text = "", $len = 100) {
   if (empty($text) || !is_string($text) || !is_numeric($len) || $len < 1) {
       return "****";
   }
   if (strlen($text) > $len) {
       $text = mb_substr($text, 0, $len, "UTF-8") . "..";
   }
   return $text;
}

function t_Sql_Result($res, $row = 0, $col = 0) {
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows - 1) && $row >= 0) {
        mysqli_data_seek($res, $row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])) {
            return $resrow[$col];
        }
    }
    return false;
}

function fetchDataFromURL($url = '') {
    if (empty($url)) {
        return false;
    }
    $ch = curl_init($url);
    curl_setopt( $ch, CURLOPT_POST, false );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
    curl_setopt( $ch, CURLOPT_HEADER, false );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt( $ch, CURLOPT_TIMEOUT, 5);
    return curl_exec( $ch );
}
function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    // First get the platform?
    if (preg_match('/macintosh|mac os x/i', $u_agent)) {
      $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
      $platform = 'windows';
    } elseif (preg_match('/iphone|IPhone/i', $u_agent)) {
      $platform = 'IPhone Web';
    } elseif (preg_match('/android|Android/i', $u_agent)) {
      $platform = 'Android Web';
    } else if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $u_agent)) {
      $platform = 'Mobile';
    } else if (preg_match('/linux/i', $u_agent)) {
      $platform = 'linux';
    }
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    } elseif(preg_match('/Firefox/i',$u_agent)) {
      $bname = 'Mozilla Firefox';
      $ub = "Firefox";
    } elseif(preg_match('/Chrome/i',$u_agent)) {
      $bname = 'Google Chrome';
      $ub = "Chrome";
    } elseif(preg_match('/Safari/i',$u_agent)) {
      $bname = 'Apple Safari';
      $ub = "Safari";
    } elseif(preg_match('/Opera/i',$u_agent)) {
      $bname = 'Opera';
      $ub = "Opera";
    } elseif(preg_match('/Netscape/i',$u_agent)) {
      $bname = 'Netscape';
      $ub = "Netscape";
    }
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
      // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
      //we will have two since we are not using 'other' argument yet
      //see if version is before or after the name
      if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        $version= $matches['version'][0];
      } else {
        $version= $matches['version'][1];
      }
    } else {
      $version= $matches['version'][0];
    }
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern,
        'ip_address' => get_ip_address()
    );
}
function ToObject($array) {
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = ToObject($value);
        }
        if (isset($value)) {
            $object->$key = $value;
        }
    }
    return $object;
}

function ToArray($obj) {
    if (is_object($obj))
        $obj = (array) $obj;
    if (is_array($obj)) {
        $new = array();
        foreach ($obj as $key => $val) {
            $new[$key] = ToArray($val);
        }
    } else {
        $new = $obj;
    }
    return $new;
}
function t_CreateSession() {
    $hash = sha1(rand(1111, 9999));
    if (!empty($_SESSION['hash_id'])) {
        $_SESSION['hash_id'] = $_SESSION['hash_id'];
        return $_SESSION['hash_id'];
    }
    $_SESSION['hash_id'] = $hash;
    return $hash;
}
function t_CheckSession($hash = '') {
    if (!isset($_SESSION['hash_id']) || empty($_SESSION['hash_id'])) {
        return false;
    }
    if (empty($hash)) {
        return false;
    }
    if ($hash == $_SESSION['hash_id']) {
        return true;
    }
    return false;
}
function t_CreateMainSession() {
    $hash = substr(sha1(rand(1111, 9999)), 0, 20);
    if (!empty($_SESSION['main_hash_id'])) {
        $_SESSION['main_hash_id'] = $_SESSION['main_hash_id'];
        return $_SESSION['main_hash_id'];
    }
    $_SESSION['main_hash_id'] = $hash;
    return $hash;
}
function t_CheckMainSession($hash = '') {
    if (!isset($_SESSION['main_hash_id']) || empty($_SESSION['main_hash_id'])) {
        return false;
    }
    if (empty($hash)) {
        return false;
    }
    if ($hash == $_SESSION['main_hash_id']) {
        return true;
    }
    return false;
}

// function t_IsBanned($value = '') {
//     global $sqlConnect;
//     $value           = Wo_Secure($value);
//     $query_one    = mysqli_query($sqlConnect, "SELECT COUNT(`id`) as count FROM " . T_BANNED_IPS . " WHERE `ip_address` = '{$value}'");
//     if (mysqli_num_rows($query_one)) {
//         $fetched_data = mysqli_fetch_assoc($query_one);
//         if ($fetched_data['count'] > 0) {
//             return true;
//         }
//     }
        
//     return false;
// }
// function t_BanNewIp($ip) {
//     global $sqlConnect;
//     $ip           = Wo_Secure($ip);
//     $query_one    = mysqli_query($sqlConnect, "SELECT COUNT(`id`) as count FROM " . T_BANNED_IPS . " WHERE `ip_address` = '{$ip}'");
//     if (mysqli_num_rows($query_one)) {
//         $fetched_data = mysqli_fetch_assoc($query_one);
//         if ($fetched_data['count'] > 0) {
//             return false;
//         }
//     }
        
//     $time      = time();
//     $query_two = mysqli_query($sqlConnect, "INSERT INTO " . T_BANNED_IPS . " (`ip_address`,`time`) VALUES ('{$ip}','{$time}')");
//     if ($query_two) {
//         return true;
//     }
// }
// function t_IsIpBanned($id) {
//     global $sqlConnect;
//     $id           = Wo_Secure($id);
//     $query_one    = mysqli_query($sqlConnect, "SELECT COUNT(`id`) as count FROM " . T_BANNED_IPS . " WHERE `id` = '{$id}'");
//     if (mysqli_num_rows($query_one)) {
//         $fetched_data = mysqli_fetch_assoc($query_one);
//         if ($fetched_data['count'] > 0) {
//             return true;
//         } else {
//             return false;
//         }
//     }
//     return false;
        
// }
// function t_DeleteBanned($id) {
//     global $sqlConnect;
//     $id = Wo_Secure($id);
//     if (Wo_IsIpBanned($id) === false) {
//         return false;
//     }
//     $query_two = mysqli_query($sqlConnect, "DELETE FROM " . T_BANNED_IPS . " WHERE `id` = {$id}");
//     if ($query_two) {
//         return true;
//     }
// }
function t_GetMedia($media) {
    global $t;
    if (empty($media)) {
        return '';
    }
    // if ($t['config']['amazone_s3'] == 1) {
    //     if (empty($t['config']['amazone_s3_key']) || empty($t['config']['amazone_s3_s_key']) || empty($t['config']['region']) || empty($t['config']['bucket_name'])) {
    //         return $t['config']['site_url'] . '/' . $media;
    //     }
    //     return $t['config']['s3_site_url'] . '/' . $media;
    // } else if ($t['config']['spaces'] == 1) {
    //     if (empty($t['config']['spaces_key']) || empty($t['config']['spaces_secret']) || empty($t['config']['space_region']) || empty($t['config']['space_name'])) {
    //         return $t['config']['site_url'] . '/' . $media;
    //     }
    //     return  'https://' . $t['config']['space_name'] . '.' . $t['config']['space_region'] . '.digitaloceanspaces.com/' . $media;
    // } else if ($t['config']['ftp_upload'] == 1) {
    //     return addhttp($t['config']['ftp_endpoint']) . '/' . $media;
    // } else if ($t['config']['cloud_upload'] == 1) {
    //     return 'https://storage.googleapis.com/'. $t['config']['cloud_bucket_name'] . '/' . $media;
    // }
    return $t['config']['site_url'] . '/' . $media;
}
?>