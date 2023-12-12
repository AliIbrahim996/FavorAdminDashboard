<?php
session_start();
if (isset($_POST['user_name']) && isset($_POST['password'])) {
    $url = 'https://smarttracks.org/test/students/favor/API/controller/userOp/logIn.php';
    $data = json_encode(array('user_name' => $_POST['user_name'], "password" => $_POST['password']));
    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => $data,
        )
    );
    $context = stream_context_create($options);
    $result = json_decode(file_get_contents($url, false, $context));
    $message = $result->message;
    $userInfo = $result->user_info;
    if ($userInfo->userRole == 1) {
        $_SESSION['loggedIn']= 1;
        $_SESSION['msg'] = $result->message;
        header("Location:http://localhost/AdminDashBoard/main.php");
    }
}
