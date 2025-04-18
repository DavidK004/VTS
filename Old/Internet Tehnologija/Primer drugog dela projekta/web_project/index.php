<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <style>

        li {
            list-style-type: none;
            float: left;
            border: 1px solid #a5a5a5;
            text-align: center;
            background-color: #f5f5f5;
            margin: 2px 5px 0;
        }

        #navigation {
            display: block;
            overflow: auto;
            border-bottom: 3px solid #a5a5a5;

        }

        #navigation a {
            text-decoration: none;
            color: #000;
            padding: 5px;
            display: block;
        }

        #navigation a:hover, li:hover {
            background-color: #a5a5a5;
            color: #fff;
        }

        th, td {
            border: 1px solid #c5c5c5;
            padding: 5px
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #d5d5d5;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
define("SECRET", "@3eweHjdsdfuihjhjhj#VGVgggg!");

require "db_config.php";
require "navigation.php";
require "functions.php";

$op = "home";

if (isset($_GET['op']))
    $op = mysqli_real_escape_string($connection, $_GET['op']);


switch ($op) {
    case "home";
    default:
        include "home.html";
        break;
    case "new":
        include "new.php";
        break;

    case "delete":
        include "delete.php";
        break;

    case "delete_product":
        if (isset($_GET['id_product'])) {
            if ($_GET['id_product'] != "choose") {
                $id_product = (int)mysqli_real_escape_string($connection, $_GET['id_product']);
                deleteProduct($id_product);
                include "delete.php";
            } else
                include "delete.php";
        }

        break;

    case "list":
        include "list.php";
        break;

    case "update":
        include "update.php";
        break;

    case "update_product":
        if (isset($_GET['id_product'])) {
            if ($_GET['id_product'] != "choose") {
                $id_product = (int)mysqli_real_escape_string($connection, $_GET['id_product']);
                include "update_product.php";
            } else
                include "update.php";
        }

        break;

}

?>
</body>
</html>
