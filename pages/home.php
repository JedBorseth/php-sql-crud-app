<?php
include_once("../includes/dbinfo.php");
include_once("../includes/components.php");
include_once("../includes/config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Jed's App - Home</title>
    <style>.screen-height {
            height: calc(100vh - 3.5rem);
        }</style>
</head>
<body>
<?php echo navbar() ?>
<div class="screen-height grid place-items-center grid-rows-2">
    <h1 class="text-center text-4xl">Jed Borseth SQL App</h1>
    <h2 class="text-center text-3xl">Sign in to view content</h2>
</div>

</body>
</html>
