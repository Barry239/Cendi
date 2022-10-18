<?php

    // DB connection
    require_once '../db/connection.php';

    // PDF script
    require_once '../scripts/pdf.script.php';

    // Mailjet script
    require_once '../scripts/mail.script.php';
    use \Mailjet\Resources;

    // Validate session
    session_start();
    if (isset($_SESSION['userId'])) {
        http_response_code(200);
        die(json_encode([
            'msg' => 'Sesión iniciada actualmente'
        ]));
    }
    
    // Get data
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : NULL;
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $password = isset($_POST['password']) ? $_POST['password'] : NULL;
    $repeatPassword = isset($_POST['repeatPassword']) ? $_POST['repeatPassword'] : NULL;
    $terms = isset($_POST['terms']) ? $_POST['terms'] : NULL;

    // Validate data
    $errors = array();
    if ($password !== $repeatPassword) $errors[] = 'Las contraseñas no coinciden';
    if (!isset($terms)) $errors[] = 'No se han aceptado los términos y condiciones';
    if ($errors) {
        http_response_code(422);
        // die();
        die(json_encode([
            'msg' => $errors,
            'type' => 'warning'
        ]));
    }

    // Generate UUID
    $userId = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare statement
    $query = "INSERT INTO users (user_id, firstname, lastname, email, pwd) VALUES (:user_id, :firstname, :lastname, :email, :pwd)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pwd', $hashedPassword);

    // Execute query
    if (!$stmt->execute()) {
        http_response_code(500);
        // die();
        die(json_encode([
            'msg' => 'Error al registrar al usuario',
            'type' => 'error'
        ]));
    }

    // Create PDF
    $pdf = new PDF();
    $pdf->setMargins(20, 15, 20);
    $pdf->setDrawColor(104, 36, 68, 255);
    $pdf->SetAuthor('IPN');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTitle('Registro al cendi');
    $pdf->printWelcome();
    $pdf->printUser($userId, $firstname, $lastname, $email);
    $pdf->Output('F', "../docs/$userId.pdf");

    // Send mail
    // $file = fopen("../docs/$userId.pdf", 'r');
    // $fileContent = base64_encode(fread($file, filesize("../docs/$userId.pdf")));
    // fclose($file);
    // $body = setMailContent($email, $firstname, "$userId.pdf", $fileContent);
    // $mjResponse = $mj->post(Resources::$Email, [ 'body' => $body ]);

    // Save session data
    $_SESSION['userId'] = $userId;

    // Send response
    http_response_code(200);
    die(json_encode([
        'msg' => 'Usuario creado, se le ha enviado un correo electrónico'
    ]));

?>