<?php
session_start();
include_once("../includes/components.php");
include_once("../includes/config.php");
include_once("../includes/dbinfo.php");
include_once("../includes/functions.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Jed's App - Login</title>
</head>
<body>
<?php echo navbar() ?>
<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post"
      class="grid place-items-center w-full mt-60">
    <label for="username" class=" w-1/4 m-4 text-center">Username:
        <input type="text" name="username" id="username" class="bg-blue-200 rounded p-1 ml-3"></label>
    <label for="password" class=" w-1/4 m-4 text-center ">Password:
        <input type="password" name="password" id="password" class="bg-blue-200 rounded p-1 ml-3"></label>
    <input type="submit" value="Login" class="bg-green-300 p-5 mt-5">

</form>
<?php
echo handleLogin(initDb());

?>
</body>
</html>
