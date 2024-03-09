CREATE TABLE IF NOT EXISTS postLikes (
    userId INT ,
    postId INT ,
  
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (postId) REFERENCES posts(postId),
    PRIMARY KEY (userId, postId)

);