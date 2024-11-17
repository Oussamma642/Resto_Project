
CREATE DATABASE Restaurant;
USE Restaurant;


CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') NOT NULL,
    phone_number VARCHAR(20),
    permissions int,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT into users (first_name, last_name, email, password, role, phone_number, permissions)
VALUES ('Sami', 'Sami', 'aitmohamedoussama57@gmail.com', '1111', 'client', '06522222', 0);

CREATE TABLE menu_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    picturePath VARCHAR(255),  -- Correction de la longueur pour l'image
    price DECIMAL(10, 2) NOT NULL,
    category ENUM('Breakfast', 'Lunch', 'Dinner') NOT NULL,  -- Remplacement de CHECK par ENUM pour compatibilité
    is_available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    reservation_date DATE NOT NULL,
    time_slot TIME NOT NULL,
    number_of_guests INT NOT NULL,  -- Suppression du CHECK
    status ENUM('pending', 'confirmed', 'canceled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);


CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'completed', 'canceled') DEFAULT 'pending',
    payment_status ENUM('paid', 'unpaid') DEFAULT 'unpaid',
    delivery_method ENUM('takeaway', 'delivery') NOT NULL,
    delivery_address VARCHAR(255),
    description TEXT DEFAULT NULL,  -- Colonne description pour les commandes spécifiques
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,  -- Référence à la commande
    item_id INT NOT NULL,   -- Référence à l'article du menu
    quantity INT NOT NULL,  -- Quantité commandée
    price DECIMAL(10, 2) NOT NULL,  -- Prix de l'article au moment de la commande
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES menu_items(item_id) ON DELETE CASCADE
);

CREATE TABLE contacts (
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  -- Référence à l'utilisateur qui a écrit le message
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(255) NOT NULL,  -- Objet du message de contact
    message TEXT NOT NULL,
    status ENUM('pending', 'resolved', 'archived') DEFAULT 'pending', -- Statut du message
    response text DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date de création
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Dernière mise à jour
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL
);

INSERT INTO contacts (user_id, email, subject, message) 
VALUES (30, 'aitmohamedoussama57@gmail.com', 'Demande emploi', 'Hellllooooooo bro how are you doing');

CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    rating INT NOT NULL,  -- Suppression de CHECK, s'assurer de le valider au niveau de l'application
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

create table OuvertureFermeture()
{
    id int primary key AUTO_INCREMENT,
    ouverture time,
    fermeture time,
    Dy VARCHAR(30)
}

alter table users
add column permissions int DEFAULT -1;