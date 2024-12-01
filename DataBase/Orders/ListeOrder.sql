

-- List Orders
drop procedure Orders_Liste;
DELIMITER //
CREATE PROCEDURE Orders_Liste()
BEGIN
SELECT 
    orders.order_id,
    users.last_name,
    users.email,
    orders.order_date,
    orders.delivery_method
    FROM 
    users
INNER JOIN orders ON orders.user_id = users.user_id;
END //
DELIMITER ;


-- The content of each order
DELIMITER //
CREATE PROCEDURE Order_Items_Details(in orderId int)
BEGIN 
    SELECT
        menu_items.name AS DishName,
        order_items.price, 
        order_items.quantity,  
        orders.delivery_address,
        orders.status
    FROM 
        users
    INNER JOIN orders ON orders.user_id = users.user_id
    INNER JOIN order_items ON order_items.order_id = orders.order_id
    INNER JOIN menu_items ON menu_items.item_id = order_items.item_id
    where orders.order_id = orderId;
END //
DELIMITER ;

-- Create function to return the total amount of an order
DELIMITER //
create function Total_Order_Amount(OrderId int)
returns DECIMAL
reads sql data
BEGIN
    DECLARE sumOrd DECIMAL(10,2);
    SELECT sum(price * quantity) INTO sumOrd
    FROM order_items
    where order_id = OrderId;
    return sumOrd;
END //
DELIMITER ;



