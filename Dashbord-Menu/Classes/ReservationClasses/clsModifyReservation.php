<?php

include_once 'clsReservation';

class clsModifyReservation 
{
    private static function CheckForms(): bool
    {
        if (isset($_GET['id']) && isset($_GET['status'])) {
            if (in_array($_GET['status'], ['pending', 'confirmed', 'canceled'])) {
                return true;
            }
        }
        return false;
    }

    public static function ModifyReservation(): void
    {
        if (self::CheckForms()) 
        {
            clsReservation::ModifyReservation($_GET['id'], $_GET['status']);
            // echo "Reservation status updated to: " . htmlspecialchars($_GET['status']);
        } 
        else 
        {
            echo "Invalid parameters.";
        }
    }
}

// Ensure the script only runs if accessed directly
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    clsModifyReservation::ModifyReservation();
}