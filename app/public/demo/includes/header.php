<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"
        />
        <title>Claudia Niculescu</title>
    </head>
    <body>

        <?php 
        require_once('includes/db.php');
        require_once('includes/functions.php');
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><?php echo SITE_NAME; ?></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php foreach($menu_items as $menu_item){ ?>
                            <li class="nav-item">
                                <a
                                    class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == $menu_item['url'] ? 'active' : '';  ?>"
                                    <?php echo basename($_SERVER['PHP_SELF']) == $menu_item['url'] ? 'aria-current="page"' : '';  ?>
                                    href="<?php echo $menu_item['url'] ?>"
                                >   <?php echo $menu_item['title'] ?>
                                </a>
                        </li>
                        <?php } ?>
                    </ul>

            <?php require_once('includes/search-form.php'); ?>
            
                </div>
            </div>
        </nav>