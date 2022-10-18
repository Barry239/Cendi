<?php

    // DB connection
    require_once '../db/connection.php';

    // Validate session
    session_start();
    if (isset($_SESSION['userId'])) {
        http_response_code(200);
        die(json_encode([
            'msg' => 'Sesión iniciada actualmente'
        ]));
    }
    
    // Get data
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $password = isset($_POST['password']) ? $_POST['password'] : NULL;

    // Prepare statement
    $query = "SELECT user_id, email, pwd FROM users WHERE email=:email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);

    // Execute query
    if (!$stmt->execute()) {
        http_response_code(500);
        die(json_encode([
            'msg' => 'Error al iniciar sesión',
            'type' => 'error'
        ]));
    }

    // Fetch data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Validate user and password
    if (!$user || !password_verify($password, $user['pwd'])) {
        http_response_code(401);
        die(json_encode([
            'msg' => 'Correo / contraseña incorrecta',
            'type' => 'warning'
        ]));
    }

    // Save session data
    $_SESSION['userId'] = $user['user_id'];

    // Send response
    http_response_code(200);
    die(json_encode([
        'msg' => 'Datos correctos'
    ]));

?>