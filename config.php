<?php

const DB_NAME = 'credtudo';
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
global $pdo;
try {

    $pdo = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo "ERRO NA CONEXAÕ" . $e->getMessage();
}
