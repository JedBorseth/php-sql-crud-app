<?php
function handleLogin($db = "not login page"): string
{
    if (isset($_GET["logout"])) {
        unset($_SESSION["authuser"]);
        header("Refresh:0; url=login.php");
    }
    if (isset($_SESSION["authuser"])) {
        return "<h3 class='text-blue-800 text-center mt-5'>Still Logged In</h3>";
    }
    if ($db === "not login page") {
        return "";
    }
    if (isset($_POST["username"]) & isset($_POST["password"])) {
        if (count($_POST) === 2 & strlen($_POST["username"]) > 1 & strlen($_POST["password"]) > 1) {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $sql = "SELECT username, password FROM bcit.users WHERE username='$username' AND password='$password'";
            $result = $db->query($sql);
            if ($result) {
                $fetch = $result->fetch_all();
                if (isset($fetch) & count($fetch) > 0) {
                    $authUser = $fetch[0];
                    $_SESSION["authuser"] = $authUser;
                    header("Refresh:1");
                    $db->close();
                    return "<h3 class='text-blue-800 text-center mt-5'>Login Success</h3> ";


                } else {
                    $db->close();
                    return "<h3 class='text-orange-800 text-center mt-5'>Invalid Password or Username</h3>";
                }
            }
        } else {
            $db->close();
            return "<h3 class='text-red-500 text-center mt-5'>Please Login</h3>";
        }
    } else {
        return "<h3 class='text-red-500 text-center mt-5'>Please Login</h3>";
    }
    return "<h3 class='text-red-500 text-center mt-5'>Unexpected Error</h3>";
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
