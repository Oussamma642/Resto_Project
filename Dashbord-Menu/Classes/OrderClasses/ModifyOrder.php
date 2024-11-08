<?php
function ModifyOrder()
{
    include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\OrderClasses\MainClass.php';
    session_start();

    if (isset($_GET['id']) && isset($_GET['status']))
    {
        if (clsOrders::ModifyOrder($_GET['id'], $_GET['status']))
        {
            $_SESSION['Message'] = "The Order has been " . $_GET['status'] ." succufully!!";
        } 
    }
    else
    {
        $_SESSION['Message'] = "The Order is unkown!!";
    }
    // Redirect back to Reservations.php
    header("Location: ../../Orders.php");
    exit();  // Make sure no further code is executed after the redirect
}
ModifyOrder();