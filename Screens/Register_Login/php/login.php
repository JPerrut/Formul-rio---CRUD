<?php

session_start();

if (!empty($_POST['email-login']) && !empty($_POST['password-login'])) {
    include_once('../../../config.php');
    
    if (!$conexao) {
        echo "Erro de conexão com o banco de dados.";
        exit();
    }

    $email = $_POST['email-login'];
    $password = $_POST['password-login'];
    $rememberMe = isset($_POST['remember-me']) && $_POST['remember-me'] === "1";

    $stmt = $conexao->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];

            if ($rememberMe) {
                $token = bin2hex(random_bytes(16));
                $expiry = time() + (30 * 24 * 60 * 60);
                $tokenExpiry = date('Y-m-d H:i:s', $expiry);

                setcookie("remember_token", $token, $expiry, "/", "", false, true);

                $stmt = $conexao->prepare("UPDATE users SET remember_token = ?, token_expiry = ? WHERE id = ?");
                $stmt->bind_param("ssi", $token, $tokenExpiry, $user['id']);
                $stmt->execute();
            }

            echo json_encode (['status' => 'success']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect email or password']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect email or password']);
        exit();
    }
} 

?>