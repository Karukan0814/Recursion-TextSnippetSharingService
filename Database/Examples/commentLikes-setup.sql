CREATE TABLE IF NOT EXISTS commentLikes (
    userId INT ,
    commentId INT ,
  
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (commentId) REFERENCES comments(commentId),
    PRIMARY KEY (userId, commentId)

);