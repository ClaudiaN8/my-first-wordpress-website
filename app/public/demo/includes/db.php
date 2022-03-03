<?php 

    define("SITE_NAME", "CN"); 

    $menu_items = array(
        array(
            'url' => 'index.php',
            'title' => 'Home',
        ),
        array(
            'url' => 'movies.php',
            'title' => 'Movies',
        ),
        array(
            'url' => 'contact.php',
            'title' => 'Contact Us',
        ),
    );
    
    if (!in_array(basename($_SERVER['PHP_SELF']), array('index.php', 'contact.php'))){
            $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
        };
?>

        <!-- $movies = array(
                 array(
                     "id" => "1",
                     "poster" => "https://resizing.flixster.com/g-5Hul9R0qvRM1A9hWMydgeyxZc=/206x305/v2/https://resizing.flixster.com/zd4AcmJIYgO_Uj9NIuFaSkXn4qg=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzE2ZDU3Nzk2LTMxMWItNDdlYS04MmFlLTA5N2FkNTdkOGFlMy5qcGc=",
                     "title" => "The Auschwitz Report",
                     "runtime" => "94",
                     "year" => "1956",
                     "desc" => "This is the true story of Freddy and Walter -- two young Slovak Jews, who were deported to Auschwitz in 1942",
                 ),
                 array(
                     "id" => "2",
                     "poster" => "https://resizing.flixster.com/33ZR-CFOek8Y8zFX2L485pVGaMg=/206x305/v2/https://resizing.flixster.com/kS1oWUWGR0qTZjkRbveneG4yADM=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzE3MTA1ZmFkLTE4MzAtNDQ3Ny05ZWQ3LTE1ZGZmYjNjYmI2ZS5qcGc=",
                     "title" => "The Cleaner",
                     "runtime" => "93",
                     "year" => "2021",
                     "desc" => "A middle-aged house cleaner gets caught up in a violent crime after being hired to locate a client's estranged son",
                 ),
                 array(
                     "id" => "3",
                     "poster" => "https://resizing.flixster.com/XxZbMOe_D6ibhWckBo9fdzDm6dM=/206x305/v2/https://resizing.flixster.com/lCl7FMgE_MHzqQDvDGVapBugkYY=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzL2MwMjlmZWYyLTMwOWMtNDIyNy04OTAzLTViYjBkMWEwZjgxMS5qcGc=",
                     "title" => "Flying the Feathered Edge: The Bob Hoover Project",
                     "runtime" => "86",
                     "year" => "2014",
                     "desc" => "A unique look at flying from Bob Hoover, a founding father of modern aerobatics",
                 ),
             ); -->
