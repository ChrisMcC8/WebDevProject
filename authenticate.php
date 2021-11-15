<?php

    define('ADMIN_LOGIN', 'Admin');
    define('ADMIN_PASS', 'Password123');

    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASS)){
        header('Unauthorized access.');
        exit('Access denied!');
    }

?>