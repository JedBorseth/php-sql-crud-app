<?php
session_start();
include_once("../includes/components.php")


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
if (!isset($_GET["id"]) | !isset($_SESSION["testLast"])) {
    die("<h1 class='text-center text-5xl w-full mt-20'>Cannot Access Page Directly</h1></body></html>");
}
function checkId()
{
    foreach ($_SESSION["testLast"] as $lastName) {
        if ($lastName === $_GET["id"]) {
            unset($_SESSION["testLast"]);
            return true;
        }
    }
}

if (!checkId()) die("Please dont try to edit your url after the ? </body> </html>");


$_SESSION["delete"] = $_GET["id"]
?>
<h1 class="absolute top-0 text-center w-full text-6xl bg-indigo-100 p-10">Delete?</h1>
<div class="h-screen w-full bg-indigo-100 flex p-10">
    <a class="h-full w-1/2 bg-red-200 grid place-items-center" href="./students.php?confirm=false">
        <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" fill="#ffffff" class="bi bi-x-circle"
             viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </a>
    <a class="h-full w-1/2 bg-green-200 grid place-items-center" href="./students.php?confirm=true">
        <svg xmlns='http://www.w3.org/2000/svg' width='256' height='256' fill='#ffffff' class='bi bi-check-circle'
             viewBox='0 0 16 16'>
            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
            <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
        </svg";
    </a>

</div>
</body>
</html>
