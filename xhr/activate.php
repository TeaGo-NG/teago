<?php
    $data = array();
    if(isset($_POST['pin'])){
        $email = $t['user']['email'];
        $code = t_Secure($_POST['pin']);
        if (t_EmailExists($email) === false) {
          $data = array(
            'status' => 501,
            'messages' => 'Access Denied',
            'location' => $site_url.'/logout'
        );
          } else if (t_ActivateUser($email, $code) === false) {   
            $data = array(
                'status' => 500,
                'messages' => 'Invalid Pin'
            );
               
          } else {
            $session = t_CreateLoginSession(t_UserIdFromEmail($email));
            $_SESSION['user_id'] = $session;
            setcookie(
                "user_id",
                $session,
                time() + (10 * 365 * 24 * 60 * 60)
            );
             
            $data = array(
                'status' => 200,
                'messages' => 'Success'
            );
         
          }
          header("Content-type: application/json");
          echo json_encode($data);
          exit();
    }

?>