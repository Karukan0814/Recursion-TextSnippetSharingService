CREATE TABLE IF NOT EXISTS users (
    userId INT PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(50),
    email VARCHAR(255),
    pass VARCHAR(50),
    email_confirmed_at VARCHAR(50),
    createdAt DATETIME,
    updatedAt DATETIME

);