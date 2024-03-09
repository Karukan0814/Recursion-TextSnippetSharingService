CREATE TABLE IF NOT EXISTS userSettings (
    entryId INT PRIMARY KEY AUTO_INCREMENT,
    metaKey CHAR(1),
    metaValue VARCHAR(255),
    userId INT,
    FOREIGN KEY (userId) REFERENCES users(userId)

);