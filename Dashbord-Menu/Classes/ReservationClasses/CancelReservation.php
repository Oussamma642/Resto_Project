<?php

function CancelReservation()
{
    include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\ReservationClasses\MainClass.php';
    session_start();


    if (isset($_GET['id'])) 
    {
        // Check if the reservation was successfully accepted
        if (clsReservation::CancelReservation($_GET['id'])) 
        {
            // Store the success message in the session
            $_SESSION['Message'] = 'The Reservation has been Canceled successfully!!';
        } 
        else 
        {
            // Store the failure message in the session
            $_SESSION['Message'] = 'The Reservation has not been Canceled!!';
        }
    } 
    else 
    {
        // Store the error message in the session
        $_SESSION['Message'] = 'The Reservation is unknown!!';
    }
    // Redirect back to Reservations.php
    header("Location: ../../Reservations.php");
    exit();  // Make sure no further code is executed after the redirect

}
CancelReservation();