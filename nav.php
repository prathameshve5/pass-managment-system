<?php 
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>

<body>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li style="float:right;">
            <?php if (isset($_SESSION['cid'])) {
                ?>
        <li><a href="viewpass.php">view pass</a></li>
        <li><a href="customer_logout.php">logout</a></li>
        <?php

    } else {
        ?><a href="customer_login.php">login</a>
        <?php 
    } ?>
        </li>
    </ul>

</body>

</html> 