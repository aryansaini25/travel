CREATE DATABASE travel_planner;

USE travel_planner;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    details TEXT,
    booking_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flight_number VARCHAR(50),
    destination VARCHAR(100),
    departure_date DATE,
    price DECIMAL(10, 2)
);

CREATE TABLE hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    destination VARCHAR(100),
    price_per_night DECIMAL(10, 2)
);

CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    destination VARCHAR(100),
    price DECIMAL(10, 2)
);
