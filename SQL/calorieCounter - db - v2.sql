-- Create the calorie_counter database
CREATE DATABASE calorieCounter;

-- Use the calorie_counter database
USE calorieCounter;

-- Create the userinfo table
CREATE TABLE userinfo (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    salt VARCHAR(255) NOT NULL
);

-- Create the exerciseType table
CREATE TABLE exerciseType (
    exerciseID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    exerciseType VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    weight DECIMAL(5, 2) NOT NULL,
    caloriesLost INT NOT NULL,
    logDate DATE NOT NULL,
    FOREIGN KEY (userID) REFERENCES userinfo(userID) ON DELETE CASCADE
);

-- Create the foodLog table
CREATE TABLE foodLog (
    foodLogID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    mealName VARCHAR(255) NOT NULL,
    amountGrams DECIMAL (5, 2) NOT NULL,
    caloriesGained INT NOT NULL,
    logDate DATE NOT NULL,
    logTime TIME NOT NULL,
    FOREIGN KEY (userID) REFERENCES userinfo(userID) ON DELETE CASCADE
);

-- Create the userstat table
CREATE TABLE userstat (
    userstatID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    caloriesLost INT NOT NULL,
    caloriesGained INT NOT NULL,
    FOREIGN KEY (userID) REFERENCES userinfo(userID) ON DELETE CASCADE
);

