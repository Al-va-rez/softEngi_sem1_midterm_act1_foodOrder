<?php session_start();
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