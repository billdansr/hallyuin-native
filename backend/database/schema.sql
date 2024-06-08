-- SQLBook: Code
USE `hallyuin-native`;

-- CREATE TABLE user_tokens (
--     `id` INT AUTO_INCREMENT PRIMARY KEY,
--     `user_id` INT NOT NULL,
--     `token` VARCHAR(255) NOT NULL,
--     `expires_at` DATETIME NOT NULL,
--     FOREIGN KEY (user_id) REFERENCES `accounts`(id) ON DELETE CASCADE
-- );

CREATE TABLE IF NOT EXISTS `merches` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `price` DECIMAL(15,2) UNSIGNED NOT NULL,
    `description` TEXT NULL,
    `stock` INT UNSIGNED NOT NULL DEFAULT 0,
    `image` VARCHAR(255) NULL,
    `category` VARCHAR(255) NULL
);

CREATE TABLE IF NOT EXISTS `accounts` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `full_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `credit` DECIMAL(15, 2) UNSIGNED NOT NULL,
    `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    CHECK (`email` LIKE '%@%.%')
);

CREATE TABLE IF NOT EXISTS `wishlist` (
    `account_id` INT UNSIGNED,
    `merch_id` INT UNSIGNED,
    PRIMARY KEY (`account_id`, `merch_id`)
    FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),
    FOREIGN KEY (`merch_id`) REFERENCES `merches`(`id`)
);

CREATE TABLE IF NOT EXISTS `orders` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `account_id` INT UNSIGNED,
    `status` ENUM('ordered', 'shipped', 'received') NULL DEFAULT 'ordered',
    `ordered_date` DATE NULL DEFAULT (CURRENT_DATE),
    `shipped_date` DATE NULL,
    `received_date` DATE NULL    
    FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`)
);

CREATE TABLE IF NOT EXISTS order_details (
    `order_id` INT UNSIGNED,
    `merch_id` INT UNSIGNED,
    `quantity_ordered` INT UNSIGNED NOT NULL DEFAULT 1,
    FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`),
    FOREIGN KEY (`merch_id`) REFERENCES `merches`(`id`)
);

