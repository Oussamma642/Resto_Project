

delimiter //

private $user_id;
private $first_name;
private $last_name;
private $email;
private $password;
private $phone_number;
private $role;
private $permissions;


call update_user(15, 'Mohammed','Tazi-Issa','tazi@gmail.com','0000az','060606','admin',1);
delimiter //
create procedure update_user
(
    in id int,
    in fname varchar(30),
    in lname varchar(30),
    in email varchar(255),  
    in pswd varchar(255),   
    in phone varchar(15),    
    in role varchar(30),   
    in prmsn int
)
begin

    update users 
    set 
        first_name = fname,
        last_name = lname,
        email = email,
        password = pswd,
        phone_number = phone,
        role = role,
        permissions = prmsn
    where
        user_id = id;
end //
delimiter ;
