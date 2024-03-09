CREATE TABLE IF NOT EXISTS comments (
    commentId INT PRIMARY KEY AUTO_INCREMENT,
    commentText VARCHAR(250),
    userId INT,
    postId INT,

    createdAt DATETIME,
    updatedAt DATETIME,
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (postId) REFERENCES posts(postId)

);