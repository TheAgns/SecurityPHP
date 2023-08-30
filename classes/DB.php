<?php

class DB {
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db') . ';charset=' . Config::get('mysql/charset'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

