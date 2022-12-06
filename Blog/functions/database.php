<?php

    function config() {
        $connect = new PDO("mysql:host=localhost;dbname=cms3;" , "root" , "");
        return $connect;
    }