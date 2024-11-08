<?php

include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\ReservationClasses\MainClass.php';
function getReservationList()
{
    return clsReservation::ListReservation();
}