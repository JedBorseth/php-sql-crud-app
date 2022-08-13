<?php
session_start();
include_once("../includes/dbinfo.php");
include_once("../includes/components.php");
include_once("../includes/config.php");
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
    <title>Jed's App - Students</title>
</head>
<body>
<?php
echo navbar();
if (!isset($_SESSION["authuser"])) {
    die("<h2 class='text-center text-5xl mt-10'>Please Sign in to view this page</h2>");
}

?>

<h1 class="text-center text-4xl">Jed Borseth SQL App - Students Database</h1>
<div class="grid place-items-center w-full pt-10">
    <table class=" w-1/2 bg-blue-500 rounded p-10 mb-10">
        <?php
        $sql = "SELECT id, firstname, lastname FROM bcit.students";
        $db = initDb();
        $response = $db->query($sql);
        $rowsTotal = $response->num_rows;
        for ($i = 0; $i < $rowsTotal; $i++) {
            echo "<tr class='border-2'>";
            foreach ($response->fetch_row() as $data) {
                echo "<td class='p-2 border'> $data </td>";
            }
            if (isset($garbage, $data, $edit)) {
                $_SESSION["testLast"][] = $data;
                echo "<td class='p-2'><a href='./_delete.php?id=$data' >$garbage</a> </td><td>$edit</td></tr>";
            }
        }

        if (isset($_GET["confirm"])) {
            if ($_GET["confirm"] === "true") {
                global $rowsTotal;
                function deleteItem()
                {
                    global $rowsTotal;
                    $sql = "DELETE FROM bcit.students WHERE lastname = 'Borseth';";
                    $db = initDb();
                    $response = $db->query($sql);
                    if ($response) {
                        $newTotal = $db->query("SELECT primary_key FROM bcit.students")->num_rows;
                        if (!$newTotal === $rowsTotal) {
                            echo "Delete Success";
                        } else {
                            echo "Nothing to delete";
                        }
                    } else {
                        echo "Delete Failed";
                    }
//                    header("Refresh:3; url=students.php");
                }

                deleteItem();
            }
        }

        ?>


    </table>
</div>
</body>
</html>
