<?php
session_start();
if (isset($_GET['id'])) {

    $url = 'https://smarttracks.org/test/students/favor/API/controller/Admin/deleteComment.php';
    $data = json_encode(array('comment_id' => $_GET['id']));
    $options = array(
        'http' => array(
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => $data,
        )
    );
    $context = stream_context_create($options);
    $result = json_decode(file_get_contents($url, false, $context));
    $_SESSION['del_message'] = $result->message;
    session_commit();
    header("Location:http://localhost/AdminDashBoard/comments.php");
}
