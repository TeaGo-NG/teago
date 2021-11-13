<?php 
if ($f == 'reset_password') {
    if (isset($_POST['email'])) {
        $_POST['id'] = t_Secure($_POST['email']);
        $token = t_Secure($_POST['token']);
        if (t_isValidPasswordResetToken($_POST['id'], $token) === false ) {
            $errors = $error_icon . 'processing error';
        } elseif (empty($_POST['id'])) {
            $errors = $error_icon . 'processing error';
        } elseif (empty($_POST['password'])) {
            $errors = $error_icon . 'Please check details';
        } elseif (strlen($_POST['password']) < 5) {
            $errors = $error_icon . 'password must be greater than 5 character';
        }
        if (empty($errors) && empty($phone)) {
            $password = $_POST['password'];
            if (t_ResetPassword($_POST['id'], $password) === true) {
                $_SESSION['user_id'] = t_CreateLoginSession(t_UserIdFromEmail(t_Secure($_POST['email'])));
            }
            $data = array(
                'status' => 200,
                'message' => $success_icon . $wo['lang']['password_changed'],
                'location' => $wo['config']['site_url']
            );
        }
    }
    header("Content-type: application/json");
    if (isset($errors)) {
        echo json_encode(array(
            'errors' => $errors
        ));
    } else {
        echo json_encode($data);
    }
    exit();
}
