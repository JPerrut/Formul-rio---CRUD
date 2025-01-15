<?php 
session_start();
include_once('../../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);

    $stmt = $conexao->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists']);
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $passwordHash);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User registered successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'An error occurred while processing your request.']);
        exit();
    }

    $stmt->close();
    exit();
}

?>