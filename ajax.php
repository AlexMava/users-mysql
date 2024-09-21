<?php
require_once 'dbConnect.php';

$errors = [];
$data = [];
$status_message = 'idle';

function getFib($n) {
    return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
}

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['number'])) {
    $errors['number'] = 'Number is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $_name = $_POST['name'];
    $_number = $_POST['number'];
    $_fib = getFib($_number);
    $_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    $sqlQ = "INSERT INTO users (username, input, fib, ip) VALUES (?,?,?,?)"; 
    $stmt = $conn->prepare($sqlQ); 
    $stmt->bind_param("siis", $_name, $_number, $_fib, $_ip); 
    $insert = $stmt->execute();

    if ($insert) {
        $status_message = "New record created successfully";
    } else {
        $status_message = "Error while creating New Item!";
    }

    $conn->close();

    $data['success'] = true;
    $data['message'] = $status_message;
}

echo json_encode($data);