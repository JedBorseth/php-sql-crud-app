<?php


function navbar(): string
{

    function getItems(): void
    {
        global $pagesTitle, $pagesFiles, $welcomeLink, $signOut;
        if (preg_match("/\/" . PAGES_DIR . "\//", $_SERVER["REQUEST_URI"])) {
//            In Pages Dir
            if (isset($_SESSION["authuser"])) {
                $signOut = "<div class='h-10 w-fit bg-red-600 p-2 text-center'><a href='./login.php?logout=true'>Logout</a></div> </div>";
            } else {
                $signOut = "</div>";
            }
            $tempArr = scandir("./");
            sort($tempArr);
            foreach ($tempArr as $i) {
                if (!(preg_match("/^\./", $i) | str_starts_with($i, "_"))) {
                    $pagesFiles[] = $i;
                    $pagesTitle[] = "<li class='bg-blue-300 p-2'><a href='$i'>" . ucfirst(preg_replace("/\.php$/", "", $i)) . "</a></li>";
                }
            }
            $welcomeLink = "<li class='bg-red-300 p-2'><a href='../index.php'>Welcome</a></li>";
        } else {
//            Outside Pages Dir so index.php
            if (isset($_SESSION["authuser"])) {
                $signOut = "<div class='h-10 w-fit bg-red-600 p-2 text-center'><a href='./" . PAGES_DIR . "/login.php?logout=true'>Logout</a></div> </div>";
            } else {
                $signOut = "</div>";
            }
            $tempArr = scandir(PAGES_DIR);
            sort($tempArr);

            foreach ($tempArr as $i) {
                if (!(preg_match("/^\./", $i) | str_starts_with($i, "_"))) {
                    $pagesFiles[] = $i;
                    $pagesTitle[] = "<li class='bg-blue-300 p-2'><a href='./" . PAGES_DIR . "/$i'>" . ucfirst(preg_replace("/\.php$/", "", $i)) . "</a></li>";
                }
            }
            $welcomeLink = "<li class='bg-red-300 p-2'><a href='#'>Welcome</a></li>";
        }


    }

    getItems();
    global $pagesTitle, $pagesFiles, $welcomeLink, $profilePic, $signOut;

    $openNav = "<header class='w-full h-14 bg-gray-900 flex items-center'>
    <nav class='w-1/2'>
        <ul class='flex justify-around'>";
    $closeNav = "</nav></header>";
    $navItems = implode(" ", $pagesTitle);
    if (!isset($_SESSION["authuser"])) {
        $profilePic = "</ul></nav><div class='w-1/2 flex justify-end pr-5'><div class='h-10 w-fit bg-red-600 p-2 text-center'>Not Signed In</div>";

    } else {
        $profilePic = "</ul></nav><div class='w-1/2 flex justify-end pr-5'><div class='h-10 w-fit bg-blue-600 p-2 text-center'>" . ucfirst($_SESSION["authuser"][0]) . "</div>";
    }
    return "$openNav $welcomeLink $navItems $profilePic $signOut $closeNav";
}


//HTML SVGS
$garbage = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>";
$edit = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>";



