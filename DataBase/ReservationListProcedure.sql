


DELIMITER //
CREATE PROCEDURE Reservation_List()
BEGIN
    SELECT u.user_id, r.reservation_id, u.first_name, u.last_name, r.reservation_date, r.time_slot, r.number_of_guests, r.status 
    FROM users u 
    INNER JOIN reservations r ON u.user_id = r.user_id
    WHERE u.role = "client";
END //
DELIMITER ;
