<?php 
session_start();

if (isset($_POST['submit'])) {
    include_once('../../../config.php');

    if (!$conexao) {
        error_log("Error connecting to the database: " . mysqli_connect_error());
        die("An error occurred while processing your request.");
    }

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $passwordHash);

    if ($stmt->execute()) {
        $_SESSION['message'] = "User registered successfully!";
    } else {
        error_log("Error registering user: " . $stmt->error);
        $_SESSION['message'] = "An error occurred while processing your request.";
    }

    $stmt->close();
    header("Location: ../register_login.php");
    exit();
}

$message = '';

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

?>