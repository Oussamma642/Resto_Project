
DELIMITER //

CREATE PROCEDURE Orders_Liste()
BEGIN
    SELECT 
        orders.order_id,
        users.last_name,
        menu_items.name AS DishName,
        orders.order_date, 
        order_items.price, 
        order_items.quantity,  
        order_items.price * order_items.quantity AS 'Total_Amount',
        orders.delivery_method, 
        orders.delivery_address,
        orders.status
    FROM 
        users
    INNER JOIN orders ON orders.user_id = users.user_id
    INNER JOIN order_items ON order_items.order_id = orders.order_id
    INNER JOIN menu_items ON menu_items.item_id = order_items.item_id
    ORDER BY 
        users.last_name ASC,    -- Sort by last name in ascending order
        orders.order_date DESC; -- Sort by order date in descending order (you can change it to ASC for ascending)
END //

DELIMITER ;

