-- SQLBook: Code
DELETE FROM `accounts` WHERE `username` = 'admin';
INSERT INTO `accounts` (`username`, `full_name`, `email`, `password`, `credit`, `role`) VALUES (
    'admin',
    'admin admin admin',
    'admin@mail.com',
    '$2y$10$jvq5XsvP/dM1LgwNELasae4s/5ldi68jPdfy/.eO2PkM2/rftBcrm',
    999999999999.99,
    'admin'
);

INSERT INTO `accounts` (`username`, `full_name`, `email`, `password`, `credit`, `role`) VALUES (
    'Guma Weenata',
    'Adiwangsa Dwi Hadinata',
    'weenata@mail.com',
    'weenata4002',
    1500000.00,
    'user'
);

INSERT INTO `merches` (`name`, `price`, `description`, `stock`, `image`, `category`) VALUES (
    'TWICE - Feel Special The 8th Mini Album',
    295500.00,
    '[Released Sep 23rd, 2019]
    Information & Contents
    3 Version Album [A,B,C]
    Cover
    Photobook
    Lyrics Paper
    CD-R
    Photocard
    Gold Photocard',
    10,
    'https://kpopmerch.com/cdn/shop/products/twice-album-twice-feel-special-the-8th-mini-album-33435890942133_1000x.jpg?v=1652344014',
    'Twice [JYP Entertainment]'
);

INSERT INTO `merches` (`name`, `price`, `description`, `stock`, `image`, `category`) VALUES (
    'TWICE - Official Light'
)