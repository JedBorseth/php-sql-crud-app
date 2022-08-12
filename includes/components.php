<?php


function navbar(): string
{

    function getItems(): void
    {
        global $pagesTitle, $pagesFiles, $welcomeLink;
        if (preg_match("/\/" . PAGES_DIR . "\//", $_SERVER["REQUEST_URI"])) {
//            In Pages Dir
            $tempArr = scandir("./");
            sort($tempArr);
            foreach ($tempArr as $i) {
                if (!preg_match("/^\./", $i)) {
                    $pagesFiles[] = $i;
                    $pagesTitle[] = "<li class='bg-blue-300 p-2'><a href='$i'>" . ucfirst(preg_replace("/\.php$/", "", $i)) . "</a></li>";
                }
            }
            $welcomeLink = "<li class='bg-red-300 p-2'><a href='../index.php'>Welcome</a></li>";
        } else {
//            Outside Pages Dir so index.php
            $tempArr = scandir(PAGES_DIR);
            sort($tempArr);

            foreach ($tempArr as $i) {
                if (!preg_match("/^\./", $i)) {
                    $pagesFiles[] = $i;
                    $pagesTitle[] = "<li class='bg-blue-300 p-2'><a href='./" . PAGES_DIR . "/$i'>" . ucfirst(preg_replace("/\.php$/", "", $i)) . "</a></li>";
                }
            }
            $welcomeLink = "<li class='bg-red-300 p-2'><a href='#'>Welcome</a></li>";
        }


    }

    getItems();
    global $pagesTitle, $pagesFiles, $welcomeLink;

    $openNav = "<header class='w-full h-14 bg-gray-900 flex items-center'>
    <nav class='w-1/2'>
        <ul class='flex justify-around'>";
    $closeNav = "</ul></nav></header>";
    $navItems = implode(" ", $pagesTitle);


    $html = "$openNav $welcomeLink $navItems $closeNav";
    return $html;
}

