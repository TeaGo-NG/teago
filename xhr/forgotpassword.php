<?php  
    if(isset($_POST['femail'])){
        $email = t_Secure($_POST['femail']);
        if(t_EmailExists($email) === true){
            if(forgotPassword($email)){
                $data = array(
                    'status' => 200,
                    'messages' => 'Success'
                );
            }
        }else{
            $data = array(
                'status' => 500,
                'messages' => 'Email does not exist'
            );
        }


        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }




?>