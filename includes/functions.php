<?php
function handleLogin($db)
{
    if (isset($_POST["username"]) & isset($_POST["password"]) & count($_POST) === 2) {
        print_r($_POST);
        
    } else {
        return "<h3 class='text-red-500'>Please Login</h3>";
    }
}


function initDb()
{

    $login = [DB_HOST, DB_USER, DB_PASS, DB_NAME];
    $db = new mysqli($login[0], $login[1], $login[2]);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
}
