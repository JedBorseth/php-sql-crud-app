<?php
session_start();
include_once("./includes/components.php");
include_once("./includes/config.php");
include_once("./includes/dbinfo.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Jed's App - Welcome</title>
</head>
<body>


<?php echo navbar() ?>
<h1 class="text-center text-4xl">Jed Borseth SQL App</h1>
</body>
</html>
