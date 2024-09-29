<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Act1_part2</title>
        <style>
            body {
                background-color: cornflowerblue;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            div {
                background-color: white;
                border: 5px solid;
                width: fit-content;
                padding: 50px;
                margin: auto;
                margin-top: 50px;
            }
            h1 {
                width: fit-content;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>RECEIPT</h1>
            <?php
                if(isset($_SESSION['customer_order'])) {
                    echo $_SESSION['order_msg'];
                    echo $_SESSION['qty_msg'];
                    echo $_SESSION['price_msg'];
                    echo $_SESSION['payment_msg'];
                    echo $_SESSION['time_msg'];
                    
                    switch($_SESSION['invoice']) {
                        case 1:
                            echo $_SESSION['invoice_msg'];
                            echo $_SESSION['last_msg'];
                            break;
                        case 2:
                            echo $_SESSION['invoice_msg'];
                            break;
                        default:
                            break;
                    }
                }
            ?>
    </body>
</html>