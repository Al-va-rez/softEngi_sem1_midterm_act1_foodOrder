<?php session_start();

    $menu = [
        'Fishball' => 30,
        'Kikiam' => 40,
        'Corndog' => 50
    ];
?>

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
            h2 {
                margin-top: 40px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div>
            <!-- menu -->
            <h1>Welcome!</h1>
            <h2>Menu:</h2>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($menu as $item => $price) { ?>
                    <tr>
                        <td><?= $item ?></td>
                        <td><?= $price ?></td>
                    </tr>
                <?php } ?>
            </table>

            <!-- get order -->
            <form action="handleForms.php" method="POST">
                <!-- Food -->
                <p>
                    <label for="customer_order">Choose your order: </label>
                    <select name="food_order" id="customer_order">
                        <option value="Fishball">Fishball</option>
                        <option value="Kikiam">Kikiam</option>
                        <option value="Corndog">Corndog</option>
                    </select>
                </p>

                <!-- Quantity -->
                <p>
                    <label for="num_of_order">Quantity: </label>
                    <input type="number" id="num_of_order" placeholder="How many?" name="food_quantity" min="1">
                </p>

                <!-- Cash -->
                <p>
                    <label for="customer_cash">Cash: </label>
                    <input type="number" id="customer_cash" name="payment" min="30">
                </p>

                <p><input type="submit" value="Submit" name="submit_order"></p>
            </form>

            <!-- remove order -->
            <form action="unset.php" method="POST">
                <input type="submit" value="Clear" id="clearBtn" name="btn_Clear">
            </form>

            <!-- check if there are missing inputs -->
            <?php
                if(isset($_SESSION['customer_order'])) {
                    if(isset($_SESSION['missing_info'])) {
                        echo $_SESSION['alert_msg'];
                    }
                }
            ?>
        </div>
    </body>
</html>