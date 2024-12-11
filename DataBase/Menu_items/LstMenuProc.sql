

DELIMITER //
CREATE PROCEDURE GetMenuItems()
BEGIN
    SELECT
        item_id,
        name,
        description,
        picturePath,
        price,
        is_available,
        created_at,
        updated_at
    FROM menu_items;
END //

DELIMITER ;

