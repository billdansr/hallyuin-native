-- SQLBook: Code
-- USE `hallyuin-native`;

DELETE FROM `order_details`;
DELETE FROM `orders`;
DELETE FROM `payments`;
DELETE FROM `wishlists`;
DELETE FROM `merches`;
DELETE FROM `accounts`;

-- accounts
INSERT INTO `accounts` (`username`, `full_name`, `email`, `password`, `credit`, `role`) VALUES (
    'admin',
    'admin admin admin',
    'admin@mail.com',
    '$2y$10$jvq5XsvP/dM1LgwNELasae4s/5ldi68jPdfy/.eO2PkM2/rftBcrm', -- admin
    999999999999.99,
    'admin'
);

INSERT INTO `accounts` (`username`, `full_name`, `email`, `password`, `credit`, `role`) VALUES (
    'Guma Weenata',
    'Adiwangsa Dwi Hadinata',
    'weenata@mail.com',
    '$2y$10$BWDxVXvDe/fvlCv80mEI6e6sf1Mai0OG6opXRpdlhAzJGE4UNgQZ.', -- weenata4002
    1500000.00,
    'user'
);

-- merches
INSERT INTO `merches` (`name`, `price`, `description`, `stock`, `image`, `category`) VALUES (
    'TWICE - Feel Special The 8th Mini Album',
    295500.00,
    '[JYP Entertainment]
    [Released Sep 23rd, 2019]
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
    'TWICE'
);

INSERT INTO merches (name, price, description, stock, image, category) VALUES (
    'TWICE - Official Light Stick INFINITY [CANDYBONG]',
    1100000.00,
    '[JYP Entertaiment]
    [Released Aug 25th, 2023]
    Informatiion & Contents
    - Light Stick
    - Strap
    - QSG
    - Out Box
    
    *Central Control Mode is a concert automatic control. While being in this mode you cannot manually change the color.

    [How to Use]
    1. Press button to activate or activate Central Control Mode
    2. After 2-4 seconds to set the touch sensitivity
    3. Hold Button to adjust brightness
    4. First button press and touching touchpad after activate for adjust speed
    5. Second button press and touching touchpad after activate for adjust color
    6. Third button press and touching touchpad after activate for random mode
    7. Press button without touching touchpad for turn off the Light Stick',
    25,
    'https://kpopmerch.com/cdn/shop/products/team-md-goods-twice-official-light-stick-infinity-candybong-35200963674293_1000x.jpg?v=1679297184',
    'TWICE'
);

INSERT INTO merches (name, price, description, stock, image, category) VALUES (
    'TWICE - What is Love? 5th Mini Album',
    230000.00,
    '[JYP Entertainment]
    [Released Apr 9th, 2018]
    Information & Contents
    - 2 Version [A,B]
    - Cover
    - Photobook
    - CD-R
    - Photocard
    - Scratch Photocard
    - Lyric Book
    - Clear Postcard
    - Sticker',
    31,
    'https://kpopmerch.com/cdn/shop/products/twice-album-twice-what-is-love-5th-mini-album-33441257980085_1000x.jpg?v=1652400720',
    'TWICE'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'TWICE - TWICE MONOGRAPH TO BE READY',
    500000.00,
    '[JYP Entertainment]
    [Released Sep 11st, 2023]
    Information & Contents
    - 1 Version
    - Photobook
    - Photocard 9EA',
    42,
    'https://kpopmerch.com/cdn/shop/files/twice-md-goods-twice-twice-monograph-to-be-ready-35601545167029_1000x.jpg?v=1688716937',
    'TWICE'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'SEVENTEEN - SEVENTEENTH HEAVEN 11th Mini Album',
    400000.00,
    '[PLEDIS Entertainment]
    [Released Oct 23th, 2023]
    Information & Contents
    - 3 Versions [AM 5:26 Ver/PM 2:14 Ver/PM 10:23 Ver]
    - Outbox
    - Photo Book
    - Lyric Book
    - Festival Wristband
    - Paper Art Kit
    - Sticker
    - Photocard 
    - Minicard
    - CD-R',
    13,
    'https://kpopmerch.com/cdn/shop/files/seventeen-album-seventeen-seventeen-heaven-11th-mini-album-35950320779445_1000x.jpg?v=1695176950',
    'SEVENTEEN'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'SEVENTEEN - FML 10th Mini Album',
    330000.00,
    '[PLEDIS Entertainment]
    [Released Apr 24th, 2023]
    Information & Contents
    - 3 Versions [Fallen, Misfit, Lost Ver/Fade Mono Life Ver/Fight for My Life Ver]
    - Outbox
    - Photobook
    - Lyric Book
    - CD-R
    - Sticker
    - Photocard',
    34,
    'https://kpopmerch.com/cdn/shop/products/seventeen-album-seventeen-fml-10th-mini-album-35305199370421_1000x.jpg?v=1681715126',
    'SEVENTEEN'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'SEVENTEEN - THE NAME;1 Photobook',
    800000.00,
    '[Dispatch]
    [Released Nov 3rd, 2022]
    Information & Contents
    - 1 Version
    - Out Case
    - Photobook Set
    - Poster Book
    - Folding Poster Set
    - Digital Code Card
    - Photocard Set
    - Instant Photo',
    24,
    'https://kpopmerch.com/cdn/shop/products/seventeen-md-goods-seventeen-the-name-17-photobook-34398861197493_1000x.jpg?v=1664333077',
    'SEVENTEEN'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'SEVENTEEN - 17 CARAT 1st Mini Album',
    200000.00,
    '[PLEDIS Entertainment]
    [Released Jun 27th, 2023]
    Information & Contents
    - Photobook
    - Photocard
    - CD-R',
    45,
    'https://kpopmerch.com/cdn/shop/files/seventeen-album-seventeen-17-carat-1st-mini-album-35477874213045_1000x.jpg?v=1686272175',
    'SEVENTEEN'
)

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'LE SSERAFIM - Official Light Stick',
    1000000.00,
    '[HYBE]
    [Released Apr 3rd, 2023]
    Information & Contents
    - Light Stick
    - Dust Bag
    - Strap
    - User Guide
    
    [How to Use]
    1. Press and hold left button to turn it ON/OFF
    2. Press left button to change LED color
    3. Press right button to cange the light flasing speed
    (long blink --> blink --> flicker --> OFF)
    4. Press and hold right button to turn ON/OFF color shaking mode
    5. Press and hold right and left button at the same time activate light flicker mode that connect to your smartphone via Bluetooth
    ',
    9,
    'https://kpopmerch.com/cdn/shop/products/le-sserafim-md-goods-le-sserafim-official-light-stick-35215361409205_1000x.jpg?v=1679645501',
    'LE SSERAFIM'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'LE SSERAFIM - 2023 Seasons Greetings [CLASS OF 2023]',
    1000000.00,
    '[SOURCE MUSIC]
    [Released Dec 5th, 20232]
    Information & Contents
    - Outbox
    - Photobook
    - Desk Calendar
    - Diary
    - Sticker
    - Digital Code Card
    - Double-side Photocard
    - Student Identification Card
    - ID Photo
    - Instant Photo',
    3,
    'https://kpopmerch.com/cdn/shop/products/g-i-dle-md-goods-le-sserafim-2023-season-s-greetings-class-of-2023-34710945595573_1000x.jpg?v=1669255170',
    'LE SSERAFIM'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    "LE SSERAFIM - LE SSERAFIM's DAY OFF IN JEJU PHOTOBOOK",
    500000.00,
    '[HYBE]
    [Released Apr 3rd, 2023]
    Inforemation & Contents
    - Cover Sleeve
    - Photobook
    - Photo Card
    - Behind Folding Card
    - Envelope',
    26,
    'https://kpopmerch.com/cdn/shop/products/enhypen-md-goods-le-sserafim-le-sserafim-s-day-off-in-jeju-photobook-35204056350901_1000x.jpg?v=1679383403',
    'LE SSERAFIM'
);

INSERT INTO merches (name,price,description,stock,image,category) VALUES (
    'LE SSERAFIM - FEARLESS 1st Mini Album',
    345000.00,
    '[SOURCE MUSIC]
    [Released May 2nd, 2022]
    Information  Category
    - Version : 2 Versions [Black Petrol, Blue Chypre]
    - Out Box
    - Booklet
    - CD
    - Photocard
    - Postcard
    - Sticker
    - Transfer Paper
    - Poster',
    13,
    'https://kpopmerch.com/cdn/shop/products/le-sserafim-album-le-sserafim-fearless-1st-mini-album-33322009755829_1000x.jpg?v=1650877195',
    'LE SSERAFIM'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'BTS - PROOF Anthology Album Set [Both Standard & Compact Edition]',
    1400000.00,
    '[BIGHIT MUSIC]
    [Released Jun 10th, 2022]
    Information & Contents
    
    BTS - PROOF (Standard Edition)
    - 1 Type
    - Outer Box
    - The Art of Proof
    - Photograph
    - Epilogue
    - Lyrics
    - 3 CDs
    - Photocard A
    - Photocard B
    - Postcard
    - Poster

    BTS - PROOF (Compact Edition)
    - 1 Type
    - Booklet
    - 3 CDs
    - Photocard
    - Postcard
    - Mini Poster
    - Discography Guide',
    8,
    'https://kpopmerch.com/cdn/shop/products/bts-album-bts-proof-33389101154485_1000x.jpg?v=1651715815',
    'BTS'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'BTS JUNG KOOK - GOLDEN (SET) + GOLDEN (Weverse Album Ver.)',
    1400000.00,
    '[BIGHIT MUSIC]
    [Released Nov 3rd, 2023]
    Information & Contents
    PHOTOBOOK
    - 3 Versions [SHINE Ver, SOLID Ver, SUBSTANCE Ver]
    - Bookcase (3 Versions)
    - CD & CD Envelope (3 Versions)
    - Postcard (3 Versions)
    - Poster (3 Versions)
    - Photocard (1 Versions)
    - Symbol Card (1 Versions; 2EA)
    - Content Envelope (3 Versions)

    WEVERSE
    -  Bookcase ( 1 Versions)
    - Photobook ( 56p)
    - QR User Guide (1EA)
    - User Guide 
    - Photocard (1EA Out 3EA)
    - Postocard (1EA Out 2EA)
    - Content Envelope (1 EA)',
    15,
    'https://kpopmerch.com/cdn/shop/files/bts-album-bts-jungkook-golden-set-golden-weverse-album-ver-36020686717109_1000x.jpg?v=1696392852',
    'BTS'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'BTS - THE PLANET (BASTIONS OST)',
    390000.00,
    '[BIGHIT MUSIC]
    [Released May 26th, 2023]
    Information & Contents
    - 1 Version
    - photo book
    - photo card (sign)
    - lyric book
    - BTS plate sticker
    - BTS deco sticker
    - photo frame (BTS group photo)
    - BTS X BASTIONS autographed poster
    - Other Artist Poster',
    17,
    'https://kpopmerch.com/cdn/shop/files/bts-album-bts-the-planet-bastions-ost-35368266203317_1000x.jpg?v=1683532757',
    'BTS'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'BTS - PERMISSION TO DANCE ON STAGE in THE US',
    1200000.00,
    '[BIGHIT MUSIC]
    [Released Nov 27th, 2023]
    Information & Contents
    - Outbox
    - Digital Code + Photo Charm Set
    - Photobook Set
    - Photocard Set
    - Folding Card
    - Postcard+ Frame Stand Set',
    6,
    'https://kpopmerch.com/cdn/shop/files/bts-album-bts-permission-to-dance-on-stage-in-the-us-36265614934197_1000x.jpg?v=1701128927',
    'BTS'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'NewJeans - Get Up 2nd EP (Weverse Albums ver.)',
    200000.00,
    '[ADOR CO.,LTD]
    [Released July 21st, 2023]
    Information & Contents
    - 3 Versions (A Ver./ B Ver./ C Ver.)
    - Outbox
    - Lyric
    - Photo card
    - QR card',
    4,
    'https://kpopmerch.com/cdn/shop/files/newjeans-album-newjeans-get-up-2nd-ep-weverse-albums-ver-35563022713013_1000x.jpg?v=1688022678',
    'NewJeans'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'NewJeans - BUNNIES CAMP PHOTO SET',
    323000.00,
    '[ADOR CO.,LTD]
    [Released June 19th, 2023]
    - Envelope
    - Photocard',
    10,
    'https://kpopmerch.com/cdn/shop/files/newjeans-md-goods-newjeans-bunnies-camp-photo-set-35503805464757_1000x.jpg?v=1686900556',
    'NewJeans'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'NewJeans - NewJeans Yearbook 22-23',
    1050000.00,
    '[ADOR CO.,LTD.]
    [Released Nov 10th, 2022]
    - Outbox
    - Photo Bundle
    - Bunnies Camp Photobook
    - Bunnies Camp Handbook
    - Letters to Bunnies
    - Polaroid Book
    - Photo Zine
    - Photocards
    - Photosticker pack
    - Digital Code Card
    - Index sticker',
    6,
    'https://kpopmerch.com/cdn/shop/files/kpopmerch-newjeans-newjeans-yearbook-22-23-36161330282677_1000x.jpg?v=1698630434',
    'NewJeans'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    "NewJeans - 2023 Season's Greetings [Welcome to ROOM 722]",
    830000.00,
    '[ADOR CO.,LTD.]
    [Released Dec th,2022]
    - Outbox
    - Desk Calendar
    - Hard Cover Diary
    - Photobook
    - Sticker Pack
    - Mini Posters
    - Year Poster
    - Playing Cards
    - Digital Code Card
    - Door Hanger
    - Keyring
    - Memo Pad',
    8,
    'https://kpopmerch.com/cdn/shop/products/newjeans-md-goods-newjeans-2023-season-s-greetings-welcome-to-room-722-34712501616821_1000x.jpg?v=1669278211',
    'NewJeans'
);

INSERT INTO merches (`name`,`price`,`description`,`stock`,`image`,`category`) VALUES (
    'NewJeans - Get Up 2nd EP (Bunny Beach Bag ver.)',
    350000.00,
    '[ADOR CO.,LTD.]
    [Released July 21st, 2023]
    Information & COntents
    - 6 Versions (NewJeans Ver./ Hanni Ver./Haerin Ver./Minji Ver./Danielle Ver./Hyein Ver.)
    - Bag
    - Inner box
    - Photobook
    - Lyrics
    - Postcard
    - Bookmark
    - Sticker [1 set (2ea)]
    - Sticker
    - Photocard
    - CD-R',
    9,
    'https://kpopmerch.com/cdn/shop/files/newjeans-album-newjeans-get-up-2nd-ep-bunny-beach-bag-ver-35563015372981_1000x.jpg?v=1688022496',
    'NewJeans'
);

-- orders
INSERT INTO `orders` (`id`, `account_id`, `status`, `ordered_date`, `shipped_date`, `received_date`, `address`)
VALUES (
    1,
    (SELECT `id` FROM `accounts` WHERE `username` = 'admin'),
    'ordered',
    (CURRENT_DATE),
    NULL,
    NULL,
    'Jalan Pendidikan No 14'
);

INSERT INTO `order_details` (`order_id`, `merch_id`, `quantity_ordered`)
VALUES (
    1,
    (SELECT `id` FROM `merches` WHERE `name` = 'TWICE - Official Light Stick INFINITY [CANDYBONG]'),
    1
), (
    1,
    (SELECT `id` FROM `merches` WHERE `name` = 'TWICE - What is Love? 5th Mini Album'),
    1
);

-- FUNCTION: calculate_subtotal(quantity_ordered, price) -- Used in calculate_total() function
SELECT `calculate_subtotal`(5, 12500);

-- FUNCTION: calculate_total(order_id) -- Used in pay() procedure
SELECT `calculate_total`(1);

-- PROCEDURE: calculate_stock(order_id) -- Used in pay() procedure

-- PROCEDURE: pay(account_id, order_id)
CALL `pay`((SELECT `id` FROM `accounts` WHERE `username` = 'admin'), 1);

-- VIEW: sales_rank
SELECT * FROM `sales_rank`;