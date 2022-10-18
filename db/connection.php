<?php

    $DB_SERVER = '';
    $DB_USER = '';
    $DB_PWD= '';
    $DB_NAME = '';

    try {
        $conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_NAME;", $DB_USER, $DB_PWD);
    } catch (PDOException $e) {
        print_r($e);
        http_response_code(500);
        die(json_encode([
            'msg' => 'DB connection failed',
            'type' => 'error'
        ]));
    }

?>