/*THIS FILE IS RESPONSIBLE FOR INITIALIZING THE DATABASE*/

/*Create and use database*/
CREATE DATABASE emerald_records_db;
USE emerald_records_db;

/*create users table*/
CREATE TABLE users (
    user_id INT UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
    username VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    address VARCHAR(100) NOT NULL,
    password VARCHAR(60) NOT NULL
);

/*insert some values into users table*/
INSERT INTO users (username, email, address, password)
VALUES ('John Deer', 'johndeer@yahoo.com', '21 Maple Avenue', 'SimplePassword'),
       ('Michael Cork', 'mcork2001@yahoo.com', '50 Black Rock', 'Password123'),
       ('Jane Dove', 'janedove2026@gmail.com', '50 Black Rock', 'iloveapples');

/*create products table*/
CREATE TABLE products (
    product_id INT UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
    product_name VARCHAR(50) UNIQUE NOT NULL,
    artist_name VARCHAR(50) NOT NULL,
    music_genre VARCHAR(20) NOT NULL,
    year_released YEAR NOT NULL,
    quantity int
);

/*insert some values into products table*/
INSERT INTO products (product_name, artist_name, music_genre, year_released, quantity)
VALUES ('Pixie Dust - Single', 'Baelor Swift', 'Pop', 2025, 50),
       ('Acid Death - LP', 'Non-Metallica', 'Metal', 1990, 50),
       ('Cherry Fields - Single', 'Nuns N Noses', 'Rock', 1982, 50),
       ('The Grey Album - Double-sided LP', 'The Bees', 'Rock', 1968, 50),
       ('Horizon - Single', 'McDavey', 'Electronic', 2004, 50),
       ('Moonlight - Single', 'Sharon Monroe', 'Classical', 1970, 50),
       ('The Return - LP', 'Coolio Jr.', 'RnB', 2006, 50),
       ('Concrete Hearts - Doubled-side LP', 'Nerve-on-ye', 'Punk', 1994, 50);