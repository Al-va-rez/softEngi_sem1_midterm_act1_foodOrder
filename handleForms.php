<?php session_start();
    require_once 'index.php';

    // Check if the form is submitted
    if(isset($_POST['submit_order'])) {
        $_SESSION['customer_order'] = 1;

        // check if a text field remaines empty
        if(empty($_POST['food_quantity']) || empty($_POST['payment'])) {
            $_SESSION['missing_info'] = 1;
            $_SESSION['alert_msg'] = '<h2>THERE ARE MISSING INFORMATION</h2>';
            header('Location: index.php');
        }

        // Get the values
        $user_Food_Order = $_POST['food_order'];
        $user_Order_Quantity = $_POST['food_quantity'];
        $user_Payment = $_POST['payment'];

        // Calculate price
        $subtotal = $menu[$user_Food_Order] * $user_Order_Quantity;
        $change = $user_Payment - $subtotal;

        // check if amount paid is correct
        if ($user_Payment >= $subtotal) {
            $_SESSION['invoice'] = 1;
            $_SESSION['invoice_msg'] = '<h3>Your change is: '. $change . '</h3>';
            $_SESSION['last_msg'] = '<h2>Thank you! Enjoy your food!</h2>';
        } else {
            $_SESSION['invoice'] = 2;
            $_SESSION['invoice_msg'] = '<h2><u>Not enough cash</u></h2>';
        }

        // Get timestamp
        date_default_timezone_set('Asia/Manila');
        $date = date('m/d/Y h:i:s a', time());

        // Generate receipt
        $_SESSION['order_msg'] = '<p>You ordered: ' . $user_Food_Order . '</p>';
        $_SESSION['qty_msg'] = '<p>Quantity: ' . $user_Order_Quantity . '</p>';
        $_SESSION['price_msg'] = '<p>Total price is: ' . $subtotal . '</p>';
        $_SESSION['payment_msg'] = '<p>Your payment is: ' . $user_Payment . '</p>';
        $_SESSION['time_msg'] = $date;

        header('Location: receipt.php');
    }
?>