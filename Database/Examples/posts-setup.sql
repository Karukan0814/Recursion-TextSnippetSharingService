CREATE TABLE IF NOT EXISTS posts (
    postId INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    content VARCHAR(255),
    userId INT,
    createdAt DATETIME,
    updatedAt DATETIME,
    FOREIGN KEY (userId) REFERENCES users(userId)

);