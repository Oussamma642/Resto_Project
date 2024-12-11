

DELIMITER $$

CREATE PROCEDURE DeleteMenuItem(IN itemId INT)
BEGIN
    DELETE FROM menu_items
    WHERE item_id = itemId;
END$$

DELIMITER ;

