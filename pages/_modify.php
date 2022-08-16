<?php
session_start();
include_once("../includes/components.php");
require_once('../includes/functions.php');
if (!isset($_GET["id"])) {
    die("Cannot Load Page Directly");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User Data  - <?php echo $_GET["id"]?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="grid place-items-center h-screen bg-gray-50">
<?php
print_r($_SESSION);
if (!checkId()) die("<h1 class='text-center text-xl w-full mt-20'>Could not verify url, aborted delete request. <a href='students.php' class='text-red-500'>return?</a></h1></body> </html>");
$sql = "SELECT id, firstname, lastname FROM bcit.students WHERE id = 'a82345';";
$db = initDb();
$response = $db->query($sql);
?>
<form action="./students.php" method="get" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="block text-gray-700 text-xl font-bold mb-2 text-center">Edit</h1>
    <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2">
   <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2">
   <label for="id" class="block text-gray-700 text-sm font-bold mb-2">Student ID</label>
        <input type="text" name="id" id="id" value="<?php echo '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2">
</form>
</div>
</body>
</html>
